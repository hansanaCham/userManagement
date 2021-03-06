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
                        <h1>Institute Wards</h1>
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
                                    <label>Edit Wards</label>
                                </div>
                                <form method="POST" action="/ward/id/{{$ward['id']}}">
                                    <div class="card-body">
                                        @csrf    
                                        @method('PUT')  
                                                                
                                        <div class="form-group">
                                            <label>Ward Name</label>
                                            <input name="name" type="text" class="form-control form-control-sm" required
                                                   placeholder="Enter Plant Authority Name"
                                                   value="{{$ward['name']}}">
                                            @error('name')
                                            <p class="text-danger">{{$errors->first('name')}}</p>
                                            @enderror
                                        </div>
                                              <div class="form-group">
                                                  <label>Ward Code</label>
                                                  <input name="code" type="text" class="form-control form-control-sm"
                                                         placeholder="Enter Contact Number"
                                                                    value="{{$ward['code']}}">
                                                  @error('number')
                                                  <p class="text-danger">{{$errors->first('code')}}</p>
                                                  @enderror
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
                                <h3 class="card-title">All Sampath Kendraya</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-condensed assignedPrivilages" id="tblUsers">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th style="width: 200px">Code</th>                                        
                                        <th style="width: 200px">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                                                        @foreach($wards as $indexKey=>$s)
                                                                            <tr>
                                                                                <td>{{$indexKey+1}}.</td>
                                                                                <td>{{$s['name']}}</td>
                                                                                <td>{{$s['code']}}</td>                                                                             
                                                                                <td>
                                                                                    <a href="/ward/id/{{$s['id']}}"
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

                                <h3 class="card-title"><b>Remove ward '{{$ward['name']}}'</b></h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="alert alert-danger alert-dismissible">

                                        <h5><i class="icon fas fa-ban"></i> Warning!</h5>
                                        Deleting selected ward is not reversible. <br>
                                        Please Procede with care.
                                    </div>


                                </div>
                            </div>
                            <div class="card-footer">
                                @if($pageAuth['is_delete']==1 || false)
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modal-danger">
                                        Delete ward
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
                            <h4 class="modal-title">Delete ward</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><b>Are you sure you want to permanently delete this ward ? </b></p>
                            <p>Once you continue, this process can not be undone. Please Procede with care.</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                            <form action="/ward/id/{{$ward['id']}}" method="POST">
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
