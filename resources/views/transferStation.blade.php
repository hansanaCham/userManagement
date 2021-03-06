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
{{--    <h1>{{$p['name']}}</h1>--}}
        <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-12 col-sm-6">
                                <h1>Transfer Station</h1>
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
                            @if($pageAuth['is_create']==1 || false)
                            <div class="col-md-5">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <label>Transfer Station Registration</label>
                                    </div>

                                    <form method="POST" action="/transfer_station">
                                        <div class="card-body">
                                            @csrf
                                            @if($provinces!=null)
                                            <div class="form-group">

                                                <label>Provincel Council</label>

                                                <select class="form-control form-control-sm provinceCombo"
                                                        data-dropdown-css-class="select2-purple"
                                                        style="width: 100%;" name="province">
                                                    @if (old('province') == 0)
                                                    <option selected value="0" selected>None</option>
                                                    @else
                                                    <option selected value="0">None</option>
                                                    @endif
                                                    @foreach($provinces as $province)
                                                    @if (old('province') == $province['id'])
                                                    <option value="{{$province['id']}}"
                                                            selected>{{$province['name']}}</option>

                                                    @else
                                                    <option value="{{$province['id']}}">{{$province['name']}}</option>
                                                    @endif
                                                    @endforeach

                                                </select>

                                            </div>
                                            @elseif($pro!=null)                                             
                                            <input class="provinceCombo" type="hidden" value="{{$pro['id']}}">
                                            @endif
                                            @if($pro!=null || $provinces!=null)
                                            <div class="form-group divla">

                                                <label>Institute</label>

                                                <select class="form-control form-control-sm laByProvinceCombo"
                                                        data-dropdown-css-class="select2-purple"
                                                        style="width: 100%;" name="localAuthority">

                                                </select>
                                            </div>
                                            @endif                                        

                                            <div class="form-group">
                                                <label>Transfer Station Name</label>
                                                <input name="name" type="text" class="form-control form-control-sm" required
                                                       placeholder="Enter Plant Authority Name"
                                                       value="{{old('name')}}">
                                                @error('name')
                                                <p class="text-danger">{{$errors->first('name')}}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control form-control-sm" rows="3" placeholder="Enter Address"
                                                          name="address">{{old('address')}}</textarea>
                                                @error('address')
                                                <p class="text-danger">{{$errors->first('address')}}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Contact No</label>
                                                <input name="number" type="text" class="form-control form-control-sm"
                                                       placeholder="Enter Contact Number"
                                                       value="{{old('number')}}">
                                                @error('number')
                                                <p class="text-danger">{{$errors->first('number')}}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="email" type="text" class="form-control form-control-sm"
                                                       placeholder="Enter Email"
                                                       value="{{old('email')}}">
                                                @error('email')
                                                <p class="text-danger">{{$errors->first('email')}}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Fax No</label>
                                                <input name="fax_no" type="text" class="form-control form-control-sm"
                                                       placeholder="Enter Fax Number"
                                                       value="{{old('fax_no')}}">
                                                @error('fax_no')
                                                <p class="text-danger">{{$errors->first('fax_no')}}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>GPS Latitude</label>
                                                <input name="gps_la" type="text" class="form-control form-control-sm"
                                                       placeholder="Enter Latitude"
                                                       value="{{old('gps_la')}}">
                                                @error('gps_la')
                                                <p class="text-danger">{{$errors->first('gps_la')}}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>GPS Longitude</label>
                                                <input name="gps_lo" type="text" class="form-control form-control-sm"
                                                       placeholder="Enter Longitude"
                                                       value="{{old('gps_lo')}}">
                                                @error('gps_lo')
                                                <p class="text-danger">{{$errors->first('gps_lo')}}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Capacity</label>
                                                <input name="capacity" type="text" class="form-control form-control-sm"
                                                       placeholder="Enter Capacity"
                                                       value="{{old('capacity')}}">
                                                @error('capacity')
                                                <p class="text-danger">{{$errors->first('capacity')}}</p>
                                                @enderror
                                            </div>
                                                                                                                                    <div class="form-group">
                                                <label>Is Cluster</label>
                                                <select class="form-control form-control-sm clusterCombo"
                                                        data-dropdown-css-class="select2-purple"
                                                        style="width: 100%;" name="is_cluster">
                                                    @if (old('is_cluster') == 0)
                                                    <option  value="1" selected>Yes</option>
                                                    <option  value="0">No</option>
                                                    @else
                                                    <option  value="0">None</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-7">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">All Transfer Stations</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-condensed assignedPrivilages" id="tblUsers">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Name</th>
                                                    <th style="width: 200px">Type</th>                                        
                                                    <th style="width: 200px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transferStations as $indexKey=>$transferStation)
                                                <tr>
                                                    <td>{{$indexKey+1}}.</td>
                                                    <td>{{$transferStation['name']}}</td>
                                                    <td>{{$transferStation['type']}}</td>                                                                                
                                                    <td>
                                                        <a href="/transfer_station/id/{{$transferStation['id']}}"
                                                           class="btn btn-sm btn-primary">Select</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
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
                <script src="../../dist/js/demo.js"></script>
                <script src="/js/lajs/laget.js"></script>
                <script src="/js/lajs/lacombo.js"></script>
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

                @if ($pro != null || $provinces != null)
                comboLocalAuthorityByProvince(function () {
                    hideEmptylaCombo();
                });
                $('.provinceCombo').change(function () {
                    comboLocalAuthorityByProvince(function () {
            hideEmptylaCombo();
                    });

    });
                @endif

                        // hide lacombo laByProvinceCombo when it is empty  
                                function hideEmptylaCombo(){
                                if ($('.laByProvinceCombo').val() == 0) {

                                    $('.divla').addClass('d-none');
                                } else {
                                    $('.divla').removeClass('d-none');
                                }
                                }
                    });
                </script>
                @endsection
