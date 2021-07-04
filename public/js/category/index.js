$(function () {
    $.fn.initTable()

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