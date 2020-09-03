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
<section class="content-header">
    <div class="container-fluid">
        <div class="card card-primary card-outline card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="title_t" data-toggle="pill" href="#ses_start" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Start Session</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="surv_create_t" data-toggle="pill" href="#ses_setup" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Create Survey</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">

                    <!--TAB 1-->
                    <div class="tab-pane fade active show" id="ses_start" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <label>Survey Management</label>
                                    </div>

                                    <form method="" action="">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Survey Name :</label>
                                                <select class="form-control form-control-sm surveyNameCmb" id="survey_combo"></select>
                                            </div>
                                            <div class="form-group">
                                                <label>Start Date:</label>
                                                <input type="date" class="form-control form-control-sm" placeholder="" value="" id="surv_create_dt">
                                            </div>
                                            <div class="form-group">
                                                <label>End Date:</label>
                                                <input type="date" class="form-control form-control-sm" placeholder="" value="" id="surv_end_dt">
                                            </div>
                                            <div class="form-group">
                                                <label>Survey Year:</label>
                                                <input type="number" class="form-control form-control-sm" placeholder="" value="" id="surv_year">
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-success" id="create_sessionBtn">Create Session</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title" id="survey_sessTbltitle"></h3>
                                    </div>
                                    <div class="card-body">
                                    	<div class="card-body table-responsive p-0" style="height: 450px;">
                                        <table class="table table-condensed " id="avl_sur_titleTable">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%">#</th>
                                                    <th>Tile Name</th>
                                                    <th style="width: 20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Available Surveys</h3>
                                    </div>
                                    <div class="card-body table-responsive p-0" style="height: 450px;">
                                        <table class="table table-head-fixed text-nowrap" id="sur_sessionTable">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%">#</th>
                                                    <!--<th style="width: 5%"><input type="checkbox" class=""/></th>-->
                                                    <th>Survey Name</th>
                                                    <th>Survey Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--TAB 2-->
                    <div class="tab-pane fade" id="ses_setup" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <label>CREATE SURVEY</label>
                                    </div>

                                    <form method="" action="">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Survey Name:</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="Enter Name" value="" id="surv_name">
                                            </div>
                                            <div class="form-group">
                                                <label>Update Interval :</label>
                                                <select class="form-control" id="update_type">
                                                    <option value="1">Yearly</option>
                                                    <option value="0">None</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-primary" id="add_session_name">Add</button>
                                            <button type="button" class="btn btn-default" id="reset_session">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">All Titles</h3>
                                    </div>
                                    <div class="card-body table-responsive p-0" style="height: 450px;">
                                        <table class="table table-head-fixed text-nowrap " id="sur_titleTable">
                                            <thead>
                                                <tr>
                                                    <!--<th style="width: 5%">#</th>-->
                                                    <th style="width: 5%"><input type="checkbox" class="allCheck"/></th>
                                                    <th>Title</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Available Survey Sessions</h3>
                                    </div>
                                    <div class="card-body table-responsive p-0" style="height: 450px;">
                                        <table class="table table-head-fixed text-nowrap " id="survey_names_tbl">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%">#</th>
                                                    <!--<th style="width: 5%"><input type="checkbox" class=""/></th>-->
                                                    <th>Survey Name</th>
                                                    <th>Survey Type</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
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

<!--added by viraj-->
<script src="/js/survey/survey_start.js" type="text/javascript"></script>
<script>

    $(function () {
        load_titlesTbl();
        load_allSessionsTbl();
        load_allSurveysTbl();//new
        survey_name_combo(function () {
            load_titlesByNameTbl($('#survey_combo').val());
        });

//**** change event ***************/
        $(".allCheck").change(function () {
            $("input:checkbox[name=selttl]").prop('checked', this.checked);
        });
        $('#survey_combo').change(function () {
            load_titlesByNameTbl($('#survey_combo').val());
        });


//**** click event ***************/
        $(document).on('click', '.down', function () {
            var row = $(this).parents("tr:first");
            row.insertAfter(row.next());
        });
        $(document).on('click', '.up', function () {
            var row = $(this).parents("tr:first");
            row.insertBefore(row.prev());
        });
        $("#arrange_btn").click(function () {
            if (confirm('Are you sure you want to change the order?')) {
                var ordr = get_title_order();
                send_title_order(parseInt($('#survey_combo').val()), ordr, function (pm) {
                    AlertMEssege(pm.mgs);
                    if (pm.mgs == 'true') {
                        load_titlesByNameTbl($('#survey_combo').val());
                    }
                });
            }
        });
        $("#reset_session").click(function () {
            reset_sur_createFrm();
        });


        $(document).on('click', '.sess_end', function () {
            end_surv_session(parseInt($(this).val()), function (res) {
                AlertMEssege(res.mgs);
                if (res.mgs == 'true') {
                    load_allSessionsTbl();
                }
            });
        });
        $(document).on('click', '.sess_rest', function () {
            restart_surv_session(parseInt($(this).val()), function (res) {
                AlertMEssege(res.mgs);
                if (res.mgs == 'true') {
                    load_allSessionsTbl();
                }
            });
        });
        $(document).on('click', '.del_sessionBtn', function () {
            Delete_survey_session(parseInt($(this).val()), function (p) {
                AlertMEssege(p.mgs);
                if (p.mgs == 'true') {
                    load_allSessionsTbl();
                }
            });
        });
        $(document).on('click', '.del_nameBtn', function () {
            Delete_survey_name(parseInt($(this).val()), function (p) {
                AlertMEssege(p.mgs);
                if (p.mgs == 'true') {
                    load_allSurveysTbl();//new
                    survey_name_combo(function () {
                        load_titlesByNameTbl($('#survey_combo').val());
                    });
                }
            });
        });
        $(document).on('click', '#add_session_name', function () {
            add_suvey_names(get_surv_name_f_val(), function (p) {
                AlertMEssege(p.msg);
                if (p.msg == 'true') {
                    reset_sur_createFrm();
                    load_allSurveysTbl();
                    survey_name_combo(function () {
                        load_titlesByNameTbl($('#survey_combo').val());
                    });
                }
            });
        });
        $(document).on('click', '#create_sessionBtn', function () {
            create_surveySession(get_surv_sesion_f_val(), function (p) {
                AlertMEssege(p.mgs);
                if (p.mgs == 'true') {
                    reset_sur_createFrm();
                    load_allSessionsTbl();
                }
            });
        });
    });
</script>
@endsection
