function GetDrivers(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/drivers",
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

function uniqueNICcheck(nic, callBack) {
    if (nic.length !== 0) {
        $.ajax({
            type: "GET",
            headers: {
                "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
                "Accept": "application/json"
            },
            url: "api/driver/is_available/nic/" + nic,
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

}

function loadTableUI() {
    GetDrivers(function (result) {
        var table = "";
        var id = 1;
        $.each(result, function (index, driver) {
            table += "<tr>";
            table += "<td>" + id++ + "</td>";
            table += "<td>" + driver.first_name + "</td>";
            table += "<td>" + driver.nic + "</td>";
            table += "<td><button id='" + driver.id + "' type='button' class='btn btn-block btn-success btn-xs btnAction'>Select</button></td>";
            table += "</tr>";
        });
        $('#tblDrivers tbody').html(table);
        $("#tblDrivers").DataTable();
    });
}

function getaDriverbyId(id, callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/driver/id/" + id,
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