//++++---------[WASTE TYPE SECTION START]---------++++//
function updateWastetype(id,data,callBack) {
    $.ajax({
        type: "PUT",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/WasteType/id/"+ id,
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

function Validiteupdate(data){
    var response = true;
    if(data.name.length == 0){
        $('#valAttachment').removeClass('d-none');
        response = false;
    }
    return response;
}
//++++---------[WASTE TYPE SECTION END]---------++++//
//---///[END LINE]//---///
//++++---------[WASTE DESTINY SECTION START]---------++++//
function updateWasteDestiny(id,data,callBack) {
    $.ajax({
        type: "PUT",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/density/id/"+ id,
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

function ValiditeDestUpdate(data) {
    var response = true;
    if (data.density.length == 0) {
        $('#emptyValDest').removeClass('d-none');
        response = false;
    }if (data.description.length == 0){
        $('#emptyValDestDisc').removeClass('d-none');
        response = false;
    }
    return response;
}
//++++---------[WASTE DESTINY SECTION END]---------++++//
//---///[END LINE]//---///
//++++---------[DESTINY ASSIGN SECTION START]---------++++//
function setDestinyActive(id,callBack) {
    $.ajax({
        type: "PATCH",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/set_density_active/id/"+ id,
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
//++++---------[DESTINY ASSIGN SECTION END]---------++++//
//---///[END LINE]//---///
//++++---------[COLLECTION RATIO SECTION START]---------++++//
function updateCollectionRatio(id,data,callBack) {
    $.ajax({
        type: "PUT",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/collection_ratio/id/"+ id,
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

function ValiditeCollUpdate(data) {
    var response = true;
    if (data.name.length == 0) {
        $('#emptyValDest').removeClass('d-none');
        response = false;
    }if (data.number.length == 0){
        $('#emptyValDestDisc').removeClass('d-none');
        response = false;
    }
    return response;
}
//++++---------[COLLECTION RATIO SECTION END]---------++++//