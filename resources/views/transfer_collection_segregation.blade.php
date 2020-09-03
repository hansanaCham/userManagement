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
                <h1>Recycable Items Segregation</h1>
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
                                                <label>Add Recycable Items Segregation</label>
                                            </div>
                                            <form method="POST" action="/dumpsite">
                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label>Vehicle Number</label>

                                                        <select class="form-control form-control-sm vehicleCombo" data-dropdown-css-class="select2-purple" style="width: 100%;" id="tranferVehicleCombo"></select>                                            
                                                    </div> 


                                                    <!-- driver  -->
                                                    <div class="form-group">
                                                        <label>Driver</label>

                                                        <select class="form-control form-control-sm destiTypeCombo" data-dropdown-css-class="select2-purple" style="width: 100%;" id="driverCombo">
                                                            <option value="dumpsite" > Dump site</option>
                                                            <option value="transferStation" > Transfer Station</option>
                                                            <option value="plant" > Plant</option>
                                                        </select>                                  
                                                    </div> 
                                                    <!-- end driver -->

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

                                                        <select class="form-control form-control-sm dump_siteCmb" data-dropdown-css-class="select2-purple" style="width: 100%;"  id="destination_Combo"></select>                                            
                                                    </div> 
                                                    <div class="form-group">

                                                        <label>Recycable Items</label>

                                                        <select class="form-control form-control-sm dump_siteCmb" data-dropdown-css-class="select2-purple" style="width: 100%;"  id="segregationType_Combo"></select>                                            
                                                    </div> 






                                                    <!-- show if is accurate yes -->
                                                    <div id="accurateYes" class="">  
                                                        <div class="form-group">
                                                            <label>Reading</label>
                                                            <input type="number" class="form-control form-control-sm" placeholder="" value="" id="wasteAmount">
                                                        </div>
                                                    </div>
                                                    <!-- End show if is accurate yes -->
                                                     <!-- date input  -->
                                                    <div class="form-group">
                                                        <label>Date</label>
                                                        <input type="date" class="form-control form-control-sm" value="<?php echo date("Y-m-d"); ?>" id="wasteCollectionDate" >
                                                    </div>
                                                    <!-- end date input -->

                                                </div>
                                                <div class="card-footer">
                                                    @if($pageAuth['is_create']==1 || false)
                                                    <button id="btnSave" type="button" class="btn btn-success">Save</button>
                                                    @endif
                                                    @if($pageAuth['is_update']==1 || false)
                                                    <button id="btnShowUpdate" type="button" class="btn btn-warning d-none">Update</button>
                                                    @endif 
                                                    @if($pageAuth['is_delete']==1 || false)
                                                    <button  id="btnshowDelete" type="button" class="btn btn-danger d-none"  data-target="#modal-danger">Delete</button>
                                                    @endif
                                                    <button  id="resetBtn" type="button" class="btn btn-primary"  data-target="#modal-danger">Reset</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card card-primary">
                                            <div class="card-header">

                                                <h3 class="card-title">Recycable Items Segregation</h3>

                                                <div class="card-body">
                                 


                                                    <div class="row mt-3">
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

                                              
                                                        <button  class="btn btn-sm btn-info mx-2"  id="tbnLoadTbl" >Load </button>


                                                    <!-- end date input btn-->

                                                </form>
                                                   </div>
                                                </div>
                                                <table class="table table-condensed assignedPrivilages" id="transfer_collectionTbl">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">#</th>
                                        <th>Vehicle Reg.No</th>  
                 <th style="width: 200px">Segregatable Name</th> 
                 <th style="width: 200px">Destination Type</th>
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
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button id="btnUpdate" type="submit" class="btn btn-outline-light" data-dismiss="modal">Update Selected Item</button>
            </div>
        </div>
    </div>
</div>
<!--/.UPDATE MODULE END -->  


<!--/.DELETE MODULE START -->
<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Delete Selected Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Are you sure you want to permanently delete this Transfer Collection ? </b></p>
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
<script src="../../js/TransferCollectSegregation_js/tranfer_collection_segregate.js"></script>
<script src="../../js/TransferCollectSegregation_js/get.js"></script>
<script src="../../js/TransferCollectSegregation_js/delete.js"></script>
<script src="../../js/TransferCollectSegregation_js/submit.js"></script>
<script src="../../js/TransferCollectSegregation_js/update.js"></script>
<script src="../../js/wastcollectjs/main_collection.js"></script>
<script>

    $(function () {
 refresh();

        function refresh()
        {
                   loadTransferVehicleCombo(
            function()
            {
                loadDestinationTypesCombo(
                    function(){
                        destinationType();
                        loadSegregationTypeCombo();
                    }
                    );
                loadDriversCombo();

                transferCollectionSegregation_Table($('#fromDate').val(),$('#toDate').val());

            });
        }

 $('#resetBtn').click(function () {
    
         refresh();
         $('#wasteAmount').val('');
        });

        $('#wastTypeCombo').change(function () {
           load_dencity_combo();
        });





$('#tbnLoadTbl').click(function () {
          transferCollectionSegregation_Table($('#fromDate').val(),$('#toDate').val());
        });


        $('#getAllDensity').click(function () {
           load_dencity_combo();
        });




 $('#btnshowDelete').click(
function()
{
 $('#modal-delete').modal('show');
});



  $('#btnShowUpdate').click(
function()
{
 $('#modal-update').modal('show');
});


        
     
    });
</script>
@endsection
