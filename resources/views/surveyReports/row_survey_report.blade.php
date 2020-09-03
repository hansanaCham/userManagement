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
@if($pageAuth['is_read']==1 || true)
{{--    <h1>{{$p['name']}}</h1>--}}
        <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-12 col-sm-6">
                                <h1>Row survey report</h1>
                            </div>
                        </div>
                    </div>
                </section>



                <section class="content-header">
                    <div class="container-fluid">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row">                            
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">All Surveys</h3>
                                    </div>
                                    <div class="card-body" style="overflow-x: auto;">
                                        <table class="table table-condensed assignedPrivilages" id="tblUsers">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>provincial Council</th>
                                                    <th>Local Authority</th>
                                                    <th>Local_Authority Type</th>
                                                    <th>Session id</th>
                                                    <th>session year</th>
                                                    <th>session start date</th>
                                                    <th>session end date</th>
                                                    <th>Main Title_No</th>
                                                    <th>main Title</th>
                                                    <th>Sub Title No</th>
                                                    <th>Sub Title</th>
                                                    <th>Attribute_no</th>
                                                    <th>'Attribute Name</th>
                                                    <th>Parameter</th>
                                                    <th>Result</th>
                                                                
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($surveyResults as $indexKey=>$val)
                                                <tr>
                                                    <td>{{$indexKey+1}}.</td>
                                                    <td>{{$val['provincial_council_name']}}</td>
                                                    <td>{{$val['local_authority_name']}}</td>
                                                    <td>{{$val['local_authority_type']}}</td>
                                                    <td>{{$val['session_id']}}</td>
                                                    <td>{{$val['session_year']}}</td>
                                                    <td>{{$val['session_start_date']}}</td>
                                                    <td>{{$val['session_end_date']}}</td>
                                                    <td>{{$val['main_no']}}</td>
                                                    <td>{{$val['main_title_name']}}</td>
                                                    <td>{{$val['title_no']}}</td>
                                                    <td>{{$val['title_name']}}</td>
                                                    <td>{{$val['attr_no']}}</td>
                                                    <td>{{$val['attr_name']}}</td>
                                                    <td>{{$val['param_name']}}</td>
                                                    <td>{{$val['result']}}</td>
                                                                                                                                  
                                                   
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                         <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Downloads</h3>
                                    </div>
                                    <div class="card-body">
                                    <a href= "/download">Download Excel<i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                                    <br>
                                    <a href= "/download/json">Download JSON<i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                                    </div>
                                    </div>
                        </div>
                    </div> 
                    </div>
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
                <!-- AdminLTE App -->
                <script src="../../dist/js/adminlte.min.js"></script>
                <!-- AdminLTE for demo purposes -->
                {{-- <script src="../../dist/js/demo.js"></script> --}}
               
                <script>
$(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });

    @if (session('success'))
    Toast.fire({
        type: 'success',
        title: 'Waste Management System</br>Institute Saved'
    });
    @endif

            @if (session('error'))
    Toast.fire({
        type: 'error',
        title: 'Waste Management System</br>Error'
    });
    @endif
            //Initialize Select2 Elements
            $('.select2').select2();
    $("#tblUsers").DataTable();
});


                </script>
                @endsection
