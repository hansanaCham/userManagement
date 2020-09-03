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
        url: "api/transfer_segregate/destination_types",
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




$('#destinationTypeCombo').change(
function()
{
destinationType();
});


function destinationType()
{

        if ($('#destinationTypeCombo').val() == 'stores') {
          
loadStoreCombo();
    }
    if ($('#destinationTypeCombo').val() == 'sampath') {
     
loadSampathKendrayaCombo();
    }
}

function loadSampathKendrayaCombo(callBack) {
    getSampathKendraya(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += "<option selected value='" + value.id + "' selected>" + value.name + "</option>";
        });
        $('#destination_Combo').html(combo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}



function getSampathKendraya(callBack) {
  
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/get_sampath_kendraya",
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





function loadStoreCombo(callBack) {
    getStore(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += "<option selected value='" + value.id + "' selected>" + value.name + "</option>";
        });
        $('#destination_Combo').html(combo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}



function getStore(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/transfer_store",
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





function loadSegregationTypeCombo(callBack) {

    getsegregationType(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += "<option selected value='" + value.id + "' selected>" + value.name + "</option>";
        });
        $('#segregationType_Combo').html(combo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}



function getsegregationType(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/wasteCollect/segregation",
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