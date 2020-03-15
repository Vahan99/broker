$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

onAjax    = (request) => {
    if(!request.error){
        request.error = onError
    }  if(!request.success){
        request.success = onSuccess
    } if(!request.method) {
        request.method = 'POST';
    } return $.ajax(request);
};

onError   = (error) => {
    return console.log(error)
};

onSuccess = (success) => {
    return success;
};

