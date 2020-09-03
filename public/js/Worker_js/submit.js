$('#btnSave').click(function () {
  
            save_worker(getWorkersFormVal(), function (result) {
               
                        if (result.id == 1) {
                
                    alertSuccessMessage('Saved Successfully');
                    refresh();
                } else {
              
                    alertErrorMessage('Something Went Wrong!');
                }

            });




});

function save_worker(obj, callBack) {
    if (!obj) {
        return false;
    }
    $.ajax({
        type: "POST",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/worker",
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

  