'use strict'


$(function () {

    $.fn.initTable()


    //reset fields
    $(document).on('hidden.bs.modal', '#modal-product', function (e) {
        $('#des_product').val('')
        $('#qtd_storage').val('')
        $('#qtd_price').val('')
        $('#cod_category').val('')
        $('#cod_product').val('')
        $('#flg_active').prop('checked', false);
    })

    //Get Categories select
    $('#modal-product').on('show.bs.modal', function () {
        $.fn.getCategory()
    })


    //handle sbumit
    let form = document.getElementById('form-product')
    form.addEventListener('submit', function (e) {
        e.preventDefault()
        e.stopPropagation()

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': window.token
            }
        })

        let form_data = $("#form-product").serialize()

        $.ajax({
            url: form.getAttribute('action'),
            type: form.getAttribute('method'),
            data: form_data,
            // dataType: 'json',
            success: function (data) {
                if (data.success) {
                    $('.btn-close').trigger('click')

                    bootbox.alert({
                        message: data.message,
                        className: 'fadeIn',
                        callback: function () {
                            if (data.success) {
                                location.reload()
                            }
                        }
                    })
                }
            },
            error: function (response) {
                $.each(response.responseJSON.errors, function (field, error) {
                    let isArray = Array.isArray(error)
                    if (isArray) {
                        error = error.join('<br>')
                    }
                    $(document).find(`[name=${field}]`).addClass('is-invalid')
                    $(document).find(`[name=${field}]`)
                        .next()
                        .html(error)
                })
                form.classList.add('has-validation')
            }
        })
    }, false)

    //Set form for save
    $("#new-record-button").on("click", function () {
        $('#form-product').attr('action', 'api/ajaxProduct')
        $('#form-product').attr('method', 'POST')
    });

    //handle the edit button
    $(document).on("click", ".update-button", function (event) {
        event.preventDefault()
        event.stopPropagation()

        $('#form-product').attr('action', $(this).attr('href'))
        $('#form-product').attr('method', $(this).attr('data-method'))

        let url = $(this).attr('data-route')

        $.fn.getProduct(url)
    });

});


//GRID
$.fn.initTable = function () {
    $('#table-product').DataTable({
        ajax: {
            url: './api/ajaxProduct',
            headers: {
                'CSRFToken': window.token
            }
        },
        dataSrc: 'data',
        language: window.dataTablesPtBr,
        responsive: true,
        select: true,
        columns: [
            { data: 'cod_product' },
            { data: 'des_product' },
            { data: 'qtd_storage' },
            { data: 'qtd_price' },
            { data: 'cod_category' },
            { data: 'flg_active' },
            { data: 'created_at' },
            { data: 'acao' },
        ]
    });
};

//get category for select
$.fn.getCategory = function () {
    $('#cod_category').select2({
        theme: 'bootstrap',
        width: '100%',
        closeOnSelect: true,
        dropdownParent: $("#form-product"),
        placeholder: {
            id: '',
            text: 'Selecione'
        },
        ajax: {
            url: '../api/ajaxGetCategory',
            cache: true,
            dataType: 'json',
            delay: 250,
            headers: {
                'X-CSRF-TOKEN': window.token
            },
            data: function (params) {
                var query = {
                    search: params.term,
                    type: 'public'
                }
                return query;
            }
        }
    });
}

//Get Product
$.fn.getProduct = function (url) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': window.token
        }
    })

    $.ajax({
        url: url,
        type: 'GET',
        // dataType: 'json',
        success: function (response) {
            let model = response.data
            if (response.success) {
                $('#cod_product').val(model.cod_product)
                $('#des_product').val(model.des_product)
                $('#qtd_storage').val(model.qtd_storage)
                $('#qtd_price').val(model.qtd_price)
                $('#cod_category').val(model.cod_category)
                $('#cod_category').trigger('change')

                // Set the value, creating a new option if necessary
                if ($('#cod_category').find("option[value='" + model.id + "']").length) {
                    $('#cod_category').val(model.id).trigger('change');
                } else {
                    var newOption = new Option(model.category.des_category, model.cod_category, true, true);
                    $('#cod_category').append(newOption).trigger('change');
                }

                if (model.flg_active == 1) {
                    $('#flg_active').prop('checked', true);
                }

                $('#new-record-button').trigger('click')
            }
        },
    })
}
