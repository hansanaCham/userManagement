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
                <h1>Transfer Collection</h1>
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
                                                <label>Add Transfer Collection</label>
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
                              <!--                       <div class="form-group">

                                                        <label>Ward</label>
                                                        <div class="icheck-primary d-inline mx-2">
                                                            <input type="checkbox" id="getAllWard">
                                                            <label for="getAllWard">Get All
                                                            </label>
                                                        </div>
                                                        <select class="form-control form-control-sm wardCombo" data-dropdown-css-class="select2-purple" style="width: 100%;"  id="wardCombo"></select>                                            
                                                    </div>  -->
                                                    <div class="form-group">
                                                        <label>Destination Type</label>

                                                        <select class="form-control form-control-sm destiTypeCombo" data-dropdown-css-class="select2-purple" style="width: 100%;" id="destinationTypeCombo">
                                                            <option value="dumpsite" > Dump site</option>
                                                            <option value="transferStation" > Transfer Station</option>
                                                            <option value="plant" > Plant</option>
                                                        </select>                                  
                                                    </div> 
                                                    <div class="form-group">

                                                        <label>Dump Site</label>
                                                 <!--        <div class="icheck-primary d-inline mx-2">
                                                            <input type="checkbox" id="getAll">
                                                            <label for="getAll">Get All
                                                            </label>
                                                        </div> -->
                                                        <select class="form-control form-control-sm dump_siteCmb" data-dropdown-css-class="select2-purple" style="width: 100%;"  id="dump_siteCombo"></select>                                            
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
                                        <!--             <div class="form-group">
                                                        <label>Session</label>
                                                        <input type="text" class="form-control form-control-sm" value="" id="txtSession" >

                                                    </div> -->
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
                                                                    <label for="densityrCombo">Vehicle Capacity</label>
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
                                                            <label >Accurate <span class="right badge badge-success">&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
                                                        </div>
                                                        <div class="col-3">
                                                            <label >Estimate <span class="right badge badge-danger">&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
                                                        </div>
                                                    </div>


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
                  <th>Vehicle Capacity</th>   
                 <th style="width: 200px">Waste Type</th>
                 <th style="width: 200px">Amount</th>
                 <th style="width: 200px">Date</th>
                 <th style="width: 200px">Destination Type</th>



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
<script src="../../js/TransferCollect_js/transfer_collection.js"></script>
<script src="../../js/TransferCollect_js/get.js"></script>
<script src="../../js/TransferCollect_js/delete.js"></script>
<script src="../../js/wastcollectjs/main_collection.js"></script>
<script>

    $(function () {
        loadTransferVehicleCombo(
            function()
            {
                loadDestinationTypesCombo(
                    function(){
                        destinationType();
                    }
                    );
                loadDriversCombo();
                wasteType_Combo();
                ratio_Combo();
                transferCollection_Table($('#fromDate').val(),$('#toDate').val());

            });



        $('#wastTypeCombo').change(function () {
           load_dencity_combo();
        });

 $('#btnDelete').click(function () {
        deleteTransferCollection($(this).val(),
function(result)
{
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
        transferCollection_Table($('#fromDate').val(),$('#toDate').val());
    });
        });


function load_dencity_combo()
{
     dencity_Combo(parseInt($('#wastTypeCombo :selected').val()), function () {
               transfer_estCollAmount();
            });
}
$('#tbnLoadTbl').click(function () {
          transferCollection_Table($('#fromDate').val(),$('#toDate').val());
        });


        $('#getAllDensity').click(function () {
           load_dencity_combo();
        });

        $('#btnSave').click(function () {
            save_tranfer_collection(getTransferFormVal(), function (result) {
                 if (result.id == 1) {
                    Toast.fire({
                        type: 'success',
                        title: 'Successfull'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Something Went Wrong!'
                    });
                }
            transferCollection_Table($('#fromDate').val(),$('#toDate').val());
            });
        });

        $('input:radio').change(function () {
//        console.log($('input[name="acurateCheck"]:checked').val());
if ($('input[name="acurateCheck"]:checked').val() == 1) {
    $('#accurateYes').show('hidden');
    $('#accurateNo').hide('hidden');
} else {
    $('#accurateYes').hide('hidden');
    $('#accurateNo').show('hidden');
    load_dencity_combo();
    transferVehicleCap();
}
transfer_estCollAmount();
});
        $(document).on('click', '.val_sel', function () {
            // $('#btnUpdate').removeClass('d-none');
            // $('#btnshowDelete').removeClass('d-none');
            // $('#btnSave').addClass('d-none');
 $('#modal-danger').modal('show');
$("#btnDelete").val($(this).val());
            //mainCollection_row(parseInt($(this).val(), function () {
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
