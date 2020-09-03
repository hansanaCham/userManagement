//++++---------[WASTE TYPE SECTION START]---------++++//
function GetWasteType(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/WasteType",
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

//function uniqueNamecheck(name,callBack) {
//    $.ajax({
//        type: "GET",
//        headers: {
//            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
//            "Accept": "application/json"
//        },
//        url: "api/attachements/name/"+name,
//        data: null,
//        dataType: "json",
//        cache: false,
//        processDaate: false,
//        success: function (result) {
//
//            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
//                callBack(result);
//            }
//        }
//    });
//}

function loadTable() {
    GetWasteType(function (result) {
        var table = "";
        var id = 1;
        $.each(result, function (index, value) {
            table += "<tr>";
            table += "<td>" + id++ + "</td>";
            table += "<td>" + value.name + "</td>";
            table += "<td><button id='" + value.id + "' type='button' class='btn btn-block btn-primary btn-xs btnAction'>Select</button></td>";
            table += "</tr>";
        });
        $('#tblWasteTypes tbody').html(table);
    });
}

function getaWasteTypebyId(id, callBack) {

    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/WasteType/id/" + id,
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
//++++---------[WASTE TYPE SECTION END]---------++++//
//---///[END LINE]//---///
//++++---------[WASTE DESTINY SECTION START]---------++++//
function GetWasteDestiny(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/density",
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
function loadTableWasteDestiny() {
    GetWasteDestiny(function (result) {
        var table = "";
        var id = 1;
        $.each(result, function (index, valuedest) {
            table += "<tr>";
            table += "<td>" + id++ + "</td>";
            table += "<td>" + valuedest.waste_name + "</td>";
            table += "<td>" + valuedest.density + "</td>";
            if (valuedest.status == 1) {
                table += "<td><span class='badge bg-success'>Active</span></td>";
            } else
            {
                table += "<td><span class='badge bg-danger'>Inactive</span></td>";
            }
            table += "<td><button id='" + valuedest.id + "' type='button' class='btn btn-block btn-primary btn-xs btnActionDest'>Select</button></td>";
            table += "</tr>";
        });
        $('#tblWasteDest tbody').html(table);
    });
}

function loadWasteCombo(callBack) {
    GetWasteType(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += "<option selected value='" + value.id + "' selected>" + value.name + "</option>";
        });
        $('#selWasteDtype').html(combo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}
function loadWasteAssignCombo(callBack) {
    GetWasteType(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += "<option selected value='" + value.id + "' selected>" + value.name + "</option>";
        });
        $('#wasteTypeAssign').html(combo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}
function getaWasteDestinybyId(id, callBack) {

    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/density/id/" + id,
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
//++++---------[WASTE DESTINY SECTION END]---------++++//
//---///[END LINE]//---///
//++++---------[DESTINY ASSIGN SECTION START]---------++++//

function getDestinybyWasteid(id, callBack) {

    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/density_by_waste_type/id/" + id,
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
function loadDestinyAssCombo(id) {
    getDestinybyWasteid(id, function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += "<option selected value='" + value.id + "' selected>" + value.density + "</option>";
        });
        $('#destByWasteid').html(combo);
    });
}
//++++---------[DESTINY ASSIGN SECTION END]---------++++//
//---///[END LINE]//---///
//++++---------[COLLECTION RATIO SECTION START]---------++++//
function GetCollectionRatio(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/collection_ratio",
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

function loadTableCollectionRatio() {
    GetCollectionRatio(function (result) {
        var table = "";
        var id = 1;
        $.each(result, function (index, collvalue) {
            table += "<tr>";
            table += "<td>" + id++ + "</td>";
            table += "<td>" + collvalue.name + "</td>";
            table += "<td>" + collvalue.number + "</td>";
            table += "<td><span class='badge bg-success'>" + collvalue.ratio + "</span></td>";
            table += "<td><button id='" + collvalue.id + "' type='button' class='btn btn-block btn-primary btn-xs btnActionColl'>Select</button></td>";
            table += "</tr>";
        });
        $('#tblCollRatio tbody').html(table);
    });
}

function getCollectionRatiobyId(id, callBack) {

    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/collection_ratio/id/" + id,
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
//++++---------[COLLECTION RATIO SECTION END]---------++++//