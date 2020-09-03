function loadTransferVehicleCombo(callBack) {
    GetTransferVehicle(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += '<option selected data-row="' + encodeURIComponent(JSON.stringify(value)) + '" value="' + value.id + '" selected>' + value.register_no + '</option>';
        });
        $('#tranferVehicleCombo').html(combo);
        transferVehicleCap();
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}



function GetTransferVehicle(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/transfer_collection/transferVehicles",
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


function loadDestinationTypesCombo(callBack) {
    getDestinationTypes(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += "<option selected value='" + index + "' selected>" + value + "</option>";
        });
        $('#destinationTypeCombo').html(combo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}



function getDestinationTypes(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/transfer_collection/destinationTypes",
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





function loadDriversCombo(callBack) {
    getDrivers(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += "<option selected value='" + value.id + "' selected>" + value.first_name+' '+value.last_name + "</option>";
        });
        $('#driverCombo').html(combo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}



function getDrivers(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/transfer_collection/driver",
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


function loadDumpsitesCombo(callBack) {
    getDumpsites(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += "<option selected value='" + value.id + "' selected>" + value.name + "</option>";
        });
        $('#dump_siteCombo').html(combo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}



function getDumpsites(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/transfer_collection/dumpsites",
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





function loadPlantCombo(callBack) {
    getPlant(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += "<option selected value='" + value.id + "' selected>" + value.name + "</option>";
        });
        $('#dump_siteCombo').html(combo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}



function getPlant(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/transfer_collection/plant",
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
