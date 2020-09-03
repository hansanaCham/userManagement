@section('sidebar')

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
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        General Settings 123
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @foreach((auth()->user()->privileges) as $indexKey=>$pre)
                        @if($pre['id']===config('auth.privileges.userCreate') && auth()->user()->roll->level->value > 4 )
                            <li class="nav-item">
                                <a href="{{ url('/localAuthority') }}" class="nav-link {{ Request::is('localAuthority') ? 'active' : '' }}">
                                    <i class="fas fa-map-marker-alt nav-icon"></i>
                                    <p>Register Personals</p>
                                </a>
                            </li>
                        @endif
                        @if($pre['id']===config('auth.privileges.degradable') && auth()->user()->roll->level->value > 4 )
                            <li class="nav-item">
                                <a href="{{ url('/bio_compostinput') }}" class="nav-link {{ Request::is('bio_compostinput') ? 'active' : '' }}">
                                    <i class="fas fa-map-marker-alt nav-icon"></i>
                                    <p>Add Compost Plant</p>
                                </a>
                            </li>
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
                      @if($pre['id']===config('auth.privileges.mainWasteCollection') && auth()->user()->roll->level->value > 4)
                            <li class="nav-item">
                                <a href="{{ url('/waste_collection') }}" class="nav-link {{ Request::is('survey_session') ? 'active' : '' }}">
                                    <i class="fas fa-truck nav-icon"></i>
                                    <p>Main Collection</p>
                                </a>
                            </li>
                        @endif
                 @if($pre['id']===config('auth.privileges.degradable') && auth()->user()->roll->level->value > 4)
                            <li class="nav-item">
                                <a href="{{ url('/bio_degradable') }}" class="nav-link {{ Request::is('bio_degradable') ? 'active' : '' }}">
                                    <i class="fas fa-truck nav-icon"></i>
                                    <p>Add Bio-degradables</p>
                                </a>
                            </li>
               @endif
                               



                @endforeach     
 </ul>
        </li>
        
          
        </ul>
    </nav>
    <!-- /.sidebar-menu -->

@endsection
