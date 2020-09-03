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
                <h1>Bio Compost Input</h1>
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
                        <label id="lblTitle">Add New Plant</label>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Amount*</label>
                            <input id="getFname" type="number" class="form-control form-control-sm"
                                   value="">
                            <div id="valFname" class="d-none"><p class="text-danger">Amount is required!</p></div>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right attachPicker" id="saveDateUI">
                        </div>  
                    </div>
                    <div class="card-footer">
                        @if($pageAuth['is_create']==1 || false)
                        <button id="btnSave" type="submit" class="btn btn-primary">Save</button>
                        @endif
                        @if($pageAuth['is_update']==1 || false)
                        <button id="btnUpdate" type="submit" class="btn btn-warning d-none">Update</button>
                        @endif
                        @if($pageAuth['is_delete']==1 || false)
                        <button  id="btnshowDelete" type="submit" class="btn btn-danger d-none"  data-toggle="modal"
                                 data-target="#modal-danger">Delete</button>
                        @endif
                        <button id="btnReset" type="submit" class="btn btn-secondary">Reset</button>
                    </div>                           
                </div>
            </div>


            <div class="col-md-7">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div id="loadFullcard" class="col-md-12">
                                <div class="card card-widget widget-user-2">
                                    <div class="widget-user-header bg-gradient-green type-cards">
                                        <h3 class="widget-user-username text-right">{Type}</h3>
                                    </div>
                                    <div class="card-footer p-0">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link pool">
                                                    Available <span class="float-right badge bg-danger">{pool}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link used">
                                                    Used <span class="float-right badge bg-primary">{used}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link balance">
                                                    Balance <span class="float-right badge bg-success">{balance}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Bio Compost Inputs</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control float-right attachPicker" id="fromDateUI">
                                            <input type="text" class="form-control float-right attachPicker" id="toDateUI">
                                            <button id="btnSearch" type="submit" class="btn btn-primary">Search</button>
                                        </div>   
                                        <div class="card-body table-responsive" style="height: 450px;">
                                            <table class="table table-bordered table-striped" id="tblData">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>First Name</th>
                                                        <th>NIC</th>
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
                <p><b>Are you sure you want to permanently delete this BioCompostInput ? </b></p>
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
<script src="../../js/BioCompostInputJS/submit.js"></script>
<script src="../../js/BioCompostInputJS/get.js"></script>
<script src="../../js/BioCompostInputJS/update.js"></script>
<script src="../../js/BioCompostInputJS/delete.js"></script>
<!-- AdminLTE App -->
<script>
    $(function () {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000

        });
//Load table & UI Data
        loadCardInfo();
        loadTableUI(null, null);
        $(document).ready(function () {
            //Date Picker For Save
            $('.attachPicker').daterangepicker(
                    {
                        singleDatePicker: true,
                        startDate: moment(),
                        endDate: moment(),
                        format: 'MM/DD/YYYY'
                    });
            $('#btnSearch').click(function () {
                //Check Date & Formate It
                var Start = $('#fromDateUI').data('daterangepicker').startDate.format('YYYY-MM-DD');
                var endDate = $('#toDateUI').data('daterangepicker').startDate.format('YYYY-MM-DD');
                ;
                loadTableUI(Start, endDate);
                hideAllErrors();
            });
        });
//click save button
        $('#btnSave').click(function () {
            var data = fromValues();
            if (Validiteinsert(data)) {
                // if validiated
                getCardInfo(function(result){
                    if(data.amount <= result.balance){
                          addNewData(data, function (result) {
                    if (result.id === 1) {
                        Toast.fire({
                            type: 'success',
                            title: 'Saved Successfully'
                        });
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: 'Something Went Wrong!'
                        });
                    }
                    resetinputFields();
                    loadCardInfo();
                });                   
            }else{
                   Toast.fire({
                   type: 'warning',
                   title: ' Amount cannot be larger than balance!'
                   });
            }  
                });    
            }
        });
//click update button
        $('#btnUpdate').click(function () {
            //get form data
            var data = fromValues();
            if (Validiteupdate(data)) {
                getCardInfo(function(result){
                if(data.amount <= result.balance){    
                updateData($('#btnUpdate').val(), data, function (result) {
                    if (result.id === 1) {
                        Toast.fire({
                            type: 'success',
                            title: ' Updated Successfully'
                        });
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: 'Something Went Wrong!'
                        });
                    }
                    showSave();
                    loadCardInfo();
                    resetinputFields();
                });
            }else{
                   Toast.fire({
                   type: 'warning',
                   title: ' Amount cannot be larger than balance.!'
                   });
            }
            });
            }
            hideAllErrors();
        });
//click delete button
        $('#btnDelete').click(function () {
            deleteData($('#btnDelete').val(), function (result) {
                if (result.id == 1) {
                    Toast.fire({
                        type: 'success',
                        title: 'Removed Successfully'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Something Went Wrong!'
                    });
                }
                showSave();
                loadCardInfo();
                resetinputFields();
            });
            hideAllErrors();
        });
//select button action 
        $(document).on('click', '.btnAction', function () {
            getaDatabyId(this.id, function (result) {
                $('#getFname').val(result.amount);
                $('#saveDateUI').val(result.date);
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
        $('#getFname').val('');
        $('#btnUpdate').val('');
        $('#btnDelete').val('');
        $('#valFname').addClass('d-none');
    }
//HIDE ALL ERROR MSGS   
    function hideAllErrors() {

    }
//get form values
    function fromValues() {
        var saveDate = $('#saveDateUI').data('daterangepicker').startDate.format('YYYY-MM-DD');
        var data = {
            amount: $('#getFname').val(),
            date: saveDate
        };
        return data;
    }
</script>
@endsection
