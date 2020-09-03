 $('#btnUpdate').click(function () {
        update_tranfer_collection_segregate($(this).val(),getSegregationFormVal(),
function(result)
{
         if (result.id == 1) {
                    Toast.fire({
                        type: 'success',
                        title: 'Successfull'
                    

                                    }); }else {
                    Toast.fire({
                        type: 'error',
                        title: 'Something Went Wrong!'
                    });
                }
            $('#btnShowUpdate').addClass('d-none');
            $('#btnshowDelete').addClass('d-none');
            $('#btnSave').removeClass('d-none');
        transferCollectionSegregation_Table($('#fromDate').val(),$('#toDate').val());
    });
        });



function update_tranfer_collection_segregate(id,data,callBack)
   {

    $.ajax({
        type: "PUT",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
       url: "api/transfer_segregate/id/" + id,
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


