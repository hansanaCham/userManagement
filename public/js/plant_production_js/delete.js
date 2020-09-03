 $('#btnDelete').click(function () {
    //alert('from delete btn');
        delete_plant_production($(this).val(),
function(result)
{



          if (result.id == 1) {
                            alertSuccessMessage('Successfull');
                        refresh();

                } else {
                    alertErrorMessage('Something went wrong')
                
                }


              $('#btnShowUpdate').addClass('d-none');
            $('#btnshowDelete').addClass('d-none');
            $('#btnSave').removeClass('d-none');
    });
        });




function delete_plant_production(id,callBack)
   {
    $.ajax({
        type: "DELETE",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/plant/plant_output/id/" + id,
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

