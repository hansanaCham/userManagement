
function getSubOfficeCombo(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/get_sub_office",
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
function getWardsCombo(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/get_unassigned_words",
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

function loadtableBySubOffice(callBack, subid) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/get_words_by_sub_office/id/" + subid,
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

function loadSubOfficeCombo(callBack) {
    getSubOfficeCombo(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, sub) {
            combo += "<option value=" + sub.id + ">" + sub.name + "</option>";
        });
        $('.getsubOffice').html(combo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}
function loadWardsCombo() {
    getWardsCombo(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, sub) {
            combo += "<option value=" + sub.id + ">" + sub.name + "</option>";
        });
        $('#getWards').html(combo);
    });
}

function loadTableUI(wrdID, callBack) {
    var url = "api/get_words_by_sub_office/id/" + wrdID;
    $.ajax({
        type: "get",
        headers: {
            Authorization:
                    "Bearer " + $("meta[name=api-token]").attr("content"),
            Accept: "application/json"
        },
        url: url,
        data: null,
        cache: false,
        success: function (result) {
            var table = "";
            var i = 0;
            $.each(result, function (index, data) {
                table += "<tr>";
                table += "<td>" + i++ + "</td>";
                table += "<td>" + data.name + "</td>";
                table += "<td>" + data.name + "</td>";
                table += "<td><button id='" + data.id + "' type='button' class='btn btn-block btn-success btn-xs btnAction'>Select</button></td>";
                table += "</tr>";
            });
            $('#tblData tbody').html(table);
            $("#tblData").DataTable();
            if (typeof callBack !== "undefined" && callBack != null && typeof callBack === "function") {
                callBack(result);
            }
        }
    });
}