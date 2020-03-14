$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let companyDisplay = $('.company-display');

    $("#reality-filter input, select").change(function () {
        console.log($(this).val(), $(this).attr('name'));
        ajaxRequest();
    });

    companyDisplay.change(function () {
        let id = $(this).data('id');

        const data = {
            url: `update-company/${id}`,
            display: $(this)[0].checked,
            method: 'POST'
        };

        ajaxRequest(data.url, data.method, {display: data.display}, successCallback, errorCallback);
    });

    ajaxRequest = (url, method, data, dataType, successCallback, errorCallback) => {
        $.ajax({
            method:method,
            url:url,
            data:data,
            dataType: dataType,
            success:successCallback,
            error:errorCallback
        });
    };

    successCallback = (success) => {
        return success;
    };

    errorCallback = (error) => {
        return console.error(error)
    }
});