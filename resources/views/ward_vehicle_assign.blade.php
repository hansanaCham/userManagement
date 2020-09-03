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
@if($pageAuth != null)
@if($pageAuth['is_read']==1 || false)

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
                        <label>Vehicle Ward Assign</label>
                    </div>

                    <form method="POST" action="/plant">
                        <div class="card-body">
                            @csrf

                            <div class="form-group">

                                <label>Ward</label>

                                <select class="form-control select2 select2-purple wardCombo"
                                data-dropdown-css-class="select2-purple"
                                style="width: 100%;" name="cmboWardAssign"  id="cmboWardAssign">
                                <option selected value="0" selected>None</option>


                                <option value=""
                                selected></option>


                                <option value=""></option>


                            </select>

                        </div>



                        <div class="form-group">
                            <label>vehicle</label>

                            <select class="form-control select2 select2-purple vehicleCombo"
                            data-dropdown-css-class="select2-purple"
                            style="width: 100%;" name="type" id="comboVehicle">
                            <option value=""
                            selected></option>
                            <option value=""></option>


                        </select>
                    </div>
                    <div class="card-footer">

                        @endif
                        @if($pageAuth['is_create']==1 || false)
                        <button type="button" class="btn btn-primary" id="btnAssign">Assign</button>
                        @endif
                        @if($pageAuth['is_update']==1 || false)

                        @endif
                        @if($pageAuth['is_delete']==1 || false)

                        @endif
                        @else
                        No Privileges
                        @endif



                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="row ">
              <div class="col-md-4">

                  <img src="../../resources/img/truck.jpeg" class="w-100 my-2 mx-1">
                </div>
                <div class="col-md-8 px-3">
                    <div class="card-header card-block px-3">
                        <label class="card-title">Vehicle Details</label>
                    </div>

                <div class="col-col-md-12">
                    <label class="font-weight-normal">Registration No :</label><label class="font-weight-light"   id="txtRegistrationNo"></label> <br>
                    <label class="font-weight-normal">Vehicle Ownership:</label><label class="font-weight-light"   id="txtVehicleOwnership"></label> <br>
                    <label class="font-weight-normal">Vehicle Type:</label><label></label class="font-weight-light"   id="txtVehicleType"> <br>
                    <label class="font-weight-normal">Capacity (m<sup>3</sup>):</label><label class="font-weight-light"   id="txtCapacity"></label><br>


                  </div>
                </div>
            </div>  {{--  vehicle detail card --}}





<div class="card-footer">

</div>
</form>
</div>

</div>

<div class="col-md-7">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Assigned Vehicles</h3>
        </div>
        <div class="card-body">

    <div class="row col-md-12">
<div class="col-md-6">
        <div class="form-group clearfix">
           <div class="icheck-primary d-inline">
            <input type="checkbox" id="checkboxAllVehecle">
            <label for="checkboxAllVehecle">
                All Vehicle
            </label>
        </div>
</div>
    </div>
    <div class="col-6">

        <div class="form-group">

            <label>Ward</label>

            <select class="form-control select2 select2-purple wardCombo"
            data-dropdown-css-class="select2-purple"
            style="width: 100%;" name="province" id="cmboWard">
            <option selected value="0" selected>None</option>
            <option selected value="0">None</option>

            <option value=""
            selected></option>


            <option value=""></option>


        </select>

    </div>
</div>
</div>



        <div class="row ">



        <table class="table table-condensed assignedPrivilages" id="tblUsers">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Vehicle Reg No.</th>
                    <th style="width: 200px">Ward No.</th>
                    <th style="width: 200px">Action</th>
                </tr>
            </thead>
            <tbody id="tblVehicle">
                <tr>
                   {{-- <td>01</td>
                   <td>test vehicle</td>
                   <td>test</td>
                   <td> <a href="" class="btn btn-sm btn-danger">Delete</a>
                   </td> --}}
               </tr>

           </tbody>
       </table>

   </div>
</div>
</div><!--end row of table-->
</div><!-- end row-->
</div><!--container end-->
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
<script src="/js/lajs/laget.js"></script>
<script src="/js/lajs/lacombo.js"></script>
<script src="/js/Ward_Vehicle_Assign/load.js"></script>
<script src="/js/Ward_Vehicle_Assign/submit.js"></script>
<script>
        const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
            });


    $(function () {



        load_ward_combo(function(result){

          var wrdID = $("#cmboWard").find('option:selected').val();
        load_vehicle_table_for_selected_ward(wrdID,function(result){});
           });


        load_vehicle_combo(function(result){
            var vID = $("#comboVehicle").find('option:selected').val();// get vehicle number
            load_selected_vehicle_details(vID);
        });

        $( "#cmboWard" ).change(function() {
            $('#checkboxAllVehecle').prop('checked', false); // uncheck combobox when select ward
            var wrdID = $("#cmboWard").find('option:selected').val();
           // alert(wrdID);
           load_vehicle_table_for_selected_ward(wrdID,function(result){});
       });


        //get selected vehicle details
        $( "#comboVehicle" ).change(function() {

            var vID = $("#comboVehicle").find('option:selected').val();// get vehicle number
            load_selected_vehicle_details(vID);
        });
        //end get selected vehicle details


        //save assign
        $( "#btnAssign" ).click(function() {
            var wID = $("#cmboWardAssign").find('option:selected').val();// get vehicle number
            var vID = $("#comboVehicle").find('option:selected').val();// get vehicle number
            var submitdata = {
                "ward_id": wID,
                "vehicle_id": vID
            };

            //alert("To do save vehicle :"+vID+"   Ward :"+wID);
            save_vehicle_assign(submitdata,function(result){

                //reload tbl and vehicle combo after save
          var wrdID = $("#cmboWard").find('option:selected').val();
        load_vehicle_table_for_selected_ward(wrdID,function(result){});
        load_vehicle_combo(function(result){});
            });

        });
        //end save assign

        $('#checkboxAllVehecle').click(function() {
            if($('#checkboxAllVehecle').prop('checked')) {

             load_all_vehicle_tbl(function(result){});

         } else {
             //need to create when false
         }
     });


//      $("#tblVehicle").on( "click", "tr", function() {

//   console.log( $( this ).text() );
// });

$(document).on('click', '.actionProject', function () {
    var row = JSON.parse(decodeURIComponent($(this).data('row')));
    if(confirm('Are you sure you want to delete ?')){

        var submitdata = {
                "vehicle_id":row.id
            };
            delete_vehicle_assign(submitdata,function(result){
//reload tbl and vehicle combo  after delete
          var wrdID = $("#cmboWard").find('option:selected').val();
        load_vehicle_table_for_selected_ward(wrdID,function(result){});
        load_vehicle_combo(function(result){});
             });
}
  });


            // Toast.fire({
            //     type: 'success',
            //     title: 'Waste Management System</br>Institute Saved'
            // });



            // To
            //     title: 'Waste Management System</br>Error'
            // });






        });


    </script>
    @endsection
