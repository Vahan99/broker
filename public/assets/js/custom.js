$(document).ready(function () {
    $('.phone').mask('(+374) 00 00-00-00');

    $(document).on('click', '.clickable', function (el) {
        location.href = $(this).data('route');
    });
});

