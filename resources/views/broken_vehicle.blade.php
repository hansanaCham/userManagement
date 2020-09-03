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
<!-- Google Font: Source Sans Pro -->
@endsection
@section('content')
@if($pageAuth['is_read']==1 || false)
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 col-sm-6">
                <h1>Broken Vehicles</h1>
            </div>
        </div>
    </div>
</section>
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <label id="lblTitle">Vehicles</label>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Unbroken Vehicles*</label>
                            <select id="getGoodVehicle" class="form-control form-control-sm">
                                <option>Loading..</option>
                            </select>               
                        </div>
                        <div class="form-group">
                            <label>Date:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" id="datapickerjk">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>Remark</label>
                            <input id="getRemark" type="text" class="form-control form-control-sm" placeholder="Enter Remark Info..." value="">
                            <div id="valFname" class="d-none"><p class="text-danger">Remark is required!</p></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        @if($pageAuth['is_create']==1 || false)
                        <button id="btnSave" type="submit" class="btn btn-danger">Mark As Broken</button>
                        @endif
                        @if($pageAuth['is_update']==1 || false)
                        <button id="btnUpdate" type="submit" class="btn btn-success d-none">Mark As Repaired</button>
                        @endif
<!--                        @if($pageAuth['is_delete']==1 || false)
                        <button  id="btnshowDelete" type="submit" class="btn btn-danger d-none"  data-toggle="modal"
                                 data-target="#modal-danger">Delete</button>
                        @endif-->
                        <button id="btnReset" type="submit" class="btn btn-secondary">Reset</button>
                    </div>                           
                </div>
            </div>


            <div class="col-md-7">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Vehicles</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="card-body table-responsive" style="height: 450px;">
                                            <table class="table table-bordered table-striped" id="tblVehicle">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Register No</th>
                                                        <th>Ownership</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>                                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
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
                <p><b>Are you sure you want to permanently delete this Driver ? </b></p>
                <p>Once you continue, this process can not be undone. Please Procede with care.</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button id="btnDelete" type="submit" class="btn btn-outline-light" data-dismiss="modal">Delete Permanently</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
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
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script src="../../js/BrokenVehicleJS/submit.js"></script>
<script src="../../js/BrokenVehicleJS/get.js"></script>
<script src="../../js/BrokenVehicleJS/update.js"></script>
<script src="../../js/BrokenVehicleJS/delete.js"></script>
<!-- AdminLTE App -->
<script>
    $(function () {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000

        });
//Load table & Combo
        loadTableUI();
        loadVehicleCombo();
        $(document).ready(function () {
            $('#datapickerjk').daterangepicker(
                    {
                        singleDatePicker: true,
                        startDate: moment().subtract('days', 29),
                        endDate: moment(),
                        format: 'MM/DD/YYYY'

                    });

//            $('#btnSave').click(function () {
//                //Check Date & Formate It
//                var Start = $('#datapickerjk').data('daterangepicker').startDate.format('YYYY-MM-DD');
//                var endDate = $('#datapickerjk').data('daterangepicker').endDate.format('YYYY-MM-DD');
//                ;
//                alert(Start);
//                loadTableUI(Start, endDate, function (result) {});
//                hideAllErrors();
//            });
        });

//Broken BOX
        $('#btnSave').click(function () {
            var data = fromValues();
            var car_id = $('#getGoodVehicle').val();
            if (Validiteinsert(data)) {
                // if validiated
                        setVehBroken(car_id,data, function (result) {
                            if (result.id === 1) {
                                Toast.fire({
                                    type: 'success',
                                    title: 'Marked As Broken(Done)'
                                });
                            } else {
                                Toast.fire({
                                    type: 'error',
                                    title: 'Something Went Wrong!'
                                });
                            }
                            loadVehicleCombo();
                            loadTableUI();
                            resetinputFields();
                        });
            }
            hideAllErrors();
        });
//Rapired BOX
        $('#btnUpdate').click(function () {
            var data = fromValues();
            var car_id = $('#getGoodVehicle').val();
            if (Validiteupdate(data)) {
                // if validiated
                        setVehRepaired(car_id,data, function (result) {
                            if (result.id === 1) {
                                Toast.fire({
                                    type: 'success',
                                    title: 'Marked As Repaired(Done)'
                                });
                            } else {
                                Toast.fire({
                                    type: 'error',
                                    title: 'Something Went Wrong!'
                                });
                            }
                            loadVehicleCombo();
                            loadTableUI();
                            resetinputFields();
                        });
            }
            hideAllErrors();
        });
//select button action 
        $(document).on('click', '.btnAction', function () {
            getVehbyId(this.id, function (result) {
                $('#getGoodVehicle').append('<option value="'+ result.id +'" selected="selected">'+ result.register_no +'</option>');
                $("#getGoodVehicle").attr("disabled", "disabled");
                $('#getRemark').val(result.condition);
                showUpdate();
                $('#btnUpdate').val(result.id);
                $('#btnDelete').val(result.id);
            });
            hideAllErrors();
        });
    });
//show update buttons    
    function showUpdate() {
        $('#btnSave').addClass('d-none');
        $('#btnUpdate').removeClass('d-none');
        $('#btnshowDelete').removeClass('d-none');
    }
//show save button    
    function showSave() {
        $('#btnSave').removeClass('d-none');
        $('#btnUpdate').addClass('d-none');
        $('#btnshowDelete').addClass('d-none');
    }
//Reset button    
    $('#btnReset').click(function () {
        resetinputFields();
        hideAllErrors();
        showSave();
        $('#valContact').addClass('d-none');
        $('#valNic').addClass('d-none');
    });
//Reset all fields    
    function resetinputFields() {
        $('#getName').val('');
        $('#getRemark').val('');
        $('#btnUpdate').val('');
        $('#btnDelete').val('');
        $('#valFname').addClass('d-none');
        $('#valUnique').addClass('d-none');
    }
//HIDE ALL ERROR MSGS   
    function hideAllErrors() {
        $('#valUnique').addClass('d-none');
    }
//get form values
    function fromValues() {
        var Start = $('#datapickerjk').data('daterangepicker').startDate.format('YYYY-MM-DD');
        var data = {
            date: Start,
            remark: $('#getRemark').val()
        };
        return data;
    }
</script>
@endsection
