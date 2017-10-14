<!-- BEGIN SIDEBPANEL-->
  <nav class="page-sidebar" data-pages="sidebar">
      
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
        Admin
      </div>
      <!-- END SIDEBAR MENU HEADER-->

      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <li class="m-t-30 ">
            <a href="/admin" class="detailed">
              <span class="title">Dashboard</span>
            </a>
            <span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>
          </li>
          <li class="">
            <a href="/admin/company" class="detailed">
              <span class="title">Companies</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-building-o"></i></span>
          </li>

          <li class="">
            <a href="/admin/user" class="detailed">
              <span class="title">Users</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-users"></i></span>
          </li>

          <li>
            <a href="javascript:;"><span class="title">Settings</span>
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail"><i class="pg-settings"></i></span>
            <ul class="sub-menu">
              
              <li class="">
                <a href="/data">Data</a>
                <span class="icon-thumbnail">D</span>
              </li>
            </ul>
          </li>
          
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
    </nav>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->
    
    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
        <!-- START HEADER -->
        <div class="header bg-warning">
            <!-- START MOBILE SIDEBAR TOGGLE -->
            <a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu" data-toggle="sidebar">
            </a>
            <!-- END MOBILE SIDEBAR TOGGLE -->
            <div class="">
              <div class="brand inline m-l-10">
                Admin
              </div>
              
            </div>
            <div class="d-flex align-items-center">
                <!-- START User Info-->
                <div class="pull-left p-r-10 fs-14 font-heading hidden-md-down">
                    <span class="semi-bold">{{auth()->user()->name}}</span>
                </div>
                <div class="dropdown pull-right hidden-md-down">
                    <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="thumbnail-wrapper d32 circular inline">
                            <img src="{{auth()->user()->avatar}}" alt="" data-src="{{auth()->user()->avatar}}" data-src-retina="{{auth()->user()->avatar}}" width="32" height="32">
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                        
                        <a href="/admin/settings" class="dropdown-item">
                            <i class="pg-settings_small"></i> Settings
                        </a>

                        <a href="{{ route('logout') }}" class="clearfix bg-master-lighter dropdown-item"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                            <span class="pull-left">Logout</span>
                            <span class="pull-right"><i class="pg-power"></i></span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- END HEADER -->