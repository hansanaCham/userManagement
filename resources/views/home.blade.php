@extends('layouts.admin')
@extends('layouts.styles')
@extends('layouts.scripts')
@extends('layouts.navbar')
@extends('layouts.sidebar')
@extends('layouts.footer')
@section('pageStyles')
<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
@endsection
@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3 id="acuracy_count">0</h3>
                    <p id="">Data Accuracy</p>
                </div>
                <div class="icon">
                    <i class="ion ion-clipboard"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3 id="workers_count">0</h3>

                    <p>Total Registered Workers</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3 id="vel_h3_lable">--</h3>
                    <p id="veh_lable">-</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3 id="out_of_odr_number">0</h3>
                    <p id="out_of_odr_lbl">Vehicles - Out of Order</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Total Collection vs Dump Site Collection</h3>
                        <!--<a href="javascript:void(0);">View Report</a>-->
                    </div>
                </div>

                <div class="card-body">
                    <!--                    <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span class="text-bold text-lg">820</span>
                                                <span>Visitors Over Time</span>
                                            </p>
                                            <p class="ml-auto d-flex flex-column text-right">
                                                <span class="text-success">
                                                    <i class="fas fa-arrow-up"></i> 12.5%
                                                </span>
                                                <span class="text-muted">Since last week</span>
                                            </p>
                                        </div>-->
                    <!-- /.d-flex -->

                    <div class="position-relative mb-4">
                        <canvas id="visitors-chart" height="200"></canvas>
                    </div>

                    <div class="d-flex flex-row justify-content-end">
                        <span class="mr-2">
                            <i class="fas fa-square text-primary"></i> Total Collection
                        </span>

                        <span>
                            <i class="fas fa-square text-gray"></i> Dump Amount
                        </span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                        Pending Collection
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <ul id="pondig_collection_ul">
                        <li>Lorem ipsum dolor sit amet</li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">


            <!-- Calendar -->
            <div class="card bg-gradient-success">
                <div class="card-header border-0">

                    <h3 class="card-title">
                        <i class="far fa-calendar-alt"></i>
                        Calendar
                    </h3>
                    <!-- tools card -->
                    <div class="card-tools">
                        <!-- button with a dropdown -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                <i class="fas fa-bars"></i></button>
                            <div class="dropdown-menu float-right" role="menu">
                                <a href="#" class="dropdown-item">Add new event</a>
                                <a href="#" class="dropdown-item">Clear events</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">View calendar</a>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body pt-0">
                    <!--The calendar -->
                    <div id="calendar" style="width: 100%"></div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Browser Usage</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="chart-responsive">
                                <canvas id="pieChart" height="150"></canvas>
                            </div>
                            <!-- ./chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                            <ul class="chart-legend clearfix" id="donutChartList">
                                <!--
                                                                <li><i class="far fa-circle text-success"></i> IE</li>
                                                                <li><i class="far fa-circle text-warning"></i> FireFox</li>
                                                                <li><i class="far fa-circle text-info"></i> Safari</li>
                                                                <li><i class="far fa-circle text-primary"></i> Opera</li>
                                                                <li><i class="far fa-circle text-secondary"></i> Navigator</li>-->
                            </ul>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <!--                <div class="card-footer bg-white p-0">
                                    <ul class="nav nav-pills flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                United States of America
                                                <span class="float-right text-danger">
                                                    <i class="fas fa-arrow-down text-sm"></i>
                                                    12%</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                India
                                                <span class="float-right text-success">
                                                    <i class="fas fa-arrow-up text-sm"></i> 4%
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                China
                                                <span class="float-right text-warning">
                                                    <i class="fas fa-arrow-left text-sm"></i> 0%
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>-->
                <!-- /.footer -->
            </div>
            <!-- /.card -->
        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection
@section('pageScripts')
<!-- Page script -->

<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<!--<script src="dist/js/adminlte.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="dist/js/demo.js"></script>-->

<script type="text/javascript">
    function get_pendingLaList(callBack) {
        let list = '';
        $('#pondig_collection_ul').html('');
        $.ajax({
            type: "GET",
            headers: {
                "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
                "Accept": "application/json"
            },
            url: "/api/chart/get_pending_la_name_list",
            cache: false,
            success: function (result) {
                if (result.length > 0) {
                    $.each(result, function (index, row) {
                        list += '<li>' + row.name + '</li>';
                    });
                }
                $('#pondig_collection_ul').html(list);
                if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                    callBack(result);
                }
            }
        });
    }
    function get_line_chartData(callBack) {
        $.ajax({
            type: "GET",
            headers: {
                "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
                "Accept": "application/json"
            },
            url: "/api/chart/linechart",
            cache: false,
            success: function (result) {
                if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                    callBack(result);
                }
            }
        });
    }
    function get_pie_chartData(callBack) {
        $.ajax({
            type: "GET",
            headers: {
                "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
                "Accept": "application/json"
            },
            url: "/api/chart/daily/waste/type",
            cache: false,
            success: function (result) {
                if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                    callBack(result);
                }
            }
        });
    }
    function card_list_details(callBack) {
        $.ajax({
            type: "GET",
            headers: {
                "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
                "Accept": "application/json"
            },
            url: "/api/chart/countable",
            cache: false,
            success: function (result) {
                $('#vel_h3_lable').html(result.vehicleCount);
                $('#veh_lable').html('Total Registered Vehicles');
                $('#out_of_odr_number').html(result.vehicleOutOfOrderCount);
                $('#out_of_odr_lbl').html('Vehicles - Out of Order ' + (parseInt(result.vehicleOutOfOrderCount) / parseInt(result.vehicleCount) * 100).toFixed(2) + '%');
                $('#workers_count').html(result.workerCount);
                $('#acuracy_count').html((parseInt(result.mailCollectionActualCount) / (parseInt(result.mailCollectionActualCount) + parseInt(result.mailCollectionEstimateCount)) * 100).toFixed(2) + '<sup style="font-size: 20px">%</sup>');
                if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                    callBack(result);
                }
            }
        });
    }
    function rendererLineChart(data) {
        // line chart
        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }
        var mode = 'index'
        var intersect = true
        var $visitorsChart = $('#visitors-chart')
        var visitorsChart = new Chart($visitorsChart, {
            data: {
                labels: data.lables,
//                labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
                datasets: [{
                        type: 'line',
//                        data: [100, 120, 170, 167, 180, 177, 160],
                        data: data.tot_col,
                        backgroundColor: 'transparent',
                        borderColor: '#007bff',
                        pointBorderColor: '#007bff',
                        pointBackgroundColor: '#007bff',
                        fill: false
                                // pointHoverBackgroundColor: '#007bff',
                                // pointHoverBorderColor    : '#007bff'
                    },
                    {
                        type: 'line',
//                        data: [60, 80, 70, 67, 80, 77, 100],
                        data: data.tot_dump,
                        backgroundColor: 'tansparent',
                        borderColor: '#ced4da',
                        pointBorderColor: '#ced4da',
                        pointBackgroundColor: '#ced4da',
                        fill: false
                                // pointHoverBackgroundColor: '#ced4da',
                                // pointHoverBorderColor    : '#ced4da'
                    }]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    mode: mode,
                    intersect: intersect
                },
                hover: {
                    mode: mode,
                    intersect: intersect
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                            // display: false,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 200
                            }, ticksStyle)
                        }],
                    xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                }
            }
        });
    }
    function renderer_pie_chart(parameters) {
        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData = {
            labels: [
                'Alluminium',
                'Plastic',
                'Mixed',
                'Glass',
                'Surgical',
                'Other',
            ],
//            labels: parameters.labels,
            datasets: [
                {
                    data: [700, 500, 400, 600, 300, 100],
//                    data: parameters.data,
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }
            ]
        }
        let list = '';
        $.each(pieData.labels, function (index, row) {
            list += '<li><i class="far fa-circle" style="color:' + pieData.datasets[0].backgroundColor[index] + ';"></i> ' + row + '</li>';
        });
        $('#donutChartList').html(list);
        var pieOptions = {
            legend: {
                display: false
            }
        }

        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
            type: 'doughnut',
            data: pieData,
            options: pieOptions
        })

        //-----------------
        //- END PIE CHART -
        //-----------------
    }
    get_line_chartData(function (parameters) {
        rendererLineChart(parameters);
    });
    card_list_details();
    get_pie_chartData(function (pm) {
        renderer_pie_chart(pm);
    });
    get_pendingLaList();
</script>
@endsection
