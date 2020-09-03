/*
*ajax requeat sample format
function save_survey_val(obj, callBack) {
    // alert(JSON.stringify(obj));
    var url = '';
    url = "/api/survey/result";
    $.ajax({
        type: "POST",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: url,
        data: obj,
        cache: false,
        success: function (result) {
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(result);
            }
        }
    });
}






*/

function load_ward_combo(callBack) {
    // alert(JSON.stringify(obj));
    var url = "api/wasteCollect/wards";
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
        success: function(result) {
            $(".wardCombo").empty();
            $.each(result, function(index, value) {
                // alert(value.name);
                $(".wardCombo").append(new Option(value.name, value.id));
            });

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

function load_vehicle_combo(callBack) {
    // alert(JSON.stringify(obj));
    var url = "api/wasteCollect/vehicles_with_out_ward";
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
        success: function(result) {
            $(".vehicleCombo").empty();
            $.each(result, function(index, value) {
                // alert(value.name);
                $(".vehicleCombo").append(
                    new Option(value.register_no, value.id)
                );
            });

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

function load_all_vehicle_tbl(callBack) {
    // alert(JSON.stringify(obj));
    var url = "api/wasteCollect/vehicles_with_ward";
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
        success: function(result) {
            //$('.vehicleCombo').empty();
            var ds_data = "";
            var i = 0;
            $.each(result, function(index, qData) {
                // alert(value.name);
                //$('#tblVehicle').append(new Option(value.register_no, value.register_no));

                ds_data +=
                    '<tr class="even pointer"><td class=" ">' +
                    ++i +
                    '</td><td class=" ">' +
                    qData.register_no +
                    '</td></td><td class=" ">' +
                    qData.ward.name +
                    '</td><td class=" "><button type="button" class="ab btn btn-danger btn-xs actionProject" data-row="' +
                    encodeURIComponent(JSON.stringify(qData)) +
                    '" value=' +
                    qData.register_no +
                    ">Delete</button></td></tr>";
            });

            $("#tblVehicle").html(ds_data);
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

function load_vehicle_table_for_selected_ward(wrdID, callBack) {
    // alert("From Load js" + wrdID);
    // alert(JSON.stringify(obj));
    // var url = "wasteCollect/vehicle_by_ward/id/{id}";
    var url = "api/wasteCollect/vehicle_by_ward/id/" + wrdID;
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
        success: function(result) {
            //$('.vehicleCombo').empty();
            var ds_data = "";
            var i = 0;
            $.each(result, function(index, qData) {
                // alert(value.name);
                //$('#tblVehicle').append(new Option(value.register_no, value.register_no));

                ds_data +=
                    '<tr class="even pointer"><td class=" ">' +
                    ++i +
                    '</td><td class=" ">' +
                    qData.register_no +
                    '</td></td><td class=" ">' +
                    qData.ward.name +
                    '</td><td class=" "><button type="button" class="ab btn btn-danger btn-xs actionProject" data-row="' +
                    encodeURIComponent(JSON.stringify(qData)) +
                    '" value=' +
                    qData.register_no +
                    ">Delete</button></td></tr>";
            });

            $("#tblVehicle").html(ds_data);
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

function load_selected_vehicle_details(vehicle_id, callBack) {
    // var url = "api/wasteCollect/vehicle_by_ward/id/" + wrdID;
    var url = "api/wasteCollect/vehicles/id/" + vehicle_id;
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
        success: function(result) {
            // alert(JSON.stringify(result));
            // alert(result.register_no);
            $("#txtRegistrationNo").html("&nbsp" + result.register_no);
            $("#txtVehicleOwnership").html("&nbsp" + result.ownership);
            $("#txtVehicleType").html("&nbsp" + result.vehicle_type_id);
            $("#txtCapacity").html(
                "&nbsp " + result.capacity + "m <sup>3</sup>"
            );

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
