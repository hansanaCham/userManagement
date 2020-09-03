 $('#btnDelete').click(function () {
        delete_tranfer_collection_segregate($(this).val(),
function(result)
{
   
         if (result.id == 1) {
               alertSuccessMessage('Deleted Successfully')
                } else {
                  alertErrorMessage('Fail to delete');
                }
        transferCollectionSegregation_Table($('#fromDate').val(),$('#toDate').val());
              $('#btnShowUpdate').addClass('d-none');
            $('#btnshowDelete').addClass('d-none');
            $('#btnSave').removeClass('d-none');
    });
        });




function delete_tranfer_collection_segregate(id,callBack)
   {
    $.ajax({
        type: "DELETE",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/transfer_segregate/id/" + id,
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

