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
{{--    {{dump($pageAuth)}}--}}
@if($pageAuth['is_read']==1 || false)
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 col-sm-6">
                <h1>Waste Collection Settings</h1>
            </div>
        </div>
    </div>
</section>
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="waste-type-tab" data-toggle="pill" href="#waste-type" role="tab" aria-controls="waste-type" aria-selected="true">Waste Type</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="waste-density-tab" data-toggle="pill" href="#waste-density" role="tab" aria-controls="waste-density" aria-selected="false">Waste Density</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="density-assign-tab" data-toggle="pill" href="#density-assign" role="tab" aria-controls="density-assign" aria-selected="false">Density Assign</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="collection-ratio-tab" data-toggle="pill" href="#collection-ratio" role="tab" aria-controls="collection-ratio" aria-selected="false">Fill Factor</a>
                            </li>
                        </ul>
                    </div>
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
                                                    @csrf                                           
                                                    <div class="form-group">
                                                        <label>Waste Type*</label>
                                                        <input name="name" id="getWastName" type="text" class="form-control form-control-sm" required
                                                        placeholder="Enter Waste Type Name"
                                                        value="">
                                                        <div id="valAttachment" class="d-none"><p class="text-danger">This field is required!</p></div>
                                                        <div id="valUnique" class="d-none"><p class="text-danger">Name already taken!</p></div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                   <button id="btnReset" type="button" class="btn btn-info">Reset</button>
                                                   @if($pageAuth['is_create']==1 || false)
                                                   <button id="btnSave" type="button" class="btn btn-primary">Save</button>
                                                   @endif
                                                   @if($pageAuth['is_update']==1 || false)
                                                   <button id="btnUpdate" type="button" class="btn btn-warning d-none">Update</button>
                                                   @endif
                                                   @if($pageAuth['is_delete']==1 || false)
                                                   <button  id="btnshowDelete" type="button" class="btn btn-danger d-none"  data-toggle="modal"
                                                   data-target="#modal-danger">Delete</button>
                                                   @endif
                                               </div>
                                           </form>
                                       </div>
                                   </div>
                                   <div class="col-md-7">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">All Waste Types</h3>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-condensed assignedPrivilages" id="tblWasteTypes">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Name</th>                                      
                                                        <th style="width: 200px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Loading...</td>                                                                             
                                                        <td>
                                                            <a href="#"
                                                            class="btn btn-sm btn-primary">Select</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>                        

                        </div>
                        <div class="tab-pane fade" id="waste-density" role="tabpanel" aria-labelledby="waste-density-tab">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <label>Add New Waste Destiny</label>
                                        </div>
                                        <form>
                                            <div class="card-body">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Waste Type*</label>
                                                    <select class="form-control form-control-sm" id="selWasteDtype"
                                                    data-dropdown-css-class="select2-purple"
                                                    style="width: 100%;" name="selWastetype">
                                                    <option selected value="6" selected>None</option>
                                                </select>
                                            </div>                                                                             
                                            <div class="form-group">
                                                <label>Waste Destiny*</label>
                                                <input name="name" type="number"  value="0" id="getWastDest" class="form-control form-control-sm" required
                                                placeholder="Enter Waste Destiny Here"
                                                value="">
                                                <p id="emptyValDest" class="text-danger d-none">Field Required</p>

                                            </div>

                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea id="wasteDestDisc" class="form-control form-control-sm" required rows="3" placeholder="Enter Description"
                                                name="description"></textarea>
                                                <p id="emptyValDestDisc" class="text-danger d-none">Field Required</p>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button id="btnResetDensity" type="button" class="btn btn-info">Reset</button>
                                            @if($pageAuth['is_create']==1 || false)
                                            <button id="btnSaveDensity" type="button" class="btn btn-primary">Save</button>
                                            @endif
                                            @if($pageAuth['is_update']==1 || false)
                                            <button id="btnUpdateDensity" type="button" class="btn btn-warning d-none">Update</button>
                                            @endif
                                            @if($pageAuth['is_delete']==1 || false)
                                            <button  id="btnshowDeleteDensity" type="button" class="btn btn-danger d-none"  data-toggle="modal"
                                            data-target="#modal-danger-WasteDestiny">Delete</button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">All Waste Destiny</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-condensed assignedPrivilages" id="tblWasteDest">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th style="width: 200px">Waste Type</th>
                                                    <th style="width: 200px">Destiny</th>
                                                    <th style="width: 200px">Status</th>   
                                                    <th style="width: 200px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Loading...</td>
                                                    <td>Data...</td>
                                                    <td><span class="badge bg-success">Done</span></td>                                                                                
                                                    <td>
                                                        <a href="#"class="btn btn-sm btn-primary btnActionDest">Select</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>  


                    </div>
                    <div class="tab-pane fade" id="density-assign" role="tabpanel" aria-labelledby="density-assign-tab">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <label>New Destiny Assign</label>
                                    </div>
                                    <form>
                                        <div class="card-body">
                                            @csrf
                                            <div class="form-group">
                                                <label>Waste Type*</label>
                                                <select class="form-control form-control-sm" id="wasteTypeAssign"
                                                data-dropdown-css-class="select2-purple"
                                                style="width: 100%;">
                                                <option selected value="0" selected>None</option>
                                            </select>
                                        </div>                                            
                                        <input class="provinceCombo" type="hidden" value="76">
                                        <div class="form-group divla">
                                            <label>Destiny*</label>
                                            <select class="form-control select2 select2-purple" id="destByWasteid"
                                            data-dropdown-css-class="select2-purple"
                                            style="width: 100%;" name="localAuthority">
                                        </select>
                                    </div>                                     
                                    <div class="form-group" hidden>
                                        <label>Description</label>
                                        <textarea readonly class="form-control form-control-sm" rows="3" placeholder=""
                                        name="description">Loading...</textarea>
                                        <p class="text-danger"></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" id="setdestAsActive" class="btn btn-primary">Set Action</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.table can be add here -->
                </div>              
            </div>
            <div class="tab-pane fade" id="collection-ratio" role="tabpanel" aria-labelledby="collection-ratio-tab">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card card-primary">
                            <div class="card-header">
                                <label>Add New Fill Factor</label>
                            </div>
                            <form>
                                <div class="card-body">
                                    @csrf                                                                             
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input name="name" id="collName" type="text" class="form-control form-control-sm" required
                                        placeholder="Half"
                                        value="">
                                        <p class="text-danger d-none" id="emptyValCname">Field Required</p>

                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input name="namenum" id="collNameNumb" type="text" class="form-control form-control-sm" required
                                        placeholder="50%,1/2,0.5,half"
                                        value="">
                                        <p class="text-danger d-none" id="emptyValCnumb">Field Required</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Fill Factor*</label>
                                        <input name="ratio" id="collRatio" type="number" class="form-control form-control-sm" required
                                        placeholder="Enter Fill Factor"
                                        value="1" step="0.1" min="0" max="2">
                                        <p class="text-danger d-none" id="emptyValCratio">Field Required</p>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button id="btnResetCollRatio" type="button" class="btn btn-info">Reset</button>
                                    @if($pageAuth['is_create']==1 || false)
                                    <button id="btnSaveCollRatio" type="button" class="btn btn-primary">Save</button>
                                    @endif
                                    @if($pageAuth['is_update']==1 || false)
                                    <button id="btnUpdateCollRatio" type="button" class="btn btn-warning d-none">Update</button>
                                    @endif
                                    @if($pageAuth['is_delete']==1 || false)
                                    <button  id="btnshowDeleteColl" type="button" class="btn btn-danger d-none"  data-toggle="modal"
                                    data-target="#modal-danger-CollectionRatio">Delete</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">All Fill Factor</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-condensed assignedPrivilages" id="tblCollRatio">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th style="width: 200px">Name(Text)</th>
                                            <th style="width: 100px">Name(Number)</th>
                                            <th style="width: 100px">Fill Factor</th>   
                                            <th style="width: 200px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Loading...</td>
                                            <td>Data...</td>
                                            <td><span class="badge bg-success">100</span></td>                                                                                
                                            <td>
                                                <a href="#"class="btn btn-sm btn-primary">Select</a>
                                            </td>
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
                <h4 class="modal-title">Delete Selected Waste Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Are you sure you want to permanently delete this Waste Type ? </b></p>
                <p>Once you continue, this process can not be undone. Please proceed with care.</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button id="btnDeleteWasteType" type="submit" class="btn btn-outline-light" data-dismiss="modal">Delete Permanently</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal-danger-WasteDestiny">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Delete Selected Waste Destiny</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Are you sure you want to permanently delete this Waste Destiny ? </b></p>
                <p>Once you continue, this process can not be undone. Please proceed with care.</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button id="btnDeleteWasteDestiny" type="submit" class="btn btn-outline-light" data-dismiss="modal">Delete Permanently</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-danger-CollectionRatio">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Delete Selected Fill Factor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Are you sure you want to permanently delete this Fill Factor ? </b></p>
                <p>Once you continue, this process can not be undone. Please proceed with care.</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button id="btnDeleteCollectionRatio" type="submit" class="btn btn-outline-light" data-dismiss="modal">Delete Permanently</button>
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
<script src="../../js/wastcollectjs/submit.js"></script>
<script src="../../js/wastcollectjs/get.js"></script>
<script src="../../js/wastcollectjs/update.js"></script>
<script src="../../js/wastcollectjs/delete.js"></script>
<script>
    var F_TAB = 'waste-type-tab';
    $(function () {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000
        });

//++++---------[WASTE TYPE SECTION START]---------++++//
//Load Table
loadTable();
//Save Button Click
$('#btnSave').click(function () {
    var data = fromValues();
    if (Validiteinsert(data)) {
            // if validiated
            AddWasteType(data, function (result) {
                if (result.id == 1) {
                    Toast.fire({
                        type: 'success',
                        title: ' Successfully Saved'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: ' Something Went Wrong!'
                    });
                }
                loadTable();
                resetinputFields();
                loadWasteCombo(); 
            });
        }
    });
//Update Button Click
$('#btnUpdate').click(function () {
        //get form data
        var data = fromValues();
        if (Validiteupdate(data)) {
            updateWastetype($('#btnUpdate').val(), data, function (result) {
                if (result.id == 1) {
                    Toast.fire({
                        type: 'success',
                        title: ' Successfully Updated'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: ' Something Went Wrong!'
                    });
                }

                loadTable();
                showSave();
                resetinputFields();
                loadWasteCombo(); 
            });
        }
    });
//Delete Button Click   
    // $('#btnDelete').click(function () {
    //     deleteWasteType($('#btnDelete').val(), function (result) {
    //         if (result.id == 1) {
    //             Toast.fire({
    //                 type: 'success',
    //                 title: ' Successfully Removed!'
    //             });
    //         } else {
    //             Toast.fire({
    //                 type: 'error',
    //                 title: ' Something Went Wrong!'
    //             });
    //         }
    //           alert('call back');
    //         loadTable();
    //         showSave();
    //         resetinputFields();
    //     });
    // });
//-----------------[+B.BUTTONS START+]-----------------
//select button action 
$(document).on('click', '.btnAction', function () {
    resetinputFields();
    getaWasteTypebyId(this.id, function (result) {
        $('#getWastName').val(result.name);
        showUpdate();
        $('#btnUpdate').val(result.id);
        $('#btnshowDelete').val(result.id);
    });
});
//show update buttons    
function showUpdate() {
    $('#btnSave').addClass('d-none');
    $('#btnUpdate').removeClass('d-none');
    $('#btnshowDelete').removeClass('d-none');
         //$('#btnReset').removeClass('d-none');

     }

     $('#btnReset').click(function () {
        resetinputFields();
        showSave();
    });
//show save button    
function showSave() {
    $('#btnSave').removeClass('d-none');
    $('#btnUpdate').addClass('d-none');
    $('#btnshowDelete').addClass('d-none');
       // $('#btnReset').addClass('d-none');
   }
//Reset all fields    
function resetinputFields() {
    $('#getWastName').val('');
    $('#btnUpdate').val('');
    $('#btnDelete').val('');
    $('#valAttachment').addClass('d-none');
    $('#valUnique').addClass('d-none');
}
//-----------------[+B.BUTTONS START+]-----------------    
//Get Form Values
function fromValues() {
    var data = {
        name: $('#getWastName').val()
    };
    return data;
}
//++++---------[WASTE TYPE SECTION END]---------++++//
});
//++++---------[WASTE DESTINY SECTION START]---------++++//
$(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });

//Load Table & Combos
loadTableWasteDestiny();
loadWasteCombo(function () {
});
//Save Button Click
$('#btnSaveDensity').click(function () {
    var data = fromValues();
    if (ValiditeDestinsert(data)) {
            // if validiated
            AddWasteDestiny(data, function (result) {
                if (result.id == 1) {
                    Toast.fire({
                        type: 'success',
                        title: ' Successfully Saved'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: ' Something Went Wrong!'
                    });
                }
                loadTableWasteDestiny();
                resetDestinputFields();
            });
        }
    });
//Update Button Click
$('#btnUpdateDensity').click(function () {
        //get form data
        var data = fromValues();
        if (ValiditeDestUpdate(data)) {
            updateWasteDestiny($('#btnUpdateDensity').val(), data, function (result) {
                if (result.id == 1) {
                    Toast.fire({
                        type: 'success',
                        title: ' Successfully Updated'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: ' Something Went Wrong!'
                    });
                }
                loadTableWasteDestiny();
                showSave();
                resetDestinputFields();
            });
        }
        $("#selWasteDtype").prop("disabled", false);
    });
//Delete Button Click   
    // $('#btnDelete').click(function () {
    //     deleteWasteDestiny($('#btnDelete').val(), function (result) {
    //         if (result.id == 1) {
    //             Toast.fire({
    //                 type: 'success',
    //                 title: ' Successfully Removed!'
    //             });
    //         } else {
    //             Toast.fire({
    //                 type: 'error',
    //                 title: ' Something Went Wrong!'
    //             });
    //         }
    //         loadTableWasteDestiny();
    //         showSave();
    //         resetDestinputFields();
    //     });
    //     $("#selWasteDtype").prop("disabled", false);
    // });
//-----------------[+B.BUTTONS START+]-----------------
//select button action 
$(document).on('click', '.btnActionDest', function () {
    resetDensityInputFields();
    getaWasteDestinybyId(this.id, function (result) {
        $("#selWasteDtype").val(result.waste_type_id);
        $('#getWastDest').val(result.density);
        $('#wasteDestDisc').val(result.description);
        showUpdateDensity();
        $('#btnUpdateDensity').val(result.id);
        $('#btnshowDeleteDensity').val(result.id);
    });
    $("#selWasteDtype").prop("disabled", true);
});
//show update buttons    
function showUpdateDensity() {
    $('#btnSaveDensity').addClass('d-none');
    $('#btnUpdateDensity').removeClass('d-none');
    $('#btnshowDeleteDensity').removeClass('d-none');
         //$('#btnResetDensity').removeClass('d-none');

     }
//show save button    
function showSaveDensity() {
    $('#btnSaveDensity').removeClass('d-none');
    $('#btnUpdateDensity').addClass('d-none');
    $('#btnshowDeleteDensity').addClass('d-none');
}
//Reset all fields    
function resetDensityInputFields() {
    $('#getWastDest').val('');
    $('#wasteDestDisc').val('');
    $('#btnUpdateDensity').val('');
    $('#btnDelete').val('');
    $('#emptyValDest').addClass('d-none');
    $('#emptyValDestDisc').addClass('d-none');
}

$('#btnResetDensity').click(function () {
   $("#selWasteDtype").prop("disabled",false);
   resetDensityInputFields();
   showSaveDensity();
});




//-----------------[+B.BUTTONS START+]-----------------    
//Get Form Values
function fromValues() {
    var data = {
        waste_type_id: $('#selWasteDtype').val(),
        density: $('#getWastDest').val(),
        description: $('#wasteDestDisc').val()
    };
    return data;
}
//++++---------[WASTE DESTINY SECTION END]---------++++//        
});
$('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
    F_TAB = $(e.target).attr("id");
});
;
//++++---------[DESTINY ASSIGN SECTION START]---------++++//
$(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });

    loadWasteAssignCombo(function () {
        loadDestinyAssCombo($('#wasteTypeAssign').val());
        $("#wasteTypeAssign").change(function () {
            loadDestinyAssCombo($('#wasteTypeAssign').val());
        });
    });

    $('#setdestAsActive').click(function () {
        setDestinyActive($('#destByWasteid').val(), function (result) {
            if (result.id == 1) {
                Toast.fire({
                    type: 'success',
                    title: ' Successfully Patched'
                });
            } else {
                Toast.fire({
                    type: 'error',
                    title: ' Something Went Wrong!'
                });
            }
        });
        loadTableWasteDestiny();
    });

//++++---------[DESTINY ASSIGN SECTION END]---------++++//
});
//++++---------[COLLECTION RATIO SECTION START]---------++++//
$(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });

//Load Table
loadTableCollectionRatio();
//Save Button Click
$('#btnSaveCollRatio').click(function () {
    var data = fromCollValues();
    if (ValiditeCollinsert(data)) {
            // if validiated
            AddCollectionRatio(data, function (result) {
                if (result.id == 1) {
                    Toast.fire({
                        type: 'success',
                        title: ' Successfully Saved'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: ' Something Went Wrong!'
                    });
                }
                loadTableCollectionRatio();
                resetinputFields();
            });
        }
    });
//Update Button Click
$('#btnUpdateCollRatio').click(function () {
        //get form data
        var data = fromCollValues();
        if (ValiditeCollUpdate(data)) {
            updateCollectionRatio($('#btnUpdateCollRatio').val(), data, function (result) {
                if (result.id == 1) {
                    Toast.fire({
                        type: 'success',
                        title: ' Successfully Updated'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: ' Something Went Wrong!'
                    });
                }
                loadTableCollectionRatio();
                showSaveColl();
                resetinputFields();
            });
        }
    });
//Delete Button Click   
$('#btnDeleteWasteType').click(function () {

    deleteWasteType($('#btnshowDelete').val(), function (result) {
        if (result.id == 1) {
            Toast.fire({
                type: 'success',
                title: ' Successfully Removed!'

            });

        } else {
            Toast.fire({
                type: 'error',
                title: ' Something Went Wrong!'
            });
        }

        loadTable();

        loadWasteCombo(); 
        $('#getWastName').val('');
        $('#btnSave').removeClass('d-none');
        $('#btnUpdate').addClass('d-none');
        $('#btnshowDelete').addClass('d-none');

    });
});
$('#btnDeleteWasteDestiny').click(function () {
    deleteWasteDestiny($('#btnshowDeleteDensity').val(), function (result) {
        if (result.id == 1) {
            Toast.fire({
                type: 'success',
                title: ' Successfully Removed!'
            });
        } else {
            Toast.fire({
                type: 'error',
                title: ' Something Went Wrong!'
            });
        }
        loadTableWasteDestiny();
        $('#btnSaveDensity').removeClass('d-none');
    $('#btnUpdateDensity').addClass('d-none');
    $('#btnshowDeleteDensity').addClass('d-none');
    $("#selWasteDtype").prop("disabled", false);
    $("#getWastDest").val('0');
    $("#wasteDestDisc").val('');
    
  

    });

});
$('#btnDeleteCollectionRatio').click(function () {

    deleteCollectionRatio($('#btnshowDeleteColl').val(), function (result) {
        if (result.id == 1) {
            Toast.fire({
                type: 'success',
                title: ' Successfully Removed!'
            });
        } else {
            Toast.fire({
                type: 'error',
                title: ' Something Went Wrong!'
            });
        }
        loadTableCollectionRatio();
        showSaveColl();
        resetinputFields();
    });
});
//end delete btn
//-----------------[+B.BUTTONS START+]-----------------
//select button action 
$(document).on('click', '.btnActionColl', function () {
        //resetinputFields();
        getCollectionRatiobyId(this.id, function (result) {
            $('#collName').val(result.name);
            $('#collNameNumb').val(result.number);
            $('#collRatio').val(result.ratio);
            showUpdateColl();
            $('#btnUpdateCollRatio').val(result.id);
            $('#btnshowDeleteColl').val(result.id);
        });
    });
//show update buttons    
function showUpdateColl() {
    $('#btnSaveCollRatio').addClass('d-none');
    $('#btnUpdateCollRatio').removeClass('d-none');
    $('#btnshowDeleteColl').removeClass('d-none');
}
//show save button    
function showSaveColl() {
    $('#btnSaveCollRatio').removeClass('d-none');
    $('#btnUpdateCollRatio').addClass('d-none');
    $('#btnshowDeleteColl').addClass('d-none');
}
//Reset all fields    
function resetinputFields() {
    $('#collName').val('');
    $('#collNameNumb').val('');
    $('#collRatio').val('');
    $('#btnDelete').val('');
    $('#btnUpdateCollRatio').val('');
    $('#valAttachment').addClass('d-none');
    $('#valUnique').addClass('d-none');
}

$('#btnResetCollRatio').click(function () {
    resetinputFields();
    showSaveColl();

});

//-----------------[+B.BUTTONS START+]-----------------    
//Get Form Values
function fromCollValues() {
    if ($('#collRatio').val()<0||$('#collRatio').val()>2) {
        alert('Fill Factor Must be between 0 - 2');
        return false;
    }
    else
    {
        var data = {
            name: $('#collName').val(),
            number: $('#collNameNumb').val(),
            ratio: $('#collRatio').val()
        };
        return data;
    }
}

});


//++++---------[COLLECTION RATIO SECTION END]---------++++//
</script>
@endsection
