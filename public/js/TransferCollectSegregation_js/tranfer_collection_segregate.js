var vhehicleCapacity =0;



function transferVehicleCap() {
    let row = JSON.parse(decodeURIComponent($('#tranferVehicleCombo :selected').data('row')));
      //  console.log(row.capacity);
      vhehicleCapacity =parseFloat(row.capacity).toFixed(2);
    $('#lblVehileCapasity').html(parseFloat(row.capacity).toFixed(2));
}


        $('#tranferVehicleCombo').change(function () {
            transferVehicleCap();
            // ward();
            // estCollAmount();
        });

function transfer_estCollAmount() {
    let veh_cap = parseFloat($('#lblVehileCapasity').html());
    let density = parseFloat($('#densityrCombo').val());
    let ratio = parseFloat($('#ratioCombo').val());
    let amt = (veh_cap * density * ratio).toFixed(2);
    //alert(amt);
    $('#lblReading').html(amt)
}



function save_tranfer_collection_segregate(obj, callBack) {
    if (!obj) {
        return false;
    }
    $.ajax({
        type: "POST",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/transfer_segregate",
        data: obj,
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



function getSegregationFormVal() {

    var form = {
    "vehicle_id": parseInt($('#tranferVehicleCombo').val()),
    "amount":  parseFloat($('#wasteAmount').val()),
    "destination_type": $('#destinationTypeCombo').val(),
    "destination_id": $('#destination_Combo').val(),
    "date": $('#wasteCollectionDate').val(),
    "segregatable_part_id":$('#segregationType_Combo').val(),    
    "driver_id": $('#driverCombo').val()
    };


    if (isNaN(form.vehicle_id)) {
        alert('invalid segregate vehicle  !');
        return false;
    }

    if (isNaN(form.amount)) {
       alert('invalid waste Amount!');
        return false;
    }


    return form;
}

function load_dencity_combo()
{
     dencity_Combo(parseInt($('#wastTypeCombo :selected').val()), function () {
               transfer_estCollAmount();
            });
}


function transferCollectionSegregation_Table(f_date,t_date,callBack) {
    // f_date ='2020-04-22';
    // t_date ='2020-04-22';
    var tbl = '';
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },

        url: "/api/transfer_segregate/from/"+f_date+"/to/"+t_date,
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                tbl += '<tr>';
                tbl += '<td>' + ++index + '</td>';
                tbl += '<td>' + row.register_no + '</td>';
                tbl += '<td>' + row.segregatable_name + '</td>';
                tbl += '<td>' + row.destination_type + '</td>';
                tbl += '<td>' + row.amount + '</td>';     
                tbl += '<td>' + row.date + '</td>';            
                tbl += '<td><button type="button" data-row="' + encodeURIComponent(JSON.stringify(row)) + '"  value="' + row.id + '" class="btn btn-success btn-sm val_sel">Select</button></td></tr>';
            });
            $('#transfer_collectionTbl tbody').html(tbl);
            $("#transfer_collectionTbl").DataTable(); 
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });


}

        $(document).on('click', '.val_sel', function () {
            $('#btnShowUpdate').removeClass('d-none');
            $('#btnshowDelete').removeClass('d-none');
            $('#btnSave').addClass('d-none');

       var btnData = JSON.parse(decodeURIComponent($(this).data('row')));

       $('#wasteAmount').val(btnData.amount);
        $('#tranferVehicleCombo').val(btnData.vehicle_id);
$('#destinationTypeCombo').val(btnData.destination_type);
 $('#destination_Combo').val(btnData.destination_id);
  $('#wasteCollectionDate').val(btnData.date);
  $('#segregationType_Combo').val(btnData.segregatable_part_id);
  $('#driverCombo').val(btnData.driver_id);


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