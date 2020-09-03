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
<!-- <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 col-sm-6">
                <h1>Plant Production</h1>
            </div>
        </div>
    </div>
</section> -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-primary">
                    <div class="card-header">
                               <h1>Plant Production</h1>
                <!--         <label id="lblTitle">Add New Plant Production</label> -->
                    </div>
                    <div class="card-body">
                 <div id="div_txt_holder">

             

                                                                             
                        

                    </div>


                    <div class="form-group">

                        <label>Date</label>
<input type="date" class="form-control form-control-sm " value="2020-04-27" id="txtProductionDate">
               
                </div>


            </div>

<!--                      {
"name" : "test name ",
"type" : "test",
"nature" : "test"
}   -->
<div class="card-footer">
    @if($pageAuth['is_create']==1 || false)
    <button id="btnSave" type="submit" class="btn btn-primary" disabled>Save</button>
    @endif
    @if($pageAuth['is_update']==1 || false)
    <button id="btnShowUpdate"  type="submit" class="btn btn-warning d-none">Update</button>
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

  <!-- tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">All Facility Output Types</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Facility Output Types By Date Range</a>
    </li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Facility Output Types</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card-body table-responsive" style="height: 450px;">
                                <table class="table table-bordered table-striped" id="tblplant_production">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                              <th>Date</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.card-body    -->
                    </div>



    </div>
    <div id="menu1" class="container tab-pane fade"><br>

                                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Facility Output Types By Date Range</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                             <div class="card-body table-responsive" style="height: 450px;">
                                               <div class="row">
                                                              <form class="form-inline">
                                                                 <!-- date input  from-->
                                                          <label for="fromDate">From</label>
                                                         <input type="date" class="form-control form-control-sm p-2 mx-2" value="<?php echo date("Y-m-d"); ?>" id="fromDate" >
                                                          <!-- end date input from-->

                                                                         <!-- date input to -->

                                                        <label for="toDate">To</label>
                                                        <input type="date" class="form-control form-control-sm mx-2" value="<?php echo date("Y-m-d"); ?>" id="toDate" >
                                                     
                                                    <!-- end date input to-->


         <!-- date input btn-->

                                              
                 <button type="button" class="btn btn-sm btn-info mx-2"  id="tbnLoadTbl" >Load </button>


                                                    <!-- end date input btn-->

                                                </form>
                                                   </div>

                           
                                <table class="table table-bordered table-striped" id="tblplant_production_by_date_range">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                              <th>Date</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <!-- /.card-body    -->
                    </div>



    </div>
  </div>
</div>
<!-- end tabs -->



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
                <button id="btnUpdate" data-row="" type="button" class="btn btn-outline-dark" data-dismiss="modal">Update Selected Item</button>
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


<script src="../../js/plant_production_js/submit.js"></script>
<script src="../../js/plant_production_js/get.js"></script>
<script src="../../js/plant_production_js/update.js"></script>
<script src="../../js/plant_production_js/delete.js"></script>
<script src="../../js/plant_production_js/frm_plant_production.js"></script>
<!-- AdminLTE App -->
<script>
    $(function () {


refresh();


    });
</script>
@endsection
