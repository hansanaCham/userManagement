 function getFormVal() {
    var form = {
    "name": $('#txtOutputName').val(),
    "type":  $('#typeCombo').val(),
    "nature": $('#natureCombo').val(),
    };

var str = form.name;
if(str == "" || str.length ==0){
    alert('invalid Facility out put name!');
    return false;
}else
{
  return form;
}



  }



 $(document).on('click', '.val_sel', function () {
            $('#btnShowUpdate').removeClass('d-none');
            $('#btnshowDelete').removeClass('d-none');
            $('#btnSave').addClass('d-none');

       var btnData = JSON.parse(decodeURIComponent($(this).data('row')));

      $('#txtOutputName').val(btnData.name );
      $('#typeCombo').val(btnData.type);
      $('#natureCombo').val(btnData.nature);
  


     $("#btnDelete").val($(this).val());
    $("#btnUpdate").val($(this).val());
   });

 const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000
        });


 function alertSuccessMessage(msg)
 {
Toast.fire({
      type: 'success',
  title: msg
                    });

 }

  function alertErrorMessage(msg)
 {
 Toast.fire({
                        type: 'error',
                        title:msg
                    });

 }


  $('#btnReset').click(function () {
    
         refresh();

        });



         $('#btnshowDelete').click(
function()
{
 $('#modal-delete').modal('show');
});



  $('#btnShowUpdate').click(
function()
{
 $('#modal-update').modal('show');
});




function refresh()
{
            $('#btnShowUpdate').addClass('d-none');
            $('#btnshowDelete').addClass('d-none');
            $('#btnSave').removeClass('d-none');
$('#txtOutputName').val('');

            loadTypeCombo(
function()
{
    loadNatureTypeCombo();
    loadFacilityOutputTypeTabel();
}

    );

}
