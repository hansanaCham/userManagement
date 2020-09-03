function Validiteinsert(data) {
    var response = true;
    if (data.remark.length == 0) {
        $('#valFname').removeClass('d-none');
        $('#valUnique').addClass('d-none');
        response = false;
    }
    return response;
}