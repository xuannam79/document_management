$('.text-danger').on('click', function (e) {
    if (confirm($(this).data('confirm'))) {
        $('#delete-form').submit();
        return true;
    }
    else {
        return false;
    }
});
