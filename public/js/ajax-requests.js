$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const Request = {
        company: {
            url: 'update-company/',
            method: 'POST'
        },
        reality: {
            url: 'reality-list/',
            method: 'GET'
        }
    };

    $("#reality-filter input, select").change(function () {
        Request.reality.data = {[$(this).attr('name')] : $(this).val()};
        onAjax(Request.reality).done(function (data) {
            onTable(data, $('.tabelList'), $('.card-box'));
        });
    });

    $('.company-display').change(function () {
        Request.company.url  = Request.company.url + $(this).data('id');
        Request.company.data = {display:$(this)[0].checked};
        onAjax(Request.company);
    });
});

onAjax    = (request) => {
    if(!request.error){
        request.error = onError
    }  if(!request.success){
        request.success = onSuccess
    }  return $.ajax(request);
};
onForm    = () => {};
onTable   = (data, table, removed) => {
    removed.remove();
    table.append(data);
};
onError   = (error) => {
    return console.error(error)
};
onRemove  = () => {};
onSuccess = (success) => {
    return success;
};

