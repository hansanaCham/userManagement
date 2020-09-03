 $('#btnUpdate').click(function () {
        update_facility_out_put($(this).val(),getFormVal(),
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



function update_facility_out_put(id,data,callBack)
   {

    $.ajax({
        type: "PUT",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
       url: "api/facilityoutputtypes/id/" + id,
        data: data,
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


