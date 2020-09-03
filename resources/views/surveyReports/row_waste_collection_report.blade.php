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
                                <h1>Row Waste Collection report</h1>
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
                                                <th> #</th>

 <th>register_no</th>
 <th>waste_type_name</th>
 <th>ward_name</th>
 <th>amount</th>
 <th>is_accurate</th>
 <th>density</th>
 <th>ratio</th>
 <th>vehicle_capacity</th>
 <th>destination_type</th>
 <th>destination</th>
 <th>date</th>
 <th>submitted_date</th>
 <th>session</th>
 <th>from_type</th>
 <th>fron_name</th>
 <th>driver_first_name</th>
 <th>driver_last_name</th>
 <th>driver_nic</th>
                                                                
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($wasteCollectionResult as $indexKey=>$val)
                                                <tr>
                                                    <td>{{$indexKey+1}}.</td>
                                                 

 <td>{{$val['register_no']}}</td>
 <td>{{$val['waste_type_name']}}</td>
 <td>{{$val['ward_name']}}</td>
 <td>{{$val['amount']}}</td>
 <td>{{$val['is_accurate']}}</td>
 <td>{{$val['density']}}</td>
 <td>{{$val['ratio']}}</td>
 <td>{{$val['vehicle_capacity']}}</td>
 <td>{{$val['destination_type']}}</td>
 <td>{{$val['destination']}}</td>
 <td>{{$val['date']}}</td>
 <td>{{$val['submitted_date']}}</td>
 <td>{{$val['session']}}</td>
 <td>{{$val['from_type']}}</td>
 <td>{{$val['fron_name']}}</td>
 <td>{{$val['driver_first_name']}}</td>
 <td>{{$val['driver_last_name']}}</td>
 <td>{{$val['driver_nic']}}</td>



                                                                                                                                  
                                                   
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
                                    <a href= "/waste_collection/excel">Download Excel<i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                                    <br>
                                    <a href= "/waste_collection/json">Download JSON<i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
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
