$('#btnSave').click(function () {
  
            save_tranfer_collection_segregate(getSegregationFormVal(), function (result) {
               
                        if (result.id == 1) {
                    Toast.fire({
                        type: 'success',
                        title: 'Saved Successfully'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Something Went Wrong!'
                    });
                }
        transferCollectionSegregation_Table($('#fromDate').val(),$('#toDate').val());
            });




});

function save_tranfer_collection_segregate(obj, callBack) {
    if (!obj) {
        return false;
    }
    $.ajax({
        type: "POST",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/transfer_segregate",
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

  