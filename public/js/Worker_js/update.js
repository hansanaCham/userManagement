$('#btnUpdate').click(function () {
  //alert('update'+$(this).val());
  update_worker($(this).val(),getWorkersFormVal(), function (result) {
               
                        if (result.id == 1) {
                
                    alertSuccessMessage('Successfull');
                    refresh();
                } else {
              
                    alertErrorMessage('Something Went Wrong!');
                }

            });
});

function update_worker(id,data,callBack){
    if (!data) {
        return false;
    }
    $.ajax({
        type: "PUT",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/worker/id/"+id,
        data: data,
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

  