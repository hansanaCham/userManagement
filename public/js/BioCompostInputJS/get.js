function getCardInfo(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/plant/bio_compost/summary",
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

function loadCardInfo() {
    getCardInfo(function (result) {
        $('.type-cards').html("<h3 class='widget-user-username text-right'>" + result.type + "</h3>");
        $('.pool').html('Available <h4 class="float-right badge bg-danger">' + result.pool + '</h4>');
        $('.used').html('Used <span class="float-right badge bg-primary">' + result.used + '</span>');
        $('.balance').html('Balance <span class="float-right badge bg-success">' + result.balance + '</span>');
    });
}

function checkBalance() {
    
    
}

function getAllData(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/plant/bio_compost/summary",
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

function getDataFromDateRange(from, to, callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/plant/bio_compost/from/" + from + "/to/" + to,
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
    getDataFromDateRange(from, to, function (result) {
        var table = "";
        var id = 1;
        $.each(result, function (index, data) {
            table += "<tr>";
            table += "<td>" + id++ + "</td>";
            table += "<td>" + data.amount + "</td>";
            table += "<td>" + data.date + "</td>";
            table += "<td><button id='" + data.id + "' type='button' class='btn btn-block btn-success btn-xs btnAction'>Select</button></td>";
            table += "</tr>";
        });
        $('#tblData tbody').html(table);
        $("#tblData").DataTable();
    });
}

function getaDatabyId(id, callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/plant/bio_compost/id/" + id,
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