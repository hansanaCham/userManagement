 $('#btnDelete').click(function () {
        delete_update_facility_out_put($(this).val(),
function(result)
{


          if (result.id == 1) {
                            alertSuccessMessage('Successfull');
                    loadFacilityOutputTypeTabel();
                } else {
                    alertErrorMessage('Something went wrong')
                
                }


              $('#btnShowUpdate').addClass('d-none');
            $('#btnshowDelete').addClass('d-none');
            $('#btnSave').removeClass('d-none');
    });
        });




function delete_update_facility_out_put(id,callBack)
   {
    $.ajax({
        type: "DELETE",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/facilityoutputtypes/id/" + id,
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

