@section('sidebar')

@if(auth()->user()->roll->level->value < 4)
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
<!--        <div class="image">
            <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>-->
        <div class="info">
            <a href="#" class="d-block">Welcome, {{auth()->user()->first_name}}!</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-user-shield"></i>
                    <p>
                        Dashboards
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @foreach((auth()->user()->privileges) as $indexKey=>$pre)
                        @if($pre['id']===config('auth.privileges.generalReports') && auth()->user()->roll->level->value <= 3)
                            <li class="nav-item">
                                <a href="{{ url('/home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
                                    <i class="fas fa-user-plus nav-icon"></i>
                                    <p>Main dashboard</p>
                                </a>
                            </li>
                        @endif                       
                    @endforeach

                </ul>
            </li>      
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-user-shield"></i>
                    <p>
                        User Management
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @foreach((auth()->user()->privileges) as $indexKey=>$pre)
                        @if($pre['id']===config('auth.privileges.userCreate'))
                            <li class="nav-item">
                                <a href="{{ url('/users') }}" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
                                    <i class="fas fa-user-plus nav-icon"></i>
                                    <p>User Create</p>
                                </a>
                            </li>
                        @endif
                        @if($pre['id']===config('auth.privileges.userRole') && auth()->user()->roll->level->value == 1)
                            <li class="nav-item">
                                <a href="{{ url('/rolls') }}" class="nav-link {{ Request::is('rolls') ? 'active' : '' }}">
                                    <i class="fas fa-users-cog nav-icon"></i>
                                    <p>ROll Create</p>
                                </a>
                            </li>
                        @endif
                    @endforeach

                </ul>
            </li>      
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        General Settings
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @foreach((auth()->user()->privileges) as $indexKey=>$pre)
                        @if($pre['id']===config('auth.privileges.userCreate') && auth()->user()->roll->level->value < 3)
                            <li class="nav-item">
                                <a href="{{ url('/localAuthority') }}" class="nav-link {{ Request::is('localAuthority') ? 'active' : '' }}">
                                    <i class="fas fa-map-marker-alt nav-icon"></i>
                                    <p>Institute Registration</p>
                                </a>
                            </li>
                                               @endif
                        @if($pre['id']===config('auth.privileges.facility_output_types') && 
                        auth()->user()->roll->level->value == 1)
                            <li class="nav-item">
                                <a href="{{ url('/facility_output_types') }}" class="nav-link {{ Request::is('facility_output_types') ? 'active' : '' }}">
                                    <i class="fas fa-sign-out-alt nav-icon"></i>
                                    <p>Facility Output Types</p>
                                </a>
                            </li>
                        @endif


                        @if($pre['id']===config('auth.privileges.suboffice') && auth()->user()->roll->level->value == 3)
                            <li class="nav-item">
                                <a href="{{ url('/suboffice') }}" class="nav-link {{ Request::is('suboffice') ? 'active' : '' }}">
                                    <i class="fas fa-map-marked-alt nav-icon"></i>
                                    <p>Suboffice Registration</p>
                                </a>
                            </li>
                        @endif
                        {{-- @if($pre['id']===config('auth.privileges.userCreate'))
                            <li class="nav-item">
                                <a href="{{ url('/survey') }}" class="nav-link {{ Request::is('survey') ? 'active' : '' }}">
                                    <i class="fas fa-list-alt nav-icon"></i>
                                    <p>Survey Setup</p>
                                </a>
                            </li>
                        @endif --}}
                        {{-- @if($pre['id']===config('auth.privileges.userCreate'))
                            <li class="nav-item">
                                <a href="{{ url('/survey_view') }}" class="nav-link {{ Request::is('survey_view') ? 'active' : '' }}">
                                    <i class="fas fa-th-list nav-icon"></i>
                                    <p>Survey</p>
                                </a>
                            </li>
                        @endif --}}
                        @if($pre['id']===config('auth.privileges.plant'))
                            <li class="nav-item">
                                <a href="{{ url('/plant') }}" class="nav-link {{ Request::is('plant') ? 'active' : '' }}">
                                    <i class="fas fa-tree nav-icon"></i>
                                    <p>Facility</p>
                                </a>
                            </li>
                        @endif
                        @if($pre['id']===config('auth.privileges.transferStation'))
                            <li class="nav-item">
                                <a href="{{ url('/transfer_station') }}" class="nav-link {{ Request::is('transfer_station') ? 'active' : '' }}">
                                    <i class="fas fa-map-signs nav-icon"></i>
                                    <p>Transfer Stations</p>
                                </a>
                            </li>
                        @endif
                        @if($pre['id']===config('auth.privileges.dumpsite'))
                            <li class="nav-item">
                                <a href="{{ url('/dumpsite') }}" class="nav-link {{ Request::is('dumpsite') ? 'active' : '' }}">
                                    <i class="fas fa-trash-alt nav-icon"></i>
                                    <p>Dump Sites</p>
                                </a>
                            </li>
                        @endif
                        @if($pre['id']===config('auth.privileges.sampath'))
                            <li class="nav-item">
                                <a href="{{ url('/sampath') }}" class="nav-link {{ Request::is('sampath') ? 'active' : '' }}">
                                    <i class="fas fa-database nav-icon"></i>
                                    <p>Recyclable Waste Stores</p>
                                </a>
                            </li>
                        @endif
                        @if($pre['id']===config('auth.privileges.ward') && auth()->user()->roll->level->value == 3)
                            <li class="nav-item">
                                <a href="{{ url('/ward') }}" class="nav-link {{ Request::is('ward') ? 'active' : '' }}">
                                    <i class="fab fa-microsoft nav-icon"></i>
                                    <p>Wards</p>
                                </a>
                            </li>
                        @endif
                        @if($pre['id']===config('auth.privileges.vehicle') && auth()->user()->roll->level->value == 3)
                            <li class="nav-item">
                                <a href="{{ url('/driver') }}" class="nav-link {{ Request::is('driver') ? 'active' : '' }}">
                                    <i class="fas fa-car-side nav-icon"></i>
                                    <p>Drivers</p>
                                </a>
                            </li>
                        @endif
                        @if($pre['id']===config('auth.privileges.vehicle') && auth()->user()->roll->level->value == 3)
                            <li class="nav-item">
                                <a href="{{ url('/vehicle') }}" class="nav-link {{ Request::is('vehicle') ? 'active' : '' }}">
                                    <i class="fas fa-car-side nav-icon"></i>
                                    <p>Vehicles</p>
                                </a>
                            </li>
                        @endif
                        @if($pre['id']===config('auth.privileges.vehicle') && auth()->user()->roll->level->value == 2)
                            <li class="nav-item">
                                <a href="{{ url('/zone') }}" class="nav-link {{ Request::is('zone') ? 'active' : '' }}">
                                    <i class="fas fa-car-side nav-icon"></i>
                                    <p>Zones</p>
                                </a>
                            </li>
                        @endif
                        @if($pre['id']===config('auth.privileges.vehicle') && auth()->user()->roll->level->value == 2)
                            <li class="nav-item">
                                <a href="{{ url('/districts') }}" class="nav-link {{ Request::is('districts') ? 'active' : '' }}">
                                    <i class="fas fa-car-side nav-icon"></i>
                                    <p>Districts</p>
                                </a>
                            </li>
                        @endif
                        @if($pre['id']===config('auth.privileges.wardVehicleAssign') && auth()->user()->roll->level->value == 3)
                            <li class="nav-item">
                                <a href="{{ url('/ward_vehicle_assign') }}" class="nav-link {{ Request::is('ward_vehicle_assign') ? 'active' : '' }}">
                                    <i class="fas fa-shipping-fast nav-icon"></i>
                                    <p>Add Vehicles To Ward</p>
                                </a>
                            </li>
                        @endif
                        @if($pre['id']===config('auth.privileges.wardVehicleAssign') && auth()->user()->roll->level->value == 3)
                            <li class="nav-item">
                                <a href="{{ url('/ward_assign') }}" class="nav-link {{ Request::is('ward_assign') ? 'active' : '' }}">
                                    <i class="fas fa-shipping-fast nav-icon"></i>
                                    <p>Assign SubOffice To Ward</p>
                                </a>
                            </li>
                        @endif                        
                         @if($pre['id']===config('auth.privileges.wasteCollectionSettings') && auth()->user()->roll->level->value == 1)
                            <li class="nav-item">
                                <a href="{{ url('/waste_collection_settings') }}" class="nav-link {{ Request::is('waste_collection_settings') ? 'active' : '' }}">
                                    <i class="fas fa-shipping-fast nav-icon"></i>
                                    <p>Waste Collection Settings</p>
                                </a>
                            </li>
                        @endif
                        @if($pre['id']===config('auth.privileges.wasteCollectionSettings') && auth()->user()->roll->level->value == 1)
                            <li class="nav-item">
                                <a href="{{ url('/segregatable_types') }}" class="nav-link {{ Request::is('segregatable_types') ? 'active' : '' }}">
                                    <i class="fas fa-truck nav-icon"></i>
                                    <p>Recycable Items</p>
                                </a>
                            </li>
                        @endif                       
                        @if($pre['id']===config('auth.privileges.brokenVehicles') && auth()->user()->roll->level->value == 3)
                            <li class="nav-item">
                                <a href="{{ url('/broken_vehicles') }}" class="nav-link {{ Request::is('broken_vehicles') ? 'active' : '' }}">
                                    <i class="fas fa-truck nav-icon"></i>
                                    <p>Broken Vehicles</p>
                                </a>
                            </li>
                        @endif                       
                    @endforeach

                </ul>
            </li>
                  <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-list-ol"></i>
                    <p>
                        Survey
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    {{-- @dump((auth()->user()->surveys()) --}}
                    @foreach((auth()->user()->privileges) as $indexKey=>$pre)


                        @if($pre['id']===config('auth.privileges.userCreate') && auth()->user()->roll->level->value == 1)
                            <li class="nav-item">
                                <a href="{{ url('/survey') }}" class="nav-link {{ Request::is('survey') ? 'active' : '' }}">
                                    <i class="fas fa-database nav-icon"></i>
                                    <p>Survey Setup</p>
                                </a>
                            </li>
                        @endif
                        @if($pre['id']===config('auth.privileges.userCreate') && auth()->user()->roll->level->value == 1)
                            <li class="nav-item">
                                <a href="{{ url('/survey_session') }}" class="nav-link {{ Request::is('survey_session') ? 'active' : '' }}">
                                    <i class="fas fa-clipboard-check nav-icon"></i>
                                    <p>Survey Session</p>
                                </a>
                            </li>
                        @endif
                        @if($pre['id']===config('auth.privileges.userCreate') && auth()->user()->roll->level->value == 2)
                            <li class="nav-item">
                                <a href="/province/id/{{auth()->user()->institute_Id}}" class="nav-link {{ Request::is('/province/id/'.auth()->user()->institute_Id) ? 'active' : '' }}">
                                    <i class="far fa-chart-bar nav-icon"></i>
                                    <p>All Surveys</p>
                                </a>
                            </li>
                        @endif
                        @if($pre['id']===config('auth.privileges.userCreate') && auth()->user()->roll->level->value == 1)
                            <li class="nav-item">
                                <a href="/province/id/1" class="nav-link {{ Request::is('/province/id/'.auth()->user()->institute_Id) ? 'active' : '' }}">
                                    <i class="far fa-chart-bar nav-icon"></i>
                                    <p>All Surveys</p>
                                </a>
                            </li>
                        @endif

                          @if($pre['id']===config('auth.privileges.surveyEnter') && auth()->user()->roll->level->value == 3)
  @foreach((auth()->user()->surveys()) as $indexKey=>$s)
                            <li class="nav-item">
                                <a href="/survey_view/id/{{$s['id']}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{$s['surveyName']['name']}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/local_authority_view/id/{{auth()->user()->institute_Id}}/{{$s['id']}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{$s['surveyName']['name']}} View</p>
                                </a>
                            </li>
   @endforeach

    @endif
                    @endforeach
                

                </ul>
            </li>

             <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas  fa-recycle"></i>
                    <p>
                        Collection Settings
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                @foreach((auth()->user()->privileges) as $indexKey=>$pre)
                      @if($pre['id']===config('auth.privileges.mainWasteCollection') && auth()->user()->roll->level->value >= 3)
                            <li class="nav-item">
                                <a href="{{ url('/waste_collection') }}" class="nav-link {{ Request::is('survey_session') ? 'active' : '' }}">
                                    <i class="fas fa-truck nav-icon"></i>
                                    <p>Main Collection</p>
                                </a>
                            </li>
                        @endif

                        @if($pre['id']===config('auth.privileges.submitWasteCollection') && auth()->user()->roll->level->value == 3)
                            <li class="nav-item">
                                <a href="{{ url('/waste_collection_submit') }}" class="nav-link {{ Request::is('survey_session') ? 'active' : '' }}">
                                    <i class="fas fa-truck nav-icon"></i>
                                    <p>Waste Collection Submit</p>
                                </a>
                            </li>
                        @endif



                @endforeach     
 </ul>
        </li>
      
             <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas  fa-book"></i>
                    <p>
                       Reports
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                @foreach((auth()->user()->privileges) as $indexKey=>$pre)
                      @if($pre['id']===config('auth.privileges.mainWasteCollection') && auth()->user()->roll->level->value <= 3)
                            <li class="nav-item">
                                <a href="{{ url('/general_reports') }}" class="nav-link {{ Request::is('general_reports') ? 'active' : '' }}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>General Reports</p>
                                </a>
                            </li>
                        @endif

                                 @if($pre['id']===config('auth.privileges.mainWasteCollection') && auth()->user()->roll->level->value <= 3)
                            <li class="nav-item">
                                <a href="{{ url('/survey_reports') }}" class="nav-link {{ Request::is('survey_reports') ? 'active' : '' }}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Servay Report</p>
                                </a>
                            </li>
                        @endif

                        @if($pre['id']===config('auth.privileges.wasteCollectionReport') && auth()->user()->roll->level->value <= 3)
                            <li class="nav-item">
                                <a href="{{ url('/waste_collection_report') }}" class="nav-link {{ Request::is('waste_collection_report') ? 'active' : '' }}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Waste Collection Reports</p>
                                </a>
                            </li>
                        @endif


                                 @if($pre['id']===config('auth.privileges.mainWasteCollection') && auth()->user()->roll->level->value <= 3)
                            <li class="nav-item">
                                <a href="{{ url('/downloads') }}" class="nav-link {{ Request::is('survey_reports') ? 'active' : '' }}">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Downloads</p>
                                </a>
                            </li>
                        @endif
                @endforeach     
 </ul>
        </li>


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    @elseif(auth()->user()->roll->level->value == 4)
   @include('layouts.sidebarTransfer')
    @elseif(auth()->user()->roll->level->value == 5)
     @include('layouts.sidebarBioPlant')
      @elseif(auth()->user()->roll->level->value == 6)
        @include('layouts.sidebarBioPlant')

@endif
@endsection
