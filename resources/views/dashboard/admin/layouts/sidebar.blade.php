<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <img
            src="{{ asset('vendor/dist/img/AdminLTELogo.png')}}"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: 0.8"
        />
        <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>

    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('vendor/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul
                class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false"
            >
    
                @can('view-users')                    
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                        Users
                        <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard-users-list') }}" class="nav-link">
                                <i class="fas fa-chevron-right nav-icon"></i>
                                <p>User Lists</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-chevron-right nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                
                    </ul>
                </li>  
                @endcan

                @can('view-roles')                    
                <li class="nav-item">
                    <a href="{{route('admin.roles.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-drafting-compass"></i>
                        <p>Roles</p>
                    </a>
                </li>
                @endcan

                @can('view-permissions')
                <li class="nav-item">
                    <a href="{{route('admin.permissions.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Permissions</p>
                    </a>
                </li>
                @endcan

                @can('view-jobs')                    
                <li class="nav-item">
                    <a href="{{route('admin.jobs.index')}}" class="nav-link">
                        <i class="fa fa-briefcase ml-1"></i>
                        <p> &nbsp;   Jobs</p>
                    </a>
                </li>  
                @endcan

                @can('view-industries')                    
                <li class="nav-item">
                    <a href="{{route('admin.industries.index')}}" class="nav-link">
                        <i class="fa fa-industry ml-1"></i>
                        <p> &nbsp;   Industries</p>
                    </a>
                </li>  
                @endcan

                @can('view-locations')                    
                <li class="nav-item">
                    <a href="{{route('admin.locations.index')}}" class="nav-link">
                        <i class="fa fa-map-marker ml-1"></i>
                        <p class="ml-2">&nbsp;  Locations</p>
                    </a>
                </li>  
                @endcan

                @can('view-skills')                    
                <li class="nav-item">
                    <a href="{{route('admin.skills.index')}}" class="nav-link">
                        <i class="fa fa-paint-brush"></i>
                        <p> &nbsp;   Skills</p>
                    </a>
                </li>  
                @endcan

                <li class="nav-item">
                    <a  href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                        <form action="{{ route('admin.logout') }}" id="logout-form" method="post">@csrf</form>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>