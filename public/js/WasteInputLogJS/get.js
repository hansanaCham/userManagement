function GetDate(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/",
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

function getLogsFromFDate(date, callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/transfer_collection/input/date/" + date,
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
function getLogsFromDateRange(from, to, callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/transfer_collection/input/date/from/" + from + "/to/" + to,
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

function loadTableUI(from, to) {
    getLogsFromDateRange(from, to, function (result) {
        var table = "";
        var id = 1;
        $.each(result, function (index, data) {
            table += "<tr>";
            table += "<td>" + id++ + "</td>";
            table += "<td>" + data.date + "</td>";
            table += "<td>" + data.session + "</td>";
            table += "<td>" + data.amount + "</td>";
            table += "<td>" + data.register_no + "</td>";
            table += "<td>" + data.local_authority_name + "</td>";
            table += "<td><button id='" + data.id + "' type='button' class='btn btn-block btn-success btn-xs btnAction'>Select</button></td>";
            table += "</tr>";
        });
        $('#tblZones tbody').html(table);
        $("#tblZones").DataTable();
    });
}

//function loadTableUI(wrdID, callBack) {
//    var url = "api/f8/id/" + wrdID;
//    $.ajax({
//        type: "get",
//        headers: {
//            Authorization:
//                    "Bearer " + $("meta[name=api-token]").attr("content"),
//            Accept: "application/json"
//        },
//        url: url,
//        data: null,
//        cache: false,
//        success: function (result) {
//            var table = "";
//            var i = 0;
//            $.each(result, function (index, data) {
//                table += "<tr>";
//                table += "<td>" + i++ + "</td>";
//                table += "<td>" + data.name + "</td>";
//                table += "<td>" + data.name + "</td>";
//                table += "<td><button id='" + data.id + "' type='button' class='btn btn-block btn-success btn-xs btnAction'>Select</button></td>";
//                table += "</tr>";
//            });
//            $('#tblData tbody').html(table);
//            $("#tblData").DataTable();
//            if (
//                    typeof callBack !== "undefined" &&
//                    callBack != null &&
//                    typeof callBack === "function"
//                    ) {
//                callBack(result);
//            }
//        }
//    });
//}