$('#btnSave').click(function () {
            save_facility_out_put(getFormVal(), function (result) {
               
                        if (result.id == 1) {
                            alertSuccessMessage('Successfull');
                    loadFacilityOutputTypeTabel();
                } else {
                    alertErrorMessage('Something went wrong')
                
                }
    
            });
});

function save_facility_out_put(obj, callBack) {
 

    if (!obj) {

        console.log('save function false');
        return false;


    }
    $.ajax({
        type: "POST",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/facilityoutputtypes",
        data: obj,
        //        contentType: 'text/json',
        //        dataType: "json",
        cache: false,
        success: function (result) {
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                
                callBack(result);
            }
        }
    });
}

  