function loadTypeCombo(callBack) {

    getType(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += "<option selected value='" + index + "' selected>" + value + "</option>";
        });
        $('#typeCombo').html(combo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}



function getType(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/facilityoutputtypes/plant_type",
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


function loadNatureTypeCombo(callBack) {
    getNatureType(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += "<option selected value='" + index + "' selected>" + value + "</option>";
        });
        $('#natureCombo').html(combo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}



function getNatureType(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/facilityoutputtypes/nature_type",
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



function loadFacilityOutputTypeTabel() {
    GetloaFacilityOutputTypeTabel(function (result) {
        var table = "";
        var id = 1;
        $.each(result, function (index, tbl) {
            table += "<tr>";
            table += "<td>" + id++ + "</td>";
            table += "<td>" + tbl.name + "</td>";
            table += "<td>" + tbl.type + "</td>";
            table += "<td>" + tbl.nature + "</td>";
            table += '<td><button type="button" data-row="' + encodeURIComponent(JSON.stringify(tbl)) + '"  value="' + tbl.id + '" class="btn btn-success btn-sm val_sel">Select</button></td></tr>';            table += "</tr>";
        });
        $('#tblFacilityOutputType tbody').html(table);
        $("#tblFacilityOutputType").DataTable();
    });
}

function GetloaFacilityOutputTypeTabel(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/facilityoutputtypes",
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