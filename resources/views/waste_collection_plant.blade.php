@extends('layouts.admin')
@extends('layouts.styles')
@extends('layouts.scripts')
@extends('layouts.navbar')
@extends('layouts.sidebar')
@extends('layouts.footer')
@section('pageStyles')
<!-- Select2 -->
<link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/dist/css/adminlte.min.css">
<style type="text/css">
    .bs-example {
        font-family: sans-serif;
        position: relative;
        margin: 100px;
    }
    .typeahead, .tt-query, .tt-hint {
        border: 2px solid #CCCCCC;
        border-radius: 8px;
        font-size: 22px; /* Set input font size */
        height: 30px;
        line-height: 30px;
        outline: medium none;
        padding: 8px 12px;
        width: 396px;
    }
    .typeahead {
        background-color: #FFFFFF;
    }
    .typeahead:focus {
        border: 2px solid #0097CF;
    }
    .tt-query {
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
    }
    .tt-hint {
        color: #999999;
    }
    .tt-menu {
        background-color: #FFFFFF;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        margin-top: 12px;
        padding: 8px 0;
        width: 422px;
    }
    .tt-suggestion {
        font-size: 22px;  /* Set suggestion dropdown font size */
        padding: 3px 20px;
    }
    .tt-suggestion:hover {
        cursor: pointer;
        background-color: #0097CF;
        color: #FFFFFF;
    }
    .tt-suggestion p {
        margin: 0;
    }
</style>
<!-- Google Font: Source Sans Pro -->
@endsection

@section('content')
{{--    {{dump($pageAuth)}}--}}
@if($pageAuth['is_read']==1 || false)
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 col-sm-6">
                <h1>Waste Collection Plant</h1>
            </div>
        </div>
    </div>
</section>
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade show active" id="waste-type" role="tabpanel" aria-labelledby="waste-type-tab">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <label>Add New Waste Type</label>
                                            </div>
                                            <form method="POST" action="/dumpsite">
                                                <div class="card-body">

                                                    <div class="form-group" id="LaComboDev">
                                                        <label>Local Authority</label>
                                                        <select class="form-control form-control-sm" id="laCombo"></select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Vehicle Type</label>
                                                        <select class="form-control form-control-sm" style="width: 100%;" id="veh_type_combo">
                                                            <option value="0">Old Vehicle</option>
                                                            <option value="1">Temporary Vehicle</option>
                                                        </select>                                            
                                                    </div>

                                                    <div id="temp_vehicle_section" class="d-none">
                                                        <div class="form-group">
                                                            <select class="form-control form-control-sm" style="width: 100%;" id="is_reg_veh">
                                                                <option value="0">Select Vehicle</option>
                                                                <option value="1">Add Vehicle</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group" id="temp_veh_combo_div">
                                                            <label>Select Temporary Vehicle</label>
                                                            <select class="form-control form-control-sm" style="width: 100%;" id="temp_veh_id_Combo"></select>                                            
                                                        </div>

                                                        <div class="d-none" id="add_temp_veh">
                                                            <div class="form-group" id="temp_veh_combo_div">
                                                                <label>Select Temporary Vehicle Type</label>
                                                                <select class="form-control form-control-sm" style="width: 100%;" id="vehicle_typeCombo"></select>                                            
                                                            </div>
                                                            <div class="form-group">
                                                                <label>vehicle No:</label>
                                                                <input type="text" class="form-control form-control-sm" placeholder="add vehicle Number here" id="temp_veh_no">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div id="reg_vehicle_section">
                                                        <div class="form-group" id="">
                                                            <label>Vehicle Number</label>
                                                            <select class="form-control form-control-sm vehicleCombo" data-dropdown-css-class="select2-purple" style="width: 100%;" id="vehicleNumberCombo"></select>                                            
                                                        </div>
                                                    </div>

                                                    <!-- driver  -->
                                                    <div class="form-group">
                                                        <label>Driver</label>
                                                        <select class="form-control form-control-sm destiTypeCombo" data-dropdown-css-class="select2-purple" style="width: 100%;" id="driverCombo">
                                                            <option value="#" > Loading...</option>
                                                        </select>                                  
                                                    </div> 
                                                    <!-- end driver -->
                                                    <div class="form-group">

                                                        <label>Ward</label>
                                                        <div class="icheck-primary d-inline mx-2">
                                                            <input type="checkbox" id="getAllWard">
                                                            <label for="getAllWard">Get All
                                                            </label>
                                                        </div>
                                                        <select class="form-control form-control-sm wardCombo" data-dropdown-css-class="select2-purple" style="width: 100%;"  id="wardCombo"></select>                                            
                                                    </div> 
                                                    <div class="form-group">
                                                        <label>Destination Type</label>

                                                        <select class="form-control form-control-sm destiTypeCombo" data-dropdown-css-class="select2-purple" style="width: 100%;" id="destinationTypeCombo">
                                                            <option value="dumpsite" > Dump site</option>
                                                            <option value="transferStation" > Transfer Station</option>
                                                            <option value="plant" > Plant</option>
                                                        </select>                                  
                                                    </div> 
                                                    <div class="form-group">

                                                        <label>Destination</label>
                                                        <div class="icheck-primary d-inline mx-2">
                                                            <input type="checkbox" id="getAll">
                                                            <label for="getAll">Get All
                                                            </label>
                                                        </div>
                                                        <select class="form-control form-control-sm destinationCmb" data-dropdown-css-class="select2-purple" style="width: 100%;"  id="destinationCombo"></select>                                            
                                                    </div> 
                                                    <div class="form-group">
                                                        <label>Waste Type</label>
                                                        <select class="form-control form-control-sm wstTypeCombo" data-dropdown-css-class="select2-purple" style="width: 100%;" id="wastTypeCombo"></select>                                  
                                                    </div> 
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Is Accurate</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <!-- radio -->
                                                                <div class="form-group clearfix">
                                                                    <div class=" d-inline">
                                                                        <input type="radio" name="acurateCheck" id="radYes" checked="" value="1">
                                                                        <label for="accurateRadio">
                                                                            Yes
                                                                        </label>
                                                                    </div>
                                                                    <div class=" d-inline mx-3">
                                                                        <input type="radio" name="acurateCheck" id="radNo" value="2">
                                                                        <label for="notAccurateRadio">
                                                                            No
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <!-- end radio -->
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div> <!-- end radio group -->
                                                    <!-- session -->
                                                    <div class="form-group">
                                                        <label>Working Shift</label>
                                                        <select class="form-control form-control-sm destiTypeCombo" data-dropdown-css-class="select2-purple" style="width: 100%;" id="sessionCombo">
                                                            <option value="#" > Loading...</option>
                                                        </select>  
                                                    </div>
                                                    <!-- end session -->




                                                    <!-- show if is accurate yes -->
                                                    <div id="accurateYes" class="">  
                                                        <div class="form-group">
                                                            <label>Reading</label>
                                                            <input type="number" class="form-control form-control-sm" placeholder="" value="" id="wasteAmount">
                                                        </div>
                                                    </div>
                                                    <!-- End show if is accurate yes -->


                                                    <!-- show if is accurate No -->
                                                    <div id="accurateNo" class="" style="display: none;">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label for="lblVehileCapasity">Vehicle Capacity</label>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label id="lblVehileCapasity">0</label>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="form-group">
                                                            <label>Density</label>
                                                            <div class="icheck-primary d-inline mx-2">
                                                                <input type="checkbox" id="getAllDensity">
                                                                <label for="getAllDensity">Get All
                                                                </label>
                                                            </div>
                                                            <select class="form-control form-control-sm " data-dropdown-css-class="select2-purple" style="width: 100%;" name="level" id="densityrCombo"></select>                                            
                                                        </div> 

                                                        <div class="form-group">
                                                            <label>Fill Factor</label>

                                                            <select class="form-control form-control-sm " data-dropdown-css-class="select2-purple" style="width: 100%;" name="level" id="ratioCombo"></select>                                            
                                                        </div> 

                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="lblReading">Reading</label>
                                                            </div>
                                                            <div class="col-6">
                                                                <label id="lblReading">0</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- End show if is accurate No -->

                                                    <!-- date input  -->
                                                    <div class="form-group">
                                                        <label>Date</label>
                                                        <input type="date" class="form-control form-control-sm" value="<?php echo date("Y-m-d"); ?>" id="wasteCollectionDate" >

                                                    </div>
                                                    <!-- end date input -->

                                                </div>
                                                <div class="card-footer">
                                                    @if($pageAuth['is_create']==1 || false)
                                                    <button id="btnSave" type="button" class="btn btn-primary">Save</button>
                                                    @endif
                                                    @if($pageAuth['is_update']==1 || false)
                                                    <!--<button id="btnUpdate" type="button" class="btn btn-warning d-none">Update</button>-->
                                                    @endif
                                                    @if($pageAuth['is_delete']==1 || false)
                                                    <button  id="btnshowDelete" type="button" class="btn btn-danger d-none"  data-target="#modal-danger">Delete</button>
                                                    @endif
                                                    <button  id="resetBtn" type="button" class="btn btn-default"  data-target="#modal-danger">Reset</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">All Waste Types</h3>

                                                <div class="card-body">
                                                    <div class="row mt-3">
                                                        <div class="col-3">
                                                            <label >Actual <span class="right badge badge-success">&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
                                                        </div>
                                                        <div class="col-3">
                                                            <label >Estimate <span class="right badge badge-danger">&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-condensed assignedPrivilages" id="collectionTbl">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">#</th>
                                                            <th>Vehicle Reg.No</th>     
                                                            <th style="width: 200px">Waste Type</th>
                                                            <th style="width: 200px">Amount</th>
                                                            <th style="width: 200px">Date</th>
                                                            <th style="width: 200px">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="4" class="text-center">Loading...</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>                        

                            </div>




                        </div>  
                    </div>                            

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>  
</div>             
</div>
<!--/.DELETE MODULE START -->
<div class="modal fade" id="modal-danger">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Delete Selected Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Are you sure you want to permanently delete this Item ? </b></p>
                <p>Once you continue, this process can not be undone. Please proceed with care.</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button id="btnDelete" type="submit" class="btn btn-outline-light" data-dismiss="modal">Delete Permanently</button>
            </div>
        </div>
    </div>
</div>
<!--/.DELETE MODULE END -->  
</section>

@endif    
@endsection

@section('pageScripts')
<!-- Page script -->

<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script src="/js/lajs/laget.js"></script>
<script src="/js/lajs/lacombo.js"></script>
<!-- Api Funtions -->
<script src="../../js/wastcollectjs/main_collection.js"></script>
<script src="../../js/commonFunctions/functions.js" type="text/javascript"></script>
<script src="../../plugins/typeahead/typeahead.js" type="text/javascript"></script>

<script>//
//$(document).ready(function () {
//    // Defining the local dataset
//    var cars = ['Audi', 'BMW', 'Bugatti', 'Ferrari', 'Ford', 'Lamborghini', 'Mercedes Benz', 'Porsche', 'Rolls-Royce', 'Volkswagen'];
//
//    // Constructing the suggestion engine
//    var cars = new Bloodhound({
//        datumTokenizer: Bloodhound.tokenizers.whitespace,
//        queryTokenizer: Bloodhound.tokenizers.whitespace,
//        local: cars
//    });
//
//    // Initializing the typeahead
//    $('.typeahead').typeahead({
//        hint: true,
//        highlight: true, /* Enable substring highlighting */
//        minLength: 1 /* Specify minimum characters required for showing suggestions */
//    },
//            {
//                name: 'cars',
//                source: cars
//            });
//});
//</script>
<script>

    $(function () {
        mainCollection_Table();
        localAuthorityCombo();
        vehicleByLa_Combo(function () {
            vehicleCap();
            comboDriver();
            comboSession();
            wardCombo(function () {
                ward();
            });
        });
        vehicleTypes();
        tempVehicleCombo();
        function ward() {
            vehicleById($(".vehicleCombo").val(), function (result) {
                if (result.ward_id != null) {
                    $(".wardCombo").val(result.ward_id);
                    $("#wardCombo").prop("disabled", true);
                } else {

                }
            });
        }
        destinationByType_Combo();
        ratio_Combo();
        wasteType_Combo(function () {
            dencity_Combo(parseInt($('#wastTypeCombo :selected').val()), function () {
                estCollAmount();
            });
        });
        $('#veh_type_combo').change(function () {
            if ($(this).val() == 0) {//0=>registered vehicle
                $('input[name=acurateCheck]').attr("disabled", false)
                $('#temp_vehicle_section').addClass('d-none');
                $('#reg_vehicle_section').removeClass('d-none');
            } else {//temp vehicle
                is_acurateReading(1);
                $('input[name=acurateCheck]').attr("disabled", true);
                $("input[name=acurateCheck][value='1']").prop("checked", true);
                $('#reg_vehicle_section').addClass('d-none');
                $('#temp_vehicle_section').removeClass('d-none');
            }
        });
        $('#is_reg_veh').change(function () {
            if ($(this).val() == 0) {//select temp vehicle
                $('#add_temp_veh').addClass('d-none');
                $('#temp_veh_combo_div').removeClass('d-none');
            } else {//add temp vehicle
                $('#temp_veh_combo_div').addClass('d-none');
                $('#add_temp_veh').removeClass('d-none');
            }
        });

        $('#ratioCombo, #densityrCombo').change(function () {
            estCollAmount();
        });
        $('#destinationTypeCombo').change(function () {
            destinationByType_Combo();
        });
        $('#wastTypeCombo').change(function () {
            dencity_Combo(parseInt($('#wastTypeCombo :selected').val()), function () {
                estCollAmount();
            });
        });
        $('#vehicleNumberCombo').change(function () {
            vehicleCap();
            ward();
            estCollAmount();
        });



        $('#getAllDensity').click(function () {
            dencity_Combo(parseInt($('#wastTypeCombo :selected').val()));
            estCollAmount();
        });
        $('#getAll').click(function () {
            destinationByType_Combo();
        });
        $('#btnSave').click(function () {
            var addLocalAuthval = getFormVal();
            addLocalAuthval.local_authority_id = $('#laCombo').val();
            saveMainCollectionFromPlants(addLocalAuthval, function () {
                mainCollection_Table();
            });
        });
        $('#btnshowDelete').click(function () {
            deleteCollectionData(parseInt($(this).val()), function (parameters) {
                if (parameters) {
                    alert('Deleted!');
                    mainCollection_Table();
                    resetForm();
                } else {
                    alert(parameters);
                }
            });
        });
        $('input:radio').change(function () {
            is_acurateReading($('input[name="acurateCheck"]:checked').val());
            estCollAmount();
        });
        $(document).on('click', '.val_sel', function () {
            $('#btnUpdate').removeClass('d-none');
            $('#btnshowDelete').removeClass('d-none');
            $('#btnSave').addClass('d-none');
            mainCollection_row(parseInt($(this).val(), function () {

            }));
        });
        $(document).on('click', '#resetBtn', function () {
            resetForm();
        });
        $(document).on('click', '#getAllWard', function () {
            if ($(this).prop("checked") == true) {
                $("#wardCombo").prop("disabled", false);
            } else {
                $("#wardCombo").prop("disabled", true);
            }
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000
        });
    });

</script>
@endsection
