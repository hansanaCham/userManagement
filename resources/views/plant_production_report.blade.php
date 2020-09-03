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
@if($pageAuth['is_read']==1 || True)
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 col-sm-6">
                <h1>Plant Production</h1>
            </div>
        </div>
    </div>
</section>
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bio Compost Inputs</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="date" class="form-control float-right" id="fromDateUI" value="<?php echo date("Y-m-d"); ?>">
                            <input type="date" class="form-control float-right" id="toDateUI" value="<?php echo date("Y-m-d"); ?>">
                            <button id="btnSearch" type="button" class="btn btn-primary">Search</button>
                        </div>   
                        <div class="card-body table-responsive" style="height: 450px;">
                            <table class="table table-bordered" id="rep_table"></table>
                        </div>
                    </div>
                    <!-- /.card-body -->
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
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- AdminLTE App -->
<script>
    $(function () {
        loadRepTable($('#fromDateUI').val(), $('#toDateUI').val());
        $('#btnSearch').click(function () {
            loadRepTable($('#fromDateUI').val(), $('#toDateUI').val());
        });
        function loadRepTable(dateFrom, dateTo, callBack) {
            var tbl = '';
            $.ajax({
                type: "GET",
                headers: {
                    "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
                    "Accept": "application/json"
                },
                url: "/api/plant/bio_compost_report/from/" + dateFrom + "/to/" + dateTo,
                cache: false,
                success: function (result) {
                    $.each(result, function (index, row) {
                        let input_tot = parseFloat(row.input_amt);
                        tbl += '<tr><th colspan="4" style="text-align: center; font-size: 1.4em;">Input Date :' + row.finish_date + ' / Finished: ' + row.finish_date + ' / Input Amount :' + row.input_amt + '</th></tr>';
                            tbl += '<tr><th>Name</th><th>Nature</th><th>Output Amount</th><th>%</th></tr>';
                        $.each(row.output, function (index, out) {
                            let out_amt = parseFloat(out.output_amount);
                            let pres = (out_amt / input_tot) * 100;
                            tbl += '<tr>';
                            tbl += '<td>' + out.output_name + '</td>';
                            tbl += '<td>' + out.nature + '</td>';
                            tbl += '<td>' + out.output_amount + '</td>';
                            tbl += '<td><div class="progress progress-xs"><div class="progress-bar progress-bar-danger" style="width: ' + pres.toFixed(0) + '%"></div></div></td>';
                            tbl += '</tr>';

                            // do something with `item` (or `this` is also `item` if you like)
                        });
                        // do something with `item` (or `this` is also `item` if you like)
                    });
                    $('#rep_table').html(tbl);
                    if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                        callBack();
                    }
                }
            });
        }
    });
</script>
@endsection
