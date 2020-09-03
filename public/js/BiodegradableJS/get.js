function getAmountFDate(dateF, data, callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/plant/degradable/date/" + dateF,
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
function getAmountFromDateRange(from ,to , callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/plant/degradable/from/"+ from +"/to/" + to,
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

function loadTableUI(from ,to) {
    getAmountFromDateRange(from,to ,function (result) {
        var table = "";
        var id = 1;
        $.each(result, function (index, data) {
            table += "<tr>";
            table += "<td>" + id++ + "</td>";
            table += "<td>" + data.amount + "</td>";
            table += "<td><button id='" + data.id + "' type='button' class='btn btn-block btn-success btn-xs btnAction'>Select</button></td>";
            table += "</tr>";
        });
        $('#tblZones tbody').html(table);
        $("#tblZones").DataTable();
    });
}

function getDataByID(id, callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/plant/degradable/id/" + id,
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