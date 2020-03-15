$('#reality-filter :input, select').change(function (element) {
    let url  = `reality-list`,
        data = {[$(this).attr('name')] : $(this).val()};

    onAjax({
        url: url,
        data: data,
        method: 'GET'
    }).done((data) => {
        $('.card-box').remove();
        $('.tabelList').append(data);
    });
});

$('.company-display').change(function (element) {
    let url  = `update-company/${$(this).data('id')}`,
        data = {display: $(this)[0].checked};

    onAjax({
        url: url,
        data: data
    });
});


