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
                        <a class="nav-link active" id="main_title_t" data-toggle="pill" href="#maintitle_tab" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Main Title</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="title_t" data-toggle="pill" href="#title_tab" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Sub Title</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="param_t" data-toggle="pill" href="#param_tab" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Parameter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="attr_t" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Attributes</a>
                    </li>
                    <!--                    <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Attribute Options</a>
                                        </li>-->
                    <li class="nav-item">
                        <a class="nav-link" id="param_type_t" data-toggle="pill" href="#param_types" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Parameter Types</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sur_priv" data-toggle="pill" href="#survey_prev" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Preview</a>
                    </li>

                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">

                    <!--MAIN TITLE TAB -->
                    <div class="tab-pane fade active show" id="maintitle_tab" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <label>Survey Main Title Registration</label>
                                    </div>

                                    <form method="" action="">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Main Title Number</label>
                                                <input type="number" class="form-control form-control-sm" readonly="" placeholder="Enter Number" value="" id="main_ttl_no">
                                            </div>
                                            <div class="form-group">
                                                <label>Main Title Name</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="Enter Name" value="" id="main_title_name">
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-primary" id="add_main_title"><i class="fa fa-plus"></i> Add</button>
                                            <button type="button" class="btn btn-danger d-none" id="delete_main_title"><i class="fa fa-times"></i> Delete</button>
                                            <button type="button" class="btn btn-default resetBtn" id=""><i class="fa fa-reorder"></i> Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title" id="">Main Titles</h3>
                                    </div>
                                    <div class="card-body table-responsive p-0" style="height: 450px;">
                                        <table class="table table-head-fixed text-nowrap" id="main_title_table">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%">#</th>
                                                    <th>Name</th>
                                                    <th style="width: 20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--TITLE TAB -->
                    <div class="tab-pane fade" id="title_tab" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <label>Survey Sub Title Registration</label>
                                    </div>

                                    <form method="" action="">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Main Title :</label>
                                                <select class="form-control form-control-sm mainTitle_cbo" id="main_title_combo"></select>
                                            </div>
                                            <div class="form-group">
                                                <label>Sub-Title Number</label>
                                                <input type="number" readonly="" class="form-control form-control-sm" placeholder="Enter Number" value="" id="title_number">
                                            </div>
                                            <div class="form-group">
                                                <label>Sub-Title Name</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="Enter Name" value="" id="title_text">
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-primary" id="add_title">Add</button>
                                            <button type="button" class="btn btn-danger d-none" id="delete_title">Delete</button>
                                            <button type="button" class="btn btn-default resetBtn" id="">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title" id="sub_title_card">All Users</h3>
                                    </div>
                                    <div class="card-body table-responsive p-0" style="height: 450px;">
                                        <table class="table table-head-fixed text-nowrap" id="title_table">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%">#</th>
                                                    <th>Sub-Tiles</th>
                                                    <th style="width: 20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--TAB 2-->
                    <div class="tab-pane fade" id="param_tab" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <label>Title Parameters</label>
                                    </div>

                                    <form method="" action="">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Title :</label>
                                                <select class="form-control form-control-sm title_cbo" id="title_comboParam"></select>
                                            </div>

                                            <div class="form-group">
                                                <label>Parameter Name:</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="Enter Name" value="" id="param_name">
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-primary" id="add_parameter">Add</button>
                                            <button type="button" class="btn btn-danger d-none" id="delete_param">Delete</button>
                                            <button type="button" class="btn btn-default resetBtn" id="">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Parameters</h3>
                                    </div>

                                    <div class="card-body table-responsive p-0" style="height: 450px;">
                                        <table class="table table-head-fixed text-nowrap" id="param_table">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%">#</th>
                                                    <th>Parameter Name</th>
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

                    <!--TAB 3-->
                    <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <label>Title Attributes Registration</label>
                                    </div>

                                    <form method="" action="">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Title :</label>
                                                <label class="attr_tab_title"></label>
                                                <!--<select class="form-control form-control-sm title_cbo" id="title_combo"></select>-->
                                            </div>
                                            <div class="form-group">
                                                <label>Attribute No:</label>
                                                <input type="number" readonly="" class="form-control form-control-sm" placeholder="Enter Number" value="" id="attr_no">
                                            </div>
                                            <div class="form-group">
                                                <label>Attribute Name:</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="Enter Attribute Name" value="" id="attr_name">
                                            </div>


                                        </div>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-primary" id="add_attr">Add</button>
                                            <button type="button" class="btn btn-danger d-none" id="delete_attr">Delete</button>
                                            <button type="button" class="btn btn-default resetBtn" id="">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Selected Title</h3>
                                    </div>
                                    <div class="card-body table-responsive p-0" style="height: 450px;">
                                        <table class="table table-head-fixed text-nowrap" id="attribute_table">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%">#</th>
                                                    <th>Attribute Name</th>
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

                    <!--TAB 4-->
                    <div class="tab-pane fade" id="param_types" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <label>Attributes Options Registration</label>
                                    </div>

                                    <form method="" action="">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Title :</label>
                                                <label class="attr_tab_title"></label>
                                            </div>
                                            <div class="form-group">
                                                <label>Attribute :</label>
                                                <select class="form-control form-control-sm attr_cbo" id="attr_combo"></select>
                                            </div>
                                            <div class="form-group">
                                                <label>Parameter :</label>
                                                <select class="form-control form-control-sm avl_param_cmb" id="param_combo"></select>
                                            </div>

                                            <div class="form-group">
                                                <label>Attribute Value Type :</label>
                                                <select class="form-control form-control-sm attr_type_cbo" id="survey_type">
                                                    <option value="TEXT">Text</option>
                                                    <option value="DATE">Date</option>
                                                    <option value="NUMERIC">Numeric</option>
                                                    <option value="SELECTED">Select</option>
                                                    <option value="FILE">File</option>
                                                </select>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" id="nullableCheckbox" type="checkbox">
                                                <label class="form-check-label">Nullable</label>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-primary" id="add_attrPara">Add</button>
                                            <button type="button" class="btn btn-danger d-none" id="attr_param_val_del">Delete</button>
                                            <button type="button" class="btn btn-default resetBtn" id="">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Selected Title</h3>
                                    </div>
                                    <div class="card-body table-responsive p-0" style="height: 450px;">
                                        <table class="table table-head-fixed text-nowrap" id="attr_param_val_table">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%">#</th>
                                                    <th>Parameter Name</th>
                                                    <th>Value Type</th>
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


                    <div class="tab-pane fade" id="survey_prev" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <label class="text-center" id="surv_view_title">Attributes Options Registration</label>
                                    </div>
                                    <div class="card-body table-responsive p-0" style="height: 450px;">
                                        <table class="table table-head-fixed text-nowrap" id="sur_privTbl">
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

        <!-- /.modal-->
        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Survey Options</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="" action="" class="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-10">
                                        <label class=" col-10">Option Value Name:</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Enter Value Name" value="" id="attr_val_name">
                                    </div>
                                    <div class="form-group col-2">
                                        <button type="button" class="btn btn-primary" id="sel_value">Add</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-10">
                                        <label>Option Value:</label>
                                        <select class="form-control form-control-sm attr_val_cmb" id="attr_option_combo"></select>
                                    </div>
                                    <div class="form-group col-2">
                                        <button type="button" class="btn btn-danger pull-right" id="attr_val_delete">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
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
<script src="/js/survey/survey.js" type="text/javascript"></script>
<script>
    $('.select2').select2();
    $("#tblUsers").DataTable();
    var F_TAB = 'main_title_t';

    $(function () {
        load_MainTitleTable();
        load_MainTitle_Combo(function () {
            load_titleTable(parseInt($('#main_title_combo').val()));
            load_titleCombo(parseInt($('#main_title_combo').val()), function () {
                $('.attr_tab_title').html($('#title_comboParam :selected').text());
                load_attrCombo(parseInt($('#title_comboParam').val()), function () {
                    load_attr_param_Table(parseInt($('#attr_combo').val()));
                    load_avl_paramCombo(parseInt($('#title_comboParam').val()), parseInt($('#attr_combo').val()));//available parameter combo
                });
                load_attributeTable(parseInt($('#title_comboParam').val()));
                load_paramTable(parseInt($('#title_comboParam').val()));
            });
        });

        $(document).on('click', '.val_sel', function () {
            load_attr_valCombo($(this).val());
            $('#sel_value').val($(this).val());
        });

//      **************      delete      ***********************
        $(document).on('click', '.btn-danger', function () {
            var ar = {"main_title_t": "main_title_t", "title_t": "title_t", "param_t": "param_t", "attr_t": "attr_t", "param_type_t": "param_type_t", "sel_value": "sel_value"};
            var f_v = ar[F_TAB];
            var del_id = parseInt($(this).val());
            if (this.id == 'attr_val_delete') {
                f_v = 'sel_value';
                del_id = parseInt($('#attr_option_combo').val());
            }

            remove_survData(f_v, del_id, function (p) {
                AlertMEssege(p.mgs);
                if (parseInt(p.id) === 1) {
                    load_survComboAndTable(F_TAB);
                    reset_form_data(F_TAB);
                    show_DelBtn(F_TAB, 'show');
                }
                if (this.id == 'attr_val_delete') {
                    load_attr_valCombo($(this).val());
                }
            });
        });

//      *************   select data ******************************
        $(document).on('click', '.btn-block', function () {
            set_selected_form_data(F_TAB, JSON.parse(decodeURIComponent($(this).data('row'))));
            show_DelBtn(F_TAB, 'show');
            show_saveBtn(F_TAB, 'hide');
        });
        $(document).on('click', '.resetBtn', function () {
            reset_form_data(F_TAB);
            load_survTable(F_TAB);
        });

//      ***********     save all forms data ***************************
        $(document).on('click', '.btn-primary', function () {
            var ar = {"main_title_t": "main_title_t", "title_t": "title_t", "param_t": "param_t", "attr_t": "attr_t", "param_type_t": "param_type_t", "sel_value": "sel_value"};
            var f_v = ar[F_TAB];
            if (this.id == 'sel_value') {
                f_v = 'sel_value';
            }
//            $(this).prop("disabled", true);
            save_survey(f_v, get_form_object(f_v), function (p) {
//                $(this).prop("disabled", false);
                AlertMEssege(p.mgs);
                if (p.mgs == 'true') {
                    if (f_v == 'sel_value') {
                        load_attr_valCombo(parseInt($('#sel_value').val()));
                    }
                    load_survComboAndTable(F_TAB);
                    reset_form_data(F_TAB);
//                    load_titleCombo(parseInt($('#main_title_combo').val()));
                }
            });
        });
// ********************* on change ************************************
// main title combo change
        $('#main_title_combo').change(function () {
            load_titleTable(parseInt($('#main_title_combo').val()));
            load_titleCombo(parseInt($('#main_title_combo').val()), function () {
                $('.attr_tab_title').html($('#title_comboParam :selected').text());
                load_attrCombo(parseInt($('#title_comboParam').val()), function () {
                    load_attr_param_Table(parseInt($('#attr_combo').val()));
                    load_avl_paramCombo(parseInt($('#title_comboParam').val()), parseInt($('#attr_combo').val()));//available parameter combo
                });
                load_attributeTable(parseInt($('#title_comboParam').val()));
                load_paramTable(parseInt($('#title_comboParam').val()));
            });
        });

// title combo change
        $('#title_comboParam').change(function () {
            $('.attr_tab_title').html($('#title_comboParam :selected').text());
            load_attrCombo(parseInt($('#title_comboParam').val()), function () {
                load_attr_param_Table(parseInt($('#attr_combo').val()));
                load_avl_paramCombo(parseInt($('#title_comboParam').val()), parseInt($('#attr_combo').val()));//available parameter combo
            });
            load_attributeTable(parseInt($('#title_comboParam').val()));
            load_paramTable(parseInt($('#title_comboParam').val()));
        });

        $('#attr_combo').change(function () {
            load_avl_paramCombo(parseInt($('#title_comboParam').val()), parseInt($('#attr_combo').val()));//available parameter combo
            load_attr_param_Table(parseInt($('#attr_combo').val()));
        });
        $('#param_combo').change(function () {
            load_attr_param_Table(parseInt($('#attr_combo').val()));
        });

//      ******************************************************************************************************
        $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
            reset_form_data(F_TAB);
            F_TAB = $(e.target).attr("id");
            if (F_TAB === 'sur_priv') {
                gen_priv($('#title_comboParam').val());
            }
        });
    });
</script>
@endsection
