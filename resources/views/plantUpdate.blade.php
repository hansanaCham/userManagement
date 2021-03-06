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
                                <h1>Plants</h1>
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
                            <div class="col-md-5">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <label>Edit Facility</label>
                                    </div>
                                    <form method="POST" action="/plant/id/{{$plant['id']}}">
                                        <div class="card-body">
                                            @csrf    
                                            @method('PUT')   
                                            @if($pcName != null)                                     
                                            <div class="form-group">
                                                <label>Provincial Council</label>
                                                <input  type="text" class="form-control form-control-sm" required
                                                        disabled = "true"
                                                        value="{{$pcName}}">                                           
                                            </div> 
                                            @else
                                            <div class="form-group">
                                                <label>Owner</label>
                                                <input  type="text" class="form-control form-control-sm" required
                                                        disabled = "true"
                                                        value="Waste Management Authority">                                           
                                            </div> 
                                            @endif  
                                            @if($laName != null)                              
                                            <div class="form-group">
                                                <label>Institute</label>
                                                <input  type="text" class="form-control form-control-sm" required
                                                        disabled = "true"
                                                        value="{{$laName}}">                                           
                                            </div>   
                                            @endif                             
                                            <div class="form-group">
                                                <label>Facility Name</label>
                                                <input name="name" type="text" class="form-control form-control-sm" required
                                                       placeholder="Enter Facility Name"
                                                       value="{{$plant['name']}}">
                                                @error('name')
                                                <p class="text-danger">{{$errors->first('name')}}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control form-control-sm" rows="3" placeholder="Enter Address"
                                                          name="address">{{$plant['address']}}</textarea>
                                                @error('address')
                                                <p class="text-danger">{{$errors->first('address')}}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Contact No</label>
                                                <input name="number" type="text" class="form-control form-control-sm"
                                                       placeholder="Enter Contact Number"
                                                       value="{{$plant['contactNo']}}">
                                                @error('number')
                                                <p class="text-danger">{{$errors->first('number')}}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="email" type="text" class="form-control form-control-sm"
                                                       placeholder="Enter Email"
                                                       value="{{$plant['email']}}">
                                                @error('email')
                                                <p class="text-danger">{{$errors->first('email')}}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Fax No</label>
                                                <input name="fax_no" type="text" class="form-control form-control-sm"
                                                       placeholder="Enter Fax Number"
                                                       value="{{$plant['fax_no']}}">
                                                @error('fax_no')
                                                <p class="text-danger">{{$errors->first('fax_no')}}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>GPS Latitude</label>
                                                <input name="gps_la" type="text" class="form-control form-control-sm"
                                                       placeholder="Enter Latitude"
                                                       value="{{$plant['gps_la']}}">
                                                @error('gps_la')
                                                <p class="text-danger">{{$errors->first('gps_la')}}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>GPS Longitude</label>
                                                <input name="gps_lo" type="text" class="form-control form-control-sm"
                                                       placeholder="Enter Longitude"
                                                       value="{{$plant['gps_lo']}}">
                                                @error('gps_lo')
                                                <p class="text-danger">{{$errors->first('gps_lo')}}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Capacity</label>
                                                <input name="capacity" type="text" class="form-control form-control-sm"
                                                       placeholder="Enter Capacity"
                                                       value="{{$plant['capacity']}}">
                                                @error('capacity')
                                                <p class="text-danger">{{$errors->first('capacity')}}</p>
                                                @enderror
                                            </div>
                                                                                            <div class="form-group divla">
                                                <label>Is Cluster</label>
                                                <select class="form-control form-control-sm isclusterCombo"
                                                        data-dropdown-css-class="select2-purple"
                                                        style="width: 100%;" name="is_cluster">

                                                    @if ($plant['is_cluster'] == 0)
                                                    <option  value="1" >Yes</option>
                                                    <option  value="0" selected>No</option>
                                                    @else
                                                    <option  value="1" selected>Yes</option>
                                                    <option  value="0">No</option>
                                                    @endif

                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            @if($pageAuth['is_update']==1 || false)
                                            <button type="submit" class="btn btn-warning">Update</button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">All Institutes</h3>
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
                                                @foreach($plants as $indexKey=>$p)
                                                <tr>
                                                    <td>{{$indexKey+1}}.</td>
                                                    <td>{{$p['name']}}</td>
                                                    <td>{{$p['type']}}</td>                                                                             
                                                    <td>
                                                        <a href="/plant/id/{{$p['id']}}"
                                                           class="btn btn-sm btn-primary">Select</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                @if($pageAuth['is_delete']==1 || false)
                                <div class="card card-primary">
                                    <div class="card-header">

                                        <h3 class="card-title"><b>Remove Facility '{{$plant['name']}}'</b></h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="alert alert-danger alert-dismissible">

                                                <h5><i class="icon fas fa-ban"></i> Warning!</h5>
                                                Deleting selected plant is not reversible. <br>
                                                Please Procede with care.
                                            </div>


                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        @if($pageAuth['is_delete']==1 || false)
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#modal-danger">
                                            Delete Facility
                                        </button>
                                        @endif
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </section>
                @if($pageAuth['is_delete']==1 || true)
                <div class="modal fade" id="modal-danger">
                    <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete Facility</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><b>Are you sure you want to permanently delete this plant ? </b></p>
                                <p>Once you continue, this process can not be undone. Please Procede with care.</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                <form action="/plant/id/{{$plant['id']}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-light">Delete Permanently</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                @endif
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




            });
                </script>
                @endsection
