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
@if($pageAuth['is_read']==1 || True)
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 col-sm-6">
                <h1>Facility Output Types</h1>
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
                        <label id="lblTitle">Add New Facility Output Type</label>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name *</label>
                            <input id="txtOutputName" type="text" class="form-control form-control-sm"
                            placeholder="Enter Name..."
                            value="">
                            <div id="valFname" class="d-none"><p class="text-danger">Item is required!</p></div>
                            <div id="valUnique" class="d-none"><p class="text-danger">Item already taken!</p></div>
                        </div>

                        <div class="form-group">

                            <label>Type</label>

                            <select class="form-control form-control-sm typeCombo"
                            data-dropdown-css-class="select2-purple"
                            style="width: 100%;" name="type" id="typeCombo">
                            <option selected value="0" selected>None</option>
                            <option selected value="0">None</option>                                                       
                        </select>

                    </div>

                    <div class="form-group">

                        <label>Nature</label>

                        <select class="form-control form-control-sm natureCombo"
                        data-dropdown-css-class="select2-purple"
                        style="width: 100%;" name="nature" id="natureCombo">
                        <option selected value="0" selected>None</option>
                        <option selected value="0">None</option>                                                       
                    </select>

                </div>


            </div>

<!--                      {
"name" : "test name ",
"type" : "test",
"nature" : "test"
}   -->
<div class="card-footer">
    @if($pageAuth['is_create']==1 || false)
    <button id="btnSave" type="submit" class="btn btn-primary">Save</button>
    @endif
    @if($pageAuth['is_update']==1 || false)
    <button id="btnShowUpdate" type="submit" class="btn btn-warning d-none">Update</button>
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

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Facility Output Types</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card-body table-responsive" style="height: 450px;">
                                <table class="table table-bordered table-striped" id="tblFacilityOutputType">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                              <th>Type</th>
                                                <th>Nature</th>
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
                <p><b>Are you sure you want to permanently delete this Item ? </b></p>
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

<!--/.UPDATE MODULE START -->
<div class="modal fade" id="modal-update">
    <div class="modal-dialog">
        <div class="modal-content bg-warning">
            <div class="modal-header">
                <h4 class="modal-title">Update Selected Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Are you sure you want to Update  this data ? </b></p>
                <p>Once you continue, this process can not be undone. Please proceed with care.</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                <button id="btnUpdate" type="submit" class="btn btn-outline-dark" data-dismiss="modal">Update Selected Item</button>
            </div>
        </div>
    </div>
</div>
<!--/.UPDATE MODULE END -->  
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
<script src="../../js/FacilityOutputTypes_js/frm_facility_out_put.js"></script>

<script src="../../js/FacilityOutputTypes_js/submit.js"></script>
<script src="../../js/FacilityOutputTypes_js/get.js"></script>
<script src="../../js/FacilityOutputTypes_js/update.js"></script>
<script src="../../js/FacilityOutputTypes_js/delete.js"></script>

<!-- AdminLTE App -->
<script>
    $(function () {


refresh();


    });
</script>
@endsection
