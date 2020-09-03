//++++---------[WASTE TYPE SECTION START]---------++++//
function AddWasteType(data, callBack) {
    $.ajax({
        type: "POST",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/WasteType",
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

function Validiteinsert(data) {
    var response = true;
    if (data.name.length == 0) {
        $('#valAttachment').removeClass('d-none');
        $('#valUnique').addClass('d-none');
        response = false;
    }
    return response;
}
//++++---------[WASTE TYPE SECTION END]---------++++//
//---///[END LINE]//---///
//++++---------[WASTE DESTINY SECTION START]---------++++//
function AddWasteDestiny(data, callBack) {
    $.ajax({
        type: "POST",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/density",
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

function ValiditeDestinsert(data) {
    var response = true;
    if (data.density.length == 0) {
        $('#emptyValDest').removeClass('d-none');
        response = false;
    }
    if (data.description.length == 0) {
        $('#emptyValDestDisc').removeClass('d-none');
        response = false;
    }
    return response;
}
//++++---------[WASTE DESTINY SECTION END]---------++++//
//---///[END LINE]//---///
//++++---------[COLLECTION RATIO SECTION START]---------++++//
function AddCollectionRatio(data, callBack) {
    $.ajax({
        type: "POST",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/collection_ratio",
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

function ValiditeCollinsert(data) {
    var response = true;
    if (data.name.length == 0) {
        $('#emptyValCname').removeClass('d-none');
        response = false;
    }
    if (data.number.length == 0) {
        $('#emptyValCnumb').removeClass('d-none');
        response = false;
    }
    if (data.ratio.length == 0) {
        $('#emptyValCratio').removeClass('d-none');
        response = false;
    }
    return response;
}
//++++---------[COLLECTION RATIO SECTION END]---------++++//