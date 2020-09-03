@extends('layouts.admin')
@extends('layouts.styles')
@extends('layouts.scripts')
@extends('layouts.navbar')
@extends('layouts.sidebar')
@extends('layouts.footer')
@section('pageStyles')

<!-- Select2 -->
<link rel="stylesheet" href="/plugins/select2/css/select2.min.css">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
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
                <h1>General Reports By Local Authority</h1>
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
 <label id="lblTitle">Select Local Authority</label>
                    </div>
    <div class="card-body">
        <div class="form-group">
    <label>Provincel Council</label>
<select id="province_combo" class="form-control select2 select2-purple provinceCombo"
                                                        data-dropdown-css-class="select2-purple"
                                                        style="width: 100%;" name="condition">
<option value="" selected></option>
<option value=""></option>
</select>
<p class="text-danger"></p>
</div> 


        <div class="form-group">
    <label>Institute</label>
<select id="la_combo" class="form-control laByProvinceCombo" style="width: 100%;" name="">
<option value="" selected></option>
<option value=""></option>
</select>
<p class="text-danger"></p>
</div> 



                    </div>
                    <div class="card-footer">
                        @if($pageAuth['is_create']==1 || false)
                        <button id="btnSave" type="submit" class="btn btn-primary">Load</button>
                        @endif
                        @if($pageAuth['is_update']==1 || false)
                        <button id="btnUpdate" type="submit" class="btn btn-warning d-none">Update</button>
                        @endif
                        @if($pageAuth['is_delete']==1 || false)
                        <button  id="btnshowDelete" type="submit" class="btn btn-danger d-none"  data-toggle="modal"
                                 data-target="#modal-danger">Delete</button>
                        @endif
                        <button id="btnReset" type="submit" class="btn btn-secondary d-none">Reset</button>
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
                                        <h3 class="card-title">Reports of <span id="lbl_La_name"></span></h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="card-body table-responsive" style="height: 450px;">
<div class="row">
<div class="col-md-6"><!-- coloumn1 -->
                <div class="card card-primary"> <!-- vehicle card -->
                    <div class="card-header">
                        <label id="lblTitle">Vehicles </label>
                    </div>
                    <div class="card-body">
<p>Contins details report about Vehicles of local authority  </p>

                    </div>
                    <div class="card-footer">
                   
                           <a href="/la_report" target="_blank"  type="" class="btn btn-success">Print</a>             
           
                    </div>                           
                </div><!-- end vehicle card -->

</div>  <!-- end coloumn 1-->
<div class="col-md-6"><!-- coloumn 2-->
                 <div class="card card-primary"> <!-- vehicle card -->
                    <div class="card-header">
                        <label id="lblTitle">Waste Collection </label>
                    </div>
                    <div class="card-body">
<p>Contins details report about Waste Collection of local authority  </p>

                    </div>
                    <div class="card-footer">
                   
                           <a href="/la_report" target="_blank"  type="" class="btn btn-success">Print</a>             
           
                    </div>                           
                </div><!-- end vehicle card -->
</div> <!-- end coloumn 2-->


</div><!-- end row -->




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


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script src="../../js/Reports_By_La_js/submit.js"></script>
<script src="../../js/Reports_By_La_js/get.js"></script>
<script src="../../js/Reports_By_La_js/update.js"></script>
<script src="../../js/Reports_By_La_js/delete.js"></script>

<!-- AdminLTE App -->
<script>
    $(function () {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000

        }); //end toast
provinceCombo(
    function(){
        laByProvinceCombo($('#province_combo').val());
    }


    ) ;//end province combo load


//province combo change

$('#province_combo').change(
function()
{
  laByProvinceCombo($(this).val());
});
//end province combo change


//la name change

$('#la_combo').change(
function()
{

 $('#lbl_La_name').html($("#la_combo  option:selected").text());
});

//end la name change
    })//end main function






 $('#la_combo').select2();

</script>
@endsection
