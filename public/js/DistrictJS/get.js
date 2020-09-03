function GetDistricts(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/districts",
        data: null,
        dataType: "json",
        cache: false,
        processDaate: false,
        success: function (result) {

            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(result);
            }
        }
    });
}

function loadTableUI() {
    GetDistricts(function (result) {
        var table = "";
        var id = 1;
        $.each(result, function (index, dis) {
            table += "<tr>";
            table += "<td>" + id++ + "</td>";
            table += "<td>" + dis.name + "</td>";
            table += "<td>" + dis.code + "</td>";
            table += "<td><button id='" + dis.id + "' type='button' class='btn btn-block btn-success btn-xs btnAction'>Select</button></td>";
            table += "</tr>";
        });
        $('#tblDistrict tbody').html(table);
        $("#tblDistrict").DataTable();
    });
}

function getaDistrictbyId(id, callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/districts/id/" + id,
        data: null,
        dataType: "json",
        cache: false,
        processDaate: false,
        success: function (result) {

            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(result);
            }
        },
        error: function(xhr, textStatus, errorThrown){               
                alert(textStatus+':'+errorThrown);
            }
    });

}