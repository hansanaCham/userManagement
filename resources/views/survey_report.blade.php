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
                     <h1>Survey Reports</h1>
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
                        <label id="lblTitle">Row survry data sheet</label>
                    </div>
                    <div class="card-body">
<p>Contins all the row survey data </p>

                    </div>
                    <div class="card-footer">                   
                           <a href="/row_survey_report" target="_blank"  type="" class="btn btn-success">Show</a>
          </div>                           
                </div>
            </div><!-- end local authority -->

            <!-- industry category -->
                        <div class="col-md-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <label id="lblTitle">Survey Report 2</label>
                    </div>
                    <div class="card-body">
<p>Survey Report 2</p>

                    </div>
                    <div class="card-footer">      
                      <a href="#" target="_blank" type="" class="btn btn-success">Show</a>
          
 
           
                    </div>                           
                </div>
            </div>
            <!-- end industry category -->

                        <!-- transfer_satation_report -->
                        <div class="col-md-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <label id="lblTitle">Survey Report 3</label>
                    </div>
                    <div class="card-body">
<p>CSurvey Report 3</p>

                    </div>
                    <div class="card-footer">
      
                        <a href="#" target="_blank" type="" class="btn btn-success">Show</a>
             
 
           
                    </div>                           
                </div>
            </div>
            <!-- end transfer_satation_report -->


                                    <!-- dump_site_report -->
                        <div class="col-md-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <label id="lblTitle">Survey Report 4</label>
                    </div>
                    <div class="card-body">
<p>Survey Report 4</p>

                    </div>
                    <div class="card-footer">
      
                        <a href="#" target="_blank" type="" class="btn btn-success">Show</a>
             
 
           
                    </div>                           
                </div>
            </div>
            <!-- end dump_site_report -->

                                    <!-- sampath_kendraya_report -->
                        <div class="col-md-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <label id="lblTitle">Survey Report 5</label>
                    </div>
                    <div class="card-body">
<p>Survey Report 5</p>

                    </div>
                    <div class="card-footer">
      
                        <a href="#" target="_blank" type="" class="btn btn-success">Show</a>
             
 
           
                    </div>                           
                </div>
            </div>
            <!-- end sampath_kendraya_report -->
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
<script src="../../js/SegregatableJS/submit.js"></script>
<script src="../../js/SegregatableJS/get.js"></script>
<script src="../../js/SegregatableJS/update.js"></script>
<script src="../../js/SegregatableJS/delete.js"></script>
<!-- AdminLTE App -->
<script>
    $(function () {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000

        });
//Load table
        loadTableUI();
//click save button
        $('#btnSave').click(function () {
            var data = fromValues();
            if (Validiteinsert(data)) {
                // if validiated
                uniqueNamecheck(data.name, function (r) {
//                    alert(JSON.stringify(r));
                    if (r.message == 'available') {
                        AddWasteType(data, function (result) {
                            if (result.id == 1) {
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
                            loadTableUI();
                            resetinputFields();
                        });
                    } else
                    {
                        $('#valFname').addClass('d-none');
                        $('#valUnique').removeClass('d-none');
                    }
                });
            }
            hideAllErrors();
        });
//click update button
        $('#btnUpdate').click(function () {
            //get form data
            var data = fromValues();
            if (Validiteupdate(data)) {
                updateType($('#btnUpdate').val(), data, function (result) {
                    if (result.id == 1) {
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
                    loadTableUI();
                    showSave();
                    resetinputFields();
                });
            }
            hideAllErrors();
        });
//click delete button
        $('#btnDelete').click(function () {
            deleteItem($('#btnDelete').val(), function (result) {
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
                loadTableUI();
                showSave();
                resetinputFields();
            });
            hideAllErrors();
        });
//select button action 
        $(document).on('click', '.btnAction', function () {
            getaWasteTypebyId(this.id, function (result) {
                $('#getFname').val(result.name);
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
        $('#valNic').addClass('d-none');
    });
//Reset all fields    
    function resetinputFields() {
        $('#getFname').val('');
        $('#valFname').addClass('d-none');
        $('#valUnique').addClass('d-none');
    }
//HIDE ALL ERROR MSGS   
    function hideAllErrors() {
        $('#valUnique').addClass('d-none');
    }
//get form values
    function fromValues() {
        var data = {
            name: $('#getFname').val()
        };
        return data;
    }
</script>
@endsection
