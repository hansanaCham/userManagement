function getNonBrokenVeh(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/vehicle/not_broken",
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

function loadVehicleCombo() {
    getNonBrokenVeh(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, sub) {
            combo += "<option value="+ sub.id +">" + sub.register_no + "</option>";
        });
        $('#getGoodVehicle').html(combo);
    });
}

function getBrokenVeh(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/vehicle/broken",
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
    getBrokenVeh(function (result) {
        var table = "";
        var id = 1;
        $.each(result, function (index, car) {
            table += "<tr>";
            table += "<td>" + id++ + "</td>";
            table += "<td>" + car.register_no + "</td>";
            table += "<td>" + car.ownership + "</td>";
            table += "<td><button id='" + car.id + "' type='button' class='btn btn-block btn-success btn-xs btnAction'>Select</button></td>";
            table += "</tr>";
        });
        $('#tblVehicle tbody').html(table);
        $("#tblVehicle").DataTable();
    });
}


function getVehbyId(id, callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/vehicle/id/" + id,
        data: null,
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