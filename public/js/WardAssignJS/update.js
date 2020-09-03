function assignWard(id,data, callBack) {
    if(isNaN(id)){
        return false;
    }
    if(isNaN(data.sub_office_id)){
        alert('Please Enter SubOffice');
        return false;
    }
    $.ajax({
        type: "PUT",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/assign_ward/id/" + id,
        data: data,
        dataType: "json",
        cache: false,
        processDaate: false,
        success: function (result) {

            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(result);
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert(textStatus + ':' + errorThrown);
        }
    });
}

function Validiteupdate(data) {
    var response = true;
    if (data.first_name.length === 0) {
        $('#valFname').removeClass('d-none');
        response = false;
    }
    return response;
}