@extends('layouts.admin')
@extends('layouts.styles')
@extends('layouts.scripts')
@extends('layouts.navbar')
@extends('layouts.sidebar')
@extends('layouts.footer')
@section('pageStyles')
<!-- Select2 -->
<link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
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
                                <h1 class="text-primary display-6">Institute List, {{$province['name']}}</h1>
                                {{-- @dump($province) --}}
                                {{-- @dump($localAuthorities) --}}
                                {{-- @dump($surveySessions) --}}
                            </div>
                        </div>
                    </div>
                </section>

                    <div class="col-md-12">

                        <div class="row">
                          <div class="col-md-3">
                    <label> Survey Sessions</label>
                        <select class="form-control select2 select2-purple sessionCOmbo"
                                                        data-dropdown-css-class="select2-purple"
                                                        style="width: 100%;" name="province">

                                                    @foreach($surveySessions as $surveySession)
                                                            <option value="{{$surveySession['id']}}">{{$surveySession['surveyName']['name']}}</option>

                                                    @endforeach

                                                </select>
                                            </br>
                          </div>
                                                </div>
                                                <div class="row">
                        @foreach($localAuthorities as $indexKey=>$la)
                        <div class="col-md-4">
                            <div class="card card-primary">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">{{$la['name']}}</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <dl class="dl-horizontal">
                                        <dt>Type</dt>
                                        <dd>{{$la['type']}}</dd>
                                    </dl>
                                    <button type="button" id ="{{$la['id']}}"  class="btn btn-block btn-outline-primary btn-xs btn">Select</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </div>
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
                <script>
            $(function () {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000
                });

$(".btn").click(function(){
alert($(".sessionCOmbo").val());
// window.location.replace("/");
if($(".sessionCOmbo").val() == null){
}else{
window.location.replace("/local_authority_view/id/"+this.id+"/"+$(".sessionCOmbo").val());
}
})

            });
                </script>
                @endsection
