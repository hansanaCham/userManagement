@extends('layouts.admin')
@extends('layouts.styles')
@extends('layouts.scripts')
@extends('layouts.navbar')
@extends('layouts.sidebar')
@extends('layouts.footer')
@section('pageStyles')

<style>
    body {
        font-size: 13px;
        font-family: Arial;
    }
    table {
        width: 100%;
        margin-bottom: 15px;
    }
    table, tr, th, td {
        border: 1px solid #000;
        border-collapse: collapse;
    }
</style>
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <h1 class="text-center">{{$sess['survey_name']['name'] .' - '. $sess['year']}}</h1>
        <h1 class="text-center">{{$localAu['name'] .' - '. $localAu['type']}}</h1>
        <!--@dump($sess)-->
        @foreach ($data['rows'] as $row)
        @php
        $mainNumber = $row['main_no'];
        @endphp

        <div class="card card-primary">
            <div class="card-header bg-primary">
                <h3 class="card-title">{{sprintf('%d %s', $mainNumber, $row['main_name'])}}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @foreach($row['data'] as $rk => $dataRow)
                @php
                $colsize = ceil(75 / count($dataRow['columns']));
                $titleNumber = sprintf('%d.%d', $mainNumber, $dataRow['title_no']);
                @endphp
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="{{1+count($dataRow['columns'])}}" class="text-center" style="color: #666666; font-size: 1.5em;">{{sprintf('%s %s', $titleNumber, $dataRow['title'])}}</th>
                        </tr>
                        <tr>
                            <th style="width: 25%;"></th>
                            @foreach ($dataRow['columns'] as $column)
                            <th style="width: {{$colsize}}">{{$column}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataRow['attr_rows'] as $attr)
                        @php
                        $attrNo = sprintf('%d.%d.%d', $mainNumber, $dataRow['title_no'], $attr['attr_no']);
                        @endphp
                        <tr>
                            <td style="width: 25%;">{{sprintf('%s %s', $attrNo, $attr['attr_name'])}}</td>
                            @foreach ($dataRow['columns'] as $colk => $colv)
                            @if (array_key_exists('param_'. $colk, $attr['attr_values']))
                            @if ($attr['attr_values']['param_' . $colk]['type']=='FILE')
                            <td style="width: {{$colsize}}"><a href="../../../{{$attr['attr_values']['param_' . $colk]['val']}}" download="">Download File</a></td>
                            @else
                            <td style="width: {{$colsize}}">{{$attr['attr_values']['param_' . $colk]['val']}}</td>
                            @endif
                            @else
                            <td style="width: {{$colsize}}">&nbsp;</td>
                            @endif
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
@section('pageScripts')
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
@endsection