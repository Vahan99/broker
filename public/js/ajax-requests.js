$('#reality-filter').find('input, select').change(function (element) {
    let url  = `reality-list`,
        data = {[$(this).attr('name')] : $(this).val()};
    onAjax({
        url: url,
        data: data,
        method: 'GET'
    }).done((data) => {
        realtyFilterDone(data);
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

realtyFilterDone = (data) => {
    $('.card-box').remove();
    $('.tabelList').append(data);
    var array = []
    if (localStorage.getItem('print')){
        array = JSON.parse(localStorage.getItem('print'))
    }
    $('.printNumbers').text(array.length);
    for ( var i = 0; i < array.length; i++) {
        $('#checkForPrint_' + array[i].id).prop("checked", true);
    }
    $('.printNumbers').on('click', function () {
        if(localStorage.getItem('print')){
            if(JSON.parse(localStorage.getItem('print')).length > 0){
                window.open('/admin/reality/reality-print-list/' + localStorage.getItem('print'), '_target');
            }else{
                window.open('/admin/reality/reality-print-list/' + 0, '_target');
            }
        }else{
            window.open('/admin/reality/reality-print-list/' + 0, '_target');
        }
    });
    $('.checkForPrint').on('click', function () {
        var that = this;
        var array = []
        if (localStorage.getItem('print')){
            array = JSON.parse(localStorage.getItem('print'))
        }
        if($(this).is(':checked')) {
            array.push({id: $(that).siblings('input').val()})
            $('.printNumbers').text(array.length);
            localStorage.setItem('print', JSON.stringify(array) )
        }else{
            array = array.filter(function(el) {
                return el.id !== $(that).siblings('input').val()
            })
            $('.printNumbers').text(array.length);
            localStorage.setItem('print', JSON.stringify(array) )

        }
    })
};
