 $('#btnDelete').click(function () {
    //alert('from delete btn');
        delete_worker($(this).val(),
function(result)
{



          if (result.id == 1) {
                            alertSuccessMessage('Successfull');
                        refresh();

                } else {
                    alertErrorMessage('Something went wrong')
                
                }


        
    });
        });




function delete_worker(id,callBack)
   {
    $.ajax({
        type: "DELETE",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/worker/id/" + id,
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

