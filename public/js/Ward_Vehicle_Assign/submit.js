function save_vehicle_assign(submitData, callBack) {
    //alert(submitData.ward_id);

    // alert(JSON.stringify(obj));
    var url = "api/wasteCollect/ward/to_vehicle";
    $.ajax({
        type: "post",
        headers: {
            Authorization:
                "Bearer " + $("meta[name=api-token]").attr("content"),
            Accept: "application/json"
        },
        url: url,
        data: submitData,
        cache: false,
        success: function(result) {
            if (result.id == 1) {
                Toast.fire({
                    type: "success",
                    title:
                        "Waste Management System</br>Vehicle Assigned and saved "
                });
            }

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

function delete_vehicle_assign(submitData, callBack) {
    // alert("vehicle id" + submitData.id);
    // alert(JSON.stringify(obj));

    var url = "api/wasteCollect/ward/to_vehicle";
    $.ajax({
        type: "delete",
        headers: {
            Authorization:
                "Bearer " + $("meta[name=api-token]").attr("content"),
            Accept: "application/json"
        },
        url: url,
        data: submitData,
        cache: false,
        success: function(result) {
            if (result.id == 1) {
                Toast.fire({
                    type: "success",
                    title:
                        "Waste Management System</br>Vehicle Deleted from Assigned "
                });
            }

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
