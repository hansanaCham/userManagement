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
                <h1>Waste Collection Submit</h1>
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

                                    <div class="col-md-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">All Waste Types</h3>
 </div>
                                                <div class="card-body">
                                                    <div class="row mt-3">
                                                        <div class="col-3">
                                                            <label >Accurate <span class="right badge badge-success">&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
                                                        </div>
                                                        <div class="col-3">
                                                            <label >Estimate <span class="right badge badge-danger">&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
                                                        </div>
                                                    </div>
                                             
                                                <table class="table table-condensed assignedPrivilages" id="collectionTbl">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">#</th>
                                                            <th>Vehicle Reg.No</th>     
                                                            <th style="width: 200px">Waste Type</th>
                                                            <th style="width: 200px">
                                                            Destination Type</th>
                                                            <th style="width: 50px">Amount</th>
                                                            <th style="width: 200px">Date</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="4" class="text-center">Loading...</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                              </div> <!-- end card body -->
                                              <hr>
                                              <div class="card-footer">
                                            
                                                    
                                              </div>
                                        </div>
                                    </div>
                                </div>                        

                            </div>




                        </div>  
                    </div>                            

                </div>
            </div>   <!-- /.card -->
        </div><!-- end row1 -->

        <!-- summary   -->
        <div id="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade show active" id="waste-type" role="tabpanel" aria-labelledby="waste-type-tab">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h1 class="card-title text-center text-success">Waste Types Summary</h1>
                                            </div>
                                        </div><!-- end card title -->
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <div class="card-body">
                                                    <div class="row mt-3 text-center">
                                                        <div class="col-12">
                                                            <h1 >Total : <span id="txt_summery_total" class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;</span></h1>
                                                        </div>

                                                    </div>
                                                </div>                             
                                            </div>
                                        </div><!-- end card -->

                                        <div id="word_container">

                                    


                                        </div><!-- end word container -->


      <button class="btn btn-sm btn-danger btn-block" id="btnShowSubmit" data-target="#modal-danger" type="button">Submit</button>

                                    </div> <!-- end col -->
                                </div>                        

                            </div>




                        </div>  
                    </div>                            

                </div>
            </div>   <!-- /.card -->
        </div>
        <!-- end summary  -->
    </div>      <!-- end container -->
</div>             
</div>
<!--/.DELETE MODULE START -->
<div class="modal fade" id="modal-danger">
    <div class="modal-dialog">
        <div class="modal-content bg-warning">
            <div class="modal-header">
                <h4 class="modal-title">Submit All Pending Waste Collections</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Are you sure you want to Submit All Pending Waste Collection ? </b></p>
                <p>Once you continue, this process can not be undone. Please proceed with care.</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button id="btnSubmit" type="submit" class="btn btn-outline-light" data-dismiss="modal">Submit All Pending Waste Collections</button>
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

<script>

    $(function () {
        get_pending_waste_collection(
            function(){

               get_pending_summery();
           }
           );    

   
        $('#btnShowSubmit').click(function () {
        $('#modal-danger').modal('toggle');

           
        });

        $(document).on('click', '.val_sel', function () {
            $('#btnUpdate').removeClass('d-none');
            $('#btnshowDelete').removeClass('d-none');
            $('#btnSave').addClass('d-none');
            mainCollection_row(parseInt($(this).val(), function () {

            }));
        });

      $('#btnSubmit').click(function () {
            submit_pending(function(result)
                {
if (result.id == 1) {
                                Toast.fire({
                                    type: 'success',
                                    title: 'Submitted Successfully'
                                });
                            } else {
                                Toast.fire({
                                    type: 'error',
                                    title: 'Something Went Wrong!'
                                });
                            }

                            //refresh all
get_pending_waste_collection(
            function(){

               get_pending_summery();
           }
           ); 
                            //end refresh all
                });
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
