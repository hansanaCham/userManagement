function GetWasteTypes(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            Authorization:
                "Bearer " + $("meta[name=api-token]").attr("content"),
            Accept: "application/json"
        },
        url: "api/wasteCollect/segregation",
        data: null,
        dataType: "json",
        cache: false,
        processDaate: false,
        success: function(result) {
            if (
                typeof callBack !== "undefined" &&
                callBack != null &&
                typeof callBack === "function"
            ) {
                callBack(result);
            }
        }
    });
}

function uniqueNamecheck(name, callBack) {
    $.ajax({
        type: "GET",
        headers: {
            Authorization:
                "Bearer " + $("meta[name=api-token]").attr("content"),
            Accept: "application/json"
        },
        url: "api/wasteCollect/segregation/isAvailable/name/" + name,
        data: null,
        dataType: "json",
        cache: false,
        processDaate: false,
        success: function(result) {
            if (
                typeof callBack !== "undefined" &&
                callBack != null &&
                typeof callBack === "function"
            ) {
                callBack(result);
            }
        }
    });
}

function loadTableUI() {
    GetWasteTypes(function(result) {
        var table = "";
        var id = 1;
        $.each(result, function(index, sec) {
            table += "<tr>";
            table += "<td>" + id++ + "</td>";
            table += "<td>" + sec.name + "</td>";
            table +=
                "<td><button id='" +
                sec.id +
                "' type='button' class='btn btn-block btn-success btn-xs btnAction'>Select</button></td>";
            table += "</tr>";
        });
        $("#tblAllItems tbody").html(table);
        $("#tblAllItems").DataTable({
            scrollX: true
        });
    });
}

function getaWasteTypebyId(id, callBack) {
    $.ajax({
        type: "GET",
        headers: {
            Authorization:
                "Bearer " + $("meta[name=api-token]").attr("content"),
            Accept: "application/json"
        },
        url: "api/wasteCollect/segregation/id/" + id,
        data: null,
        dataType: "json",
        cache: false,
        processDaate: false,
        success: function(result) {
            if (
                typeof callBack !== "undefined" &&
                callBack != null &&
                typeof callBack === "function"
            ) {
                callBack(result);
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            alert(textStatus + ":" + errorThrown);
        }
    });
}
