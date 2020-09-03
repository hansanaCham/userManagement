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
                <h1>General Reports</h1>
            </div>
        </div>
    </div>
</section>
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <label id="lblTitle">Report Parameters</label>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Report Name</label>
                            <select class="form-control form-control-sm" id="report_id">
                                <option value="1">Dumping Sites</option>
                                <option value="2">Compost Facilities</option>
                                <option value="3">Bio gas Facilities</option>
                                <option value="4">Waste Water Treatment Facilitates</option>
                                <option value="5">Vehicles</option>
                                <!--                                <option value="6">Staffs For Waste Management</option>
                                                                <option value="7">Waste Collection Amount</option>
                                                                <option value="8">Waste Collection Ratio</option>-->
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Filter By</label>
                            <select class="form-control form-control-sm" id="repFilterBy">
                                <option value="la">Local Authority</option>
                                <option value="zone">Zone</option>
                                <option value="district">District</option>
                                <option value="province">Provincial</option>
                                <option value="national">National</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Filter By</label>
                            <select class="form-control form-control-sm " id="filt_type">
                                <option value="0">All</option>
                                <option value="1">Individual</option>
                            </select>
                        </div>

                        <div class="form-group d-none" id="LaComboDev">
                            <label>Local Authority</label>
                            <select class="form-control form-control-sm" id="laCombo"></select>
                        </div>

                        <div class="form-group d-none" id="zoneComboDev">
                            <label>Zones</label>
                            <select class="form-control form-control-sm" id="zonesCombo"></select>
                        </div>

                        <div class="form-group d-none" id="DistrictComboDev">
                            <label>District</label>
                            <select class="form-control form-control-sm" id="districtCombo"></select>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" id="gen_report">Generate</button>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <label id="lblTitle">Report Columns</label>
                    </div>
                    <div class="card-body">
                        <div class="form-group" id="report_checkbox">
                            <!--                            <div class="form-check">
                                                            <input class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">Checkbox</label>
                                                        </div>-->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" checked="">
                                <label class="form-check-label">Checkbox checked</label>
                            </div>
                            <!--                            <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" disabled="">
                                                            <label class="form-check-label">Checkbox disabled</label>
                                                        </div>-->
                        </div>


                    </div>
                    <!--                    <div class="card-footer">
                                            <button class="btn btn-success" id="gen_report">Generate</button>
                                        </div>-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <label id="lblTitle">Report Data</label>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="report_table">
                            <thead></thead>
                            <tbody></tbody>
                        </table>
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
<!--<script src="../../plugins/select2/js/select2.full.min.js"></script>-->
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<!--<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>-->
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<!--<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>-->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!--<script src="../../js/SegregatableJS/submit.js"></script>-->
<!-- AdminLTE App -->
<script src="../../js/commonFunctions/functions.js" type="text/javascript"></script>
<script src="../../js/Reports/filtering_report.js" type="text/javascript"></script>
<script>
    $(function () {
        showDivByReport();
        localAuthorityCombo();
        zonesCombo();
        districtCombo();
        $("#repFilterBy, #filt_type, #laCombo, #zonesCombo, #districtCombo").change(function () {
            showDivByReport();
        });
        $("#gen_report").click(function () {
            let report_parameter = report_data();
            gen_report(report_parameter, function () {
                getTrCelValue("#report_table");
            });
        });
        $(document).on('click', '.chkbx', function () {
            if ($(this).is(':checked')) {
                $('.' + $(this).val()).removeClass('d-none');
            } else {
                $('.' + $(this).val()).addClass('d-none');
            }

        });
        function getTrCelValue(table) {
            let obj = {};
            $(table).find("thead>tr>td").each(function (i, el) {
                let k = $(this).attr('class');
                let v = $(this).text();
                obj[k] = v;
            });
            console.log(obj);
            create_checkboxReport(obj);
        }
        function create_checkboxReport(data) {
            $('#report_checkbox').html('');
            $.each(data, function (key, val) {
                let ch = '<div class="form-check">';
                ch += '<input class="form-check-input chkbx" type="checkbox" value="' + key + '" checked="">';
                ch += '<label class="form-check-label">' + val + '</label>';
                ch += '</div>';
                $('#report_checkbox').append(ch);
            });
        }

//        function get() {
//            var table = $('table');
//            var data = {};
//            table.find('tr').each(function (i, el) {
//                // no thead
//                if (i != 0) {
//                    var $tds = $(this).find('td');
//                    var row = [];
//                    $tds.each(function (i, el) {
//                        row.push($(this).text());
//                    });
//                    data.push(row);
//                }
//
//            });
//            return data;
//        }
    });

</script>
@endsection
