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




 $(document).on('click', '.val_sel_dte_range', function () {
  $(this).removeClass('btn-success');
  $(this).addClass('btn-danger');
  //alert($(this).val());
            $('#btnShowUpdate').removeClass('d-none');
           $('#btnshowDelete').removeClass('d-none');
            $('#btnSave').addClass('d-none');

      var btnData = JSON.parse(decodeURIComponent($(this).data('row')));

              var ui = "";
         var txtId ;

//alert(JSON.stringify(btnData.plant_outputs));
        $.each(btnData.output, function (index, value) {

txtId =value.facility_output_type_id;
         // txtId = txtId.replace(/\s/g, '_');
         // txtId = txtId.toLowerCase();
              ui += "<div class=\"form-group\">";
ui += "<label>"+value.output_name+"</label>";
ui += "<input id=\"txt_"+txtId+"\" type=\"number\" data-row=\"" + encodeURIComponent(JSON.stringify(value)) + "\" class=\" text-right form-control form-control-sm forms_textUpdateInputs\" placeholder=\"Enter "+value.output_name+" amount\" value=\""+value.output_amount+"\">";
ui += "</div>";           
        });
        $('#div_txt_holder').html(ui);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
      $("#btnUpdate").data('row',$(this).data('row'));
      // $('#txtOutputName').val(btnData.name );
      // $('#typeCombo').val(btnData.type);
      // $('#natureCombo').val(btnData.nature);
  

 $("#btnSave").val($(this).val());
     $("#btnDelete").val($(this).val());
    $("#btnUpdate").val($(this).val());
   });





 $(document).on('click', '.val_sel', function () {
  $(this).removeClass('btn-success');
  $(this).addClass('btn-danger');
  //alert($(this).val());
            // $('#btnShowUpdate').removeClass('d-none');
           // $('#btnshowDelete').removeClass('d-none');
            //$('#btnSave').addClass('d-none');

            var btnData = JSON.parse(decodeURIComponent($(this).data('row')));

      // $('#txtOutputName').val(btnData.name );
      // $('#typeCombo').val(btnData.type);
      // $('#natureCombo').val(btnData.nature);
  
$('#btnSave').prop("disabled", false);
 $("#btnSave").val($(this).val());
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
// $('#txtOutputName').val('');
var txt = $('.forms_textInputs');

            $.each(txt, function (index, value) 
       {
       

         $(value).val('0');

       
         
       });

$('#btnSave').prop("disabled", true);
loadPendingBioCompostTabel();
loadPendingBioCompostTabel_by_date_range($('#fromDate').val(),$('#toDate').val());
loadPlantTypeUI();
  

}


$('#tbnLoadTbl').click(function () {
          loadPendingBioCompostTabel_by_date_range($('#fromDate').val(),$('#toDate').val());
        });