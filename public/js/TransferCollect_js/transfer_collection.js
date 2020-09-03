var vhehicleCapacity =0;

$('#destinationTypeCombo').change(
function()
{
destinationType();
});


function destinationType()
{

        if ($('#destinationTypeCombo').val() == 'dumpsite') {
loadDumpsitesCombo();
    }
    if ($('#destinationTypeCombo').val() == 'plant') {
loadPlantCombo();
    }
}

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



function save_tranfer_collection(obj, callBack) {
    if (!obj) {
        return false;
    }
    $.ajax({
        type: "POST",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/transfer_collection",
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



function getTransferFormVal() {
// alert($('#densityrCombo').val());
    var form = {
    "vehicle_id": parseInt($('#tranferVehicleCombo').val()),
    "waste_type_id": parseInt($('#wastTypeCombo').val()),
    "amount": parseFloat($('#wasteAmount').val()),
    "is_accurate": parseInt($('input[name="acurateCheck"]:checked').val()),
    "density": parseFloat($('#densityrCombo').val()),
    "ratio": parseFloat($('#ratioCombo').val()),
    "vehicle_capacity": vhehicleCapacity,
    "destination_type": $('#destinationTypeCombo').val(),
    "destination_id": $('#dump_siteCombo').val(),
    "date": $('#wasteCollectionDate').val(),
    "is_updatable": 1,
    "driver_id": $('#driverCombo').val()
    };


    if (isNaN(form.vehicle_id)) {
        alert('invalid vehicle !');
        return false;
    }
    if (isNaN(form.waste_type_id)) {
        alert('invalid waste Type !');
        return false;
    }


    if (form.is_accurate == 2) {
       
    if (isNaN(form.amount)) {
       alert('invalid waste Amount!');
        return false;
    }
            if (isNaN(form.density)) {
        alert('invalid dencity !');
        return false;
    }
    if (isNaN(form.ratio)) {
        alert('invalid ratio !');
        return false;
    }
    }

    return form;
}



function transferCollection_Table(f_date,t_date,callBack) {
    // f_date ='2020-04-22';
    // t_date ='2020-04-22';
    var tbl = '';
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },

        url: "/api/transfer_collection/from/"+f_date+"/to/"+t_date,
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
            
                tbl += '<tr>';
                tbl += '<td>' + ++index + '</td>';
                 tbl += '<td>' + row.register_no + '</td>';
                 tbl += '<td>' + row.vehicle_capacity + '</td>';
                 tbl += '<td>' + row.waste_type_name + '</td>';
                if (row.is_accurate == 1) {
                    tbl += '<td class="text-right"><span class="text-success">' + parseFloat(row.amount).toFixed(2) + '</span></td>';
                } else {
                    tbl += '<td class="text-right"><span class="text-danger">' + parseFloat(row.amount).toFixed(2) + '</span></td>';
                }
                   tbl += '<td>' + row.date + '</td>';                 

                tbl += '<td>' + row.destination_type + '</td>';

                tbl += '<td><button type="button" data-row="' + encodeURIComponent(JSON.stringify(row)) + '"  value="' + row.id + '" class="btn btn-danger btn-sm val_sel">Delete</button></td></tr>';
            });
            $('#transfer_collectionTbl tbody').html(tbl);
            $("#transfer_collectionTbl").DataTable(); 
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });


}