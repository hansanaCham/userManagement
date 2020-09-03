
function getWorkersFormVal() {

    var form = {

       "name" :  $('#txtName').val(),
       "address" :   $('#txtAddress').val(),
       "contact_no" :   $('#txtContact').val(),
       "nic" :   $('#txtNic').val(),
       "status" : $('#workerStatus').val(),
       "edu_qualification" :  $('#educationQualification').val(),
       "pro_qualification" :  $('#professionalQualification').val(),
       "position_id" :$('#workerPositioncombo').val()

   };

//alert(form.name);
    if (form.name.trim().length == 0) {
        alert('invalid name  !');
        return false;
    }

    // if (isNaN(form.status)) {
    //    alert('invalid status!');
    //     return false;
    // }

    // if (isNaN(form.edu_qualification)) {
    //    alert('invalid edu_qualification!');
    //     return false;
    // }
    //     if (isNaN(form.pro_qualification)) {
    //    alert('invalid pro_qualification!');
    //     return false;
    // }
    //     if (isNaN(form.position_id)) {
    //    alert('invalid position_id');
    //     return false;
    // }
    return form;

}


$('#btnReset').click(function () {
 refresh();


});
function refresh()
{


           $('#btnShowUpdate').addClass('d-none');
           $('#btnshowDelete').addClass('d-none');
            $('#btnSave').removeClass('d-none');


$('#txtName').val('');
        $('#txtAddress').val('');
        $('#txtContact').val('');
        $('#txtNic').val('');


loadWorkerTabel() ;

             loadWorkerPositionsCombo();
loadEducationalQulificationCombo();
loadProfessionalQulificationCombo();
loadworkerStatusCombo();

}

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


 $(document).on('click', '.val_sel', function () {
  $(this).removeClass('btn-success');
  $(this).addClass('btn-danger');
  //alert($(this).val());
            $('#btnShowUpdate').removeClass('d-none');
           $('#btnshowDelete').removeClass('d-none');
            $('#btnSave').addClass('d-none');

            var btnData = JSON.parse(decodeURIComponent($(this).data('row')));

      // $('#txtOutputName').val(btnData.name );
      // $('#typeCombo').val(btnData.type);
      // $('#natureCombo').val(btnData.nature);



       $('#txtName').val(btnData.name);
      $('#txtAddress').val(btnData.address);
       $('#txtContact').val(btnData.contact_no);
         $('#txtNic').val(btnData.nic);
       $('#workerStatus').val(btnData.status);
       $('#educationQualification').val(btnData.edu_qualification);
        $('#professionalQualification').val(btnData.pro_qualification);
      $('#workerPositioncombo').val(btnData.position_id);


 $("#btnSave").val($(this).val());
     $("#btnDelete").val($(this).val());
    $("#btnUpdate").val($(this).val());
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
