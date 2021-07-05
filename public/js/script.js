
$(function () {

    $(document).on("click", ".delete-button", function (event) {
        event.preventDefault()
        event.stopPropagation()

        let url = $(this).attr('href')
        let code = $(this).attr('data-id')
        let item = $(this).attr('data-item')
        let name = $(this).attr('data-name')

        bootbox.confirm({
            title: `Excluir ${item} ${name}`,
            message: `Deseja realmente excluir este item ?`,
            className: 'fadeIn',
            buttons: {
                confirm: {
                    label: '<i class="fas fa-check"></i> Sim ',
                },
                cancel: {
                    label: '<i class="fas fa-times"></i> Não'
                }
            },
            callback: function (result) {
                if (result) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': window.token
                        }
                    })

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        // dataType: 'json',
                        success: function (response) {
                            bootbox.alert({
                                message: response.message,
                                className: 'fadeIn',
                                callback: function () {
                                    if (response.success) {
                                        location.reload()
                                    }
                                }
                            })
                        },
                    })
                }
            }
        });
    });
})