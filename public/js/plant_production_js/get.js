function loadPlantTypeUI(callBack) {
    getPlantType(function (result) {
        var ui = "";
        var id = 1;
        var txtId;
        $.each(result, function (index, value) {

            txtId = value.name;
            txtId = txtId.replace(/\s/g, '_');
            txtId = txtId.toLowerCase();
            ui += "<div class=\"form-group\">";
            ui += "<label>" + value.name + "</label>";
            ui += "<input id=\"txt_" + txtId + "\" type=\"number\" data-row=\"" + encodeURIComponent(JSON.stringify(value)) + "\" class=\" text-right form-control form-control-sm forms_textInputs\" placeholder=\"Enter " + value.name + " amount\" value=\"0\">";
            ui += "</div>";
        });
        $('#div_txt_holder').html(ui);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}



function getPlantType(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/plant/types",
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



function loadPendingBioCompostTabel() {
    GetPendingBioCompostTabel(function (result) {
        var table = "";
        var id = 1;
        $.each(result, function (index, tbl) {
            table += "<tr>";
            table += "<td>" + id++ + "</td>";
            table += "<td>" + tbl.date + "</td>";
            table += "<td>" + tbl.amount + "</td>";
            table += '<td><button type="button" data-row="' + encodeURIComponent(JSON.stringify(tbl)) + '"  value="' + tbl.id + '" class="btn btn-success btn-sm val_sel">Select</button></td></tr>'; table += "</tr>";
        });
        $('#tblplant_production tbody').html(table);
        $("#tblplant_production").DataTable();
    });
}

function GetPendingBioCompostTabel(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/plant/bio_compost/pending",
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


function loadPendingBioCompostTabel_by_date_range(f_date, t_date) {
    GetPendingBioCompostTabel_by_date_range(f_date, t_date, function (result) {
        var table = "";
        var id = 1;
        $.each(result, function (index, tbl) {
            table += "<tr>";
            table += "<td>" + id++ + "</td>";
            table += "<td>" + tbl.finish_date + "</td>";
            table += "<td>" + tbl.input_amt + "</td>";
            table += '<td><button type="button" data-row="' + encodeURIComponent(JSON.stringify(tbl)) + '"  value="' + tbl.id + '" class="btn btn-success btn-sm val_sel_dte_range">Select</button></td></tr>'; table += "</tr>";
        });
        $('#tblplant_production_by_date_range tbody').html(table);
        $("#tblplant_production_by_date_range").DataTable();
    });
}

function GetPendingBioCompostTabel_by_date_range(f_date, t_date, callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/plant/bio_compost/from/" + f_date + "/to/" + t_date,
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