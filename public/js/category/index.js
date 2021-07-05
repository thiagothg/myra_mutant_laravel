$(function () {
    $.fn.initTable()

    //reset fields
    let myModalEl = document.getElementById('modal-category')
    window.formModal = new bootstrap.Modal(myModalEl)


    myModalEl.addEventListener('hidden.bs.modal', function (event) {
        $('#des_category').val('')
        $('#flg_active').prop('checked', false);

        $('#form-category').attr('action', $('.action').val())
        $('#form-category').attr('method', $('.method').val())
    })

    let form = document.getElementById('form-category')

    form.addEventListener('submit', function (e) {
        e.preventDefault()
        e.stopPropagation()

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': window.token
            }
        })

        let form_data = $("#form-category").serialize()

        $.ajax({
            url: form.getAttribute('action'),
            type: form.getAttribute('method'),
            data: form_data,
            // dataType: 'json',
            success: function (data) {
                if (data.success) {
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


    $(document).on("click", ".update-button", function (event) {
        event.preventDefault()
        event.stopPropagation()

        $('#form-category').attr('action', $(this).attr('href'))
        $('#form-category').attr('method', $(this).attr('data-method'))

        let url = $(this).attr('data-route')

        $.fn.getCategory(url)
    });


})


//GRID
$.fn.initTable = function () {
    $('#table-category').DataTable({
        ajax: {
            url: $('#url-grid').attr('href'),
            headers: {
                'CSRFToken': window.token
            }
        },
        dataSrc: 'data',
        language: window.dataTablesPtBr,
        responsive: true,
        select: true,
        columns: [
            { data: 'cod_category' },
            { data: 'des_category' },
            { data: 'flg_active' },
            { data: 'created_at' },
            { data: 'acao' },
        ]
    });
};

//Get Category
$.fn.getCategory = function (url) {
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
                $('#des_category').val(model.des_category)

                if (model.flg_active == 1) {
                    $('#flg_active').prop('checked', true);
                }

                $('#new-record-button').trigger('click')
            }
        },
    })
}
