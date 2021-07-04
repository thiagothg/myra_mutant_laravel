(function () {
    'use strict'

    let form = document.getElementById('form-category')

    form.addEventListener('submit', function (e) {
        e.preventDefault()
        e.stopPropagation()

        // if (form.checkValidity()) {
        //     console.log('ok')
        // }
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
                    document.getElementById('link-index').click;
                    $('#link-index').trigger('click');
                }

            },
            error: function (response) {
                $.each(response.responseJSON.errors, function (field, error) {
                    let el = $(document).find(`[name=${field}]`)
                        .next()
                        .html(error)
                })
                form.classList.add('was-validated')
            }
        })
    }, false)
})()
