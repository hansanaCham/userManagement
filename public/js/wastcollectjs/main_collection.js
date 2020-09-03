function vehicleByLa_Combo(id,callBack) {

    var cbo = '';
    $('.vehicleCombo').html(cbo);
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/get_runnable_vehicle_by_authority/id/"+ id,
        cache: false,
        success: function (result) {
           if (result.length == 0) {
            cbo = "<option value='0'>No Data Found</option>";
        } else {
  $.each(result, function (index, row) {
                cbo += '<option data-row="' + encodeURIComponent(JSON.stringify(row)) + '" value="' + row.id + '">' + row.register_no + '</option>';
            });

        }      
   $('.vehicleCombo').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}
function vehicleTypes(callBack) {
    var cbo = '';
    $('#driverCombo').html(cbo);
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/vehicleTypes",
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                cbo += '<option data-row="' + encodeURIComponent(JSON.stringify(row)) + '" value="' + row.id + '">' + row.type + '</option>';
            });
            $('#vehicle_typeCombo').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}
function tempVehicleCombo(callBack) {
    var cbo = '';
    $('#driverCombo').html(cbo);
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/get_tempory_vehicle",
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                cbo += '<option data-row="' + encodeURIComponent(JSON.stringify(row)) + '" value="' + row.id + '">' + row.register_no + '</option>';
            });
            $('#temp_veh_id_Combo').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}
function is_acurateReading(is_acc) {
    if (is_acc == 1) {
        $('#accurateYes').show('hidden');
        $('#accurateNo').hide('hidden');
    } else {
        $('#accurateYes').hide('hidden');
        $('#accurateNo').show('hidden');
    }
}
function comboDriver(la_id,callBack) {
 
    var cbo = '';
    $('#driverCombo').html(cbo);
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/drivers/id/"+la_id,
        cache: false,
        success: function (result) {
                     if (result.length == 0) {
            cbo = "<option value='0'>No Data Found</option>";
        } else {
            $.each(result, function (index, row) {
                cbo += '<option data-row="' + encodeURIComponent(JSON.stringify(row)) + '" value="' + row.id + '">' + row.first_name + '</option>';
            });
        }
            $('#driverCombo').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}
function comboSession(callBack) {
    var cbo = '';
    $('#sessionCombo').html(cbo);
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/wasteCollect/collection_sessions",
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                cbo += '<option data-row="' + encodeURIComponent(JSON.stringify(row)) + '" value="' + index + '">' + row + '</option>';
            });
            $('#sessionCombo').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}
function ratio_Combo(callBack) {
    var cbo = '';
    $('#ratioCombo').html(cbo);
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/collection_ratio",
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                cbo += '<option value="' + parseFloat(row.ratio).toFixed(2) + '">' + row.name + " / " + row.number + '</option>';
            });
            $('#ratioCombo').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }, error: function (xhr, textStatus, errorThrown) {
            alert(textStatus + ':' + errorThrown);
        }
    });
}
function wasteType_Combo(callBack) {
    var cbo = '';
    $('.wstTypeCombo').html(cbo);
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/WasteType",
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                cbo += '<option data-row="' + encodeURIComponent(JSON.stringify(row)) + '" value="' + row.id + '">' + row.name + '</option>';
            });
            $('.wstTypeCombo').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}
function wardCombo(la_id,callBack) {
   // alert('ward combo load');
    var cbo = '';
    $('.wardCombo').html(cbo);
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/get_word_by_authority/id/"+la_id,
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                cbo += '<option data-row="' + encodeURIComponent(JSON.stringify(row)) + '" value="' + row.id + '">' + row.name + '</option>';
            });
            $('.wardCombo').html(cbo);
            
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });

    $("#wardCombo").prop("disabled", true);
}
function dencity_Combo(waste_type, callBack) {
    var cbo = '';
    let url = "/api/density_by_waste_type_and_active/id/";
    if ($('#getAllDensity').is(":checked")) {
        url = "/api/density_by_waste_type/id/";
    }

    $('#densityrCombo').html(cbo);
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: url + waste_type,
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                cbo += '<option value="' + parseFloat(row.density).toFixed(2) + '">' + row.density + ' - ' + row.description + '</option>';
            });
            $('#densityrCombo').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}
function destinationByType_Combo(callBack) {
    let dest_cat = $('#destinationTypeCombo :selected').val();
    let filter = 'la';
    if ($('#getAll').is(':checked')) {
        filter = ['all'];
    }
    get_all_destinations(dest[dest_cat][filter], function (pm) {
        iterate_destinations(pm, function () {
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        });
    });
}
function iterate_destinations(obj, callBack) {
    var cbo = '';
    if (obj.length == 0) {
        cbo += '<option value="0">- No Data Found -</option>';
    } else {
        $.each(obj, function (index, row) {
            cbo += '<option value="' + row.id + '">' + row.name + '</option>';
        });
    }
    $('.destinationCmb').html(cbo);
    if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
        callBack(cbo);
    }
}
function get_all_destinations(des_type, callBack) {
    var api_path = des_type;

    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/" + api_path,
        cache: false,
        success: function (result) {
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(result);
            }
        }
    });
}
function vehicleById(id, callBack) {

    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/vehicle_by_id/" + id,
        cache: false,
        success: function (result) {
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(result);
            }
        }
    });
}
var dest = {
    transferStation: {
        la: 'get_transferstation_by_level',
        all: 'getalltransferstation',
    },
    dumpsite: {
        la: 'get_dumpsite_by_level',
        all: 'get_all_dumpsite',
    },
    plant: {
        la: 'get_plant_by_level',
        all: 'getallplant',
    },
};

function getFormVal() {
    var form = {
        "vehicle_id": parseInt($('#vehicleNumberCombo').val()),
        "driver_id": parseInt($('#driverCombo').val()),
        "waste_type_id": parseInt($('#wastTypeCombo').val()),
        "ward_id": parseInt($('#wardCombo').val()),
        "is_accurate": parseInt($('input[name="acurateCheck"]:checked').val()),
        "destination_type": $('#destinationTypeCombo').val(),
        "session": $('#sessionCombo').val(),
        "destination_id": parseInt($('#destinationCombo').val()),
        "date": $('#wasteCollectionDate').val(),
        "amount": parseFloat($('#wasteAmount').val()),
        "density": parseFloat($('#densityrCombo').val()),
        "ratio": parseFloat($('#ratioCombo').val()),
        "is_tempory": parseInt($('#veh_type_combo').val()),
       "local_authority_id": $("#local_authority_combo").val()
    };
    if (form.is_tempory === 1) {
        if (parseInt($('#is_reg_veh').val()) === 1) {//1=>new temp vehicle
            form.registerNo = $('#temp_veh_no').val().trim();
            form.type = parseInt($('#vehicle_typeCombo').val());
            delete form.vehicle_id;
            if (isNaN(form.type)) {
                alert('Please Enter Vehicle Type !');
                return false;
            }
            if (form.registerNo.length == 0) {
                alert('Please Enter Temporary Vehicle Number!');
                return false;
            }
        } else {
            form.vehicle_id = parseInt($('#temp_veh_id_Combo').val());
            if (isNaN(form.vehicle_id)) {
                alert('Invalid Temporary Vehicle!');
                return false;
            }
        }
    }
//    if (isNaN(form.vehicle_id)) {
//        alert('invalid vehicle !');
//        return false;
//    }
    if (isNaN(form.waste_type_id)) {
        alert('invalid waste Type !');
        return false;
    }
    if (isNaN(form.destination_id)) {
        alert('invalid Destination !');
        return false;
    }

    if (isNaN(form.ratio)) {
        alert('invalid ratio !');
        return false;
    }
    if (form.is_accurate == 1) {
        if (isNaN(form.amount)) {
            alert('invalid waste Amount!');
            return false;
        }
    } else {
        if (isNaN(form.density)) {
            alert('invalid dencity !');
            return false;
        }
    }


    return form;
}
function save_collection(obj, callBack) {
    if (!obj) {
        return false;
    }
    $.ajax({
        type: "POST",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/main_collection",
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

function saveMainCollectionFromPlants(formData) {
    ajaxRequest('POST', '/api/main_collection_all', formData, function (respo) {
        show_mesege(respo);
    });
}

function mainCollection_Table(id,callBack) {
 
    var tbl = '';
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/get_submitted_main_collection/id/"+ id,
        cache: false,
        success: function (result) {


                       if (result.length == 0) {
            tbl = "<tr><td colspan='6' class='text-center text-danger'>No data found</td> </tr>";
        } else {
            $.each(result, function (index, row) {
                tbl += '<tr>';
                tbl += '<td>' + ++index + '</td>';
                tbl += '<td>' + row.register_no + '</td>';
                tbl += '<td>' + row.waste_type_name + '</td>';
                if (row.is_accurate == 1) {
                    tbl += '<td class="text-right"><span class="text-success">' + parseFloat(row.amount).toFixed(2) + '</span></td>';
                } else {
                    tbl += '<td class="text-right"><span class="text-danger">' + parseFloat(row.amount).toFixed(2) + '</span></td>';
                }

                tbl += '<td>' + row.date + '</td>';
                tbl += '<td><button type="button" data-row="' + encodeURIComponent(JSON.stringify(row)) + '"  value="' + row.id + '" class="btn btn-default val_sel"><i class="fa fa-plus"></i></button></td></tr>';
            });
        }
            $('#collectionTbl tbody').html(tbl);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}
function mainCollection_row(id, callBack) {
    if (isNaN(id)) {
        return false;
    }
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/main_collection/id/" + id,
        cache: false,
        success: function (result) {
            result = result[0];
            $('#radYes, #radNo').prop("disabled", true);
            if (result.is_accurate == 1) {
                $("#radYes").prop("checked", true);
                $("#radNo").prop("checked", false);
                $('#accurateYes').show('hidden');
                $('#accurateNo').hide('hidden');
            } else {
                $("#radYes").prop("checked", false);
                $("#radNo").prop("checked", true);
                $('#accurateYes').hide('hidden');
                $('#accurateNo').show('hidden');
            }
            $('#vehicleNumberCombo').val(result.vehicle_id);
            $('#wastTypeCombo').val(result.waste_type_id);
            $('input[name="acurateCheck"]:checked').val(result.result);
            $('#destinationTypeCombo').val(result.destination_type);
            $('#destinationCombo').val(result.destination_id);
            $('#wasteCollectionDate').val(result.date);
            $('#wasteAmount').val(result.amount);
            $('#densityrCombo').val(parseFloat(result.density).toFixed(2));
            $('#ratioCombo').val(parseFloat(result.ratio).toFixed(2));
            $('#btnUpdate').val(id);
            $('#btnshowDelete').val(id);
            $("#wardCombo").val(result.ward_id);
            $("#wardCombo").prop("disabled", true);
            $("#getAllWard").prop("checked", false);
            // vehicleById($(".vehicleCombo").val(), function (result) {
            //     if (result.ward_id != null) {
            //         $(".wardCombo").val(result.ward_id);
            //         $("#wardCombo").prop("disabled", true);
            //     } else {

            //     }
            // });
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}
function resetForm() {
    $('#btnUpdate').addClass('d-none');
    $('#btnshowDelete').addClass('d-none');
    $('#btnSave').removeClass('d-none');
    $('#radYes, #radNo').prop("disabled", false);

    $('#temp_veh_no').val('');
    $('#wasteAmount').val('');
    $('#wasteCollectionDate').val('');
}

function deleteCollectionData(del_id, callBack) {
    if (!confirm('Are You Sure You Want To Delete This Record?')) {
        return false;
    }
    if (isNaN(del_id)) {
        alert('Invalid Selection!');
        return false;
    }

    $.ajax({
        type: "DELETE",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/main_collection/id/" + del_id,
        cache: false,
        success: function (result) {
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(result);
            }
        }, error: function (xhr, textStatus, errorThrown) {
            alert(textStatus + ':' + errorThrown);
        }
    });
}
function vehicleCap() {
    let row = JSON.parse(decodeURIComponent($('#vehicleNumberCombo :selected').data('row')));
    //    console.log(row.capacity);
    $('#lblVehileCapasity').html(parseFloat(row.capacity).toFixed(2));
}
function estCollAmount() {
    let veh_cap = parseFloat($('#lblVehileCapasity').html());
    let density = parseFloat($('#densityrCombo').val());
    let ratio = parseFloat($('#ratioCombo').val());
    let amt = (veh_cap * density * ratio).toFixed(2);
    $('#lblReading').html(amt)
}



//submit codes

function get_pending_waste_collection(callBack) {
    var tbl = '';
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/get_submitted_main_collection",
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                tbl += '<tr>';
                tbl += '<td>' + ++index + '</td>';
                tbl += '<td>' + row.register_no + '</td>';
                tbl += '<td>' + row.waste_type_name + '</td>';
                tbl += '<td>' + row.destination_type + '</td>';

                if (row.is_accurate == 1) {
                    tbl += '<td class="text-right"><span class="text-success">' + parseFloat(row.amount).toFixed(2) + '</span></td>';
                } else {
                    tbl += '<td class="text-right"><span class="text-danger">' + parseFloat(row.amount).toFixed(2) + '</span></td>';
                }

                tbl += '<td>' + row.date + '</td>';
                tbl += '</tr>';
            });
            $('#collectionTbl tbody').html(tbl);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}


function get_pending_summery(callBack) {
    var tbl = '';
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/wasteCollect/pending/result",
        cache: false,
        success: function (result) {
            var crd = '';
            var wstype = result.total;
            $('#txt_summery_total').html('<strong>' + result.total + '</strong>');
            //alert( result.total);
            crd += '<div class="card card-primary">';
            crd += '<div class="card-header">';
            crd += '<h3 class="text-info">Total Waste Types Summary</h3>';
            crd += '<div class="card-body">';
            crd += '<div class="row mt-3">';
            $.each(result.waste_type, function (index3, row3) {


                crd += '<div class="col-12">';
                crd += '<h1 >' + index3 + ': <span id="txt_summery_total" class="text-danger">' + row3 + '</span></h1>';
                crd += '</div>';


                // alert(index2 + '=' +row2);
            });

            crd += '</div>';
            crd += '</div> ';
            crd += '</div>';
            crd += '</div><!-- end card --> ';

            $.each(result.wards, function (index, row) {
                crd += '<div class="card card-primary">';
                crd += '<div class="card-header">';
                crd += '<h3 class="text-info">' + index + '</h3>';
                crd += '<div class="card-body">';
                crd += '<div class="row mt-3">';

                $.each(row, function (index2, row2) {


                    crd += '<div class="col-12">';
                    crd += '<h6>' + index2 + ': <span id="txt_summery_total" class="text-danger">' + row2 + '</span></h6>';
                    crd += '</div>';


                    // alert(index2 + '=' +row2);
                });

                crd += '</div>';
                crd += '</div> ';
                crd += '</div>';
                crd += '</div><!-- end card --> ';


                //JSON.stringify(row2)  
            });


            $('#word_container').html(crd);

            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}
function submit_pending(callBack) {
    // if (!obj) {
    //     return false;
    // }
    $.ajax({
        type: "POST",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/wasteCollect/pending/submit",
        // data: obj,
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

function localAuthorityCombo() {
    let option_data = "";
    ajaxRequest("GET", "api/report/localauth_report", null, function (resp) {
        if (resp.length == 0) {
            option_data = "<option value='0'>No Data Found</option>";
        } else {
            $.each(resp, function (index, row) {
                option_data += "<option value='" + row.id + "'>" + row.name + "</option>";
            });
        }
        $("#laCombo").html(option_data);
    });
}
//end submit codes


//load local authorities for waste collection
function localAuthorityComboWasteCollection(callBack) {
 
     let option_data = "";
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/localAuthorities",
        data: null,
        dataType: "json",
        cache: false,
        processDaate: false,
        success: function (result) {
            

                if (result.length == 0) {
            option_data = "<option value='0'>No Data Found</option>";
        } else {
            $.each(result, function (index, row) {

                option_data += "<option value='" + row.id + "'>" + row.name + "</option>";
            });
        }

         $("#local_authority_combo").html(option_data);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(result);
            }
        }
    });


}



//end load local authorities for waste collection