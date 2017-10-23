<!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
      
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
        <img src="/images/text.png" alt="logo" class="brand" data-src="/images/text.png" data-src-retina="/images/text_retina.png" height="22">
        <div class="sidebar-header-controls">
          <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20 hidden-md-down" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
          </button>
          <button type="button" class="btn btn-link hidden-md-down" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
          </button>
        </div>
      </div>
      <!-- END SIDEBAR MENU HEADER-->

      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <li class="m-t-30 ">
            <a href="/" class="detailed">
              <span class="title">In&iacute;cio</span>
            </a>
            <span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>
          </li>
          <li class="">
            <a href="/profile" class="detailed">
              <span class="title">Talentos</span>
            </a>
            <span class="icon-thumbnail"><i class="pg-search"></i></span>
          </li>
          
          <li>
            <a href="javascript:;">
              Recrutamento
            </a>
            <span class="icon-thumbnail"><i class="fa fa-user-plus"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="/selection">Processos seletivos</a>
                <span class="icon-thumbnail">P</span>
              </li>
              <li class="">
                <a href="/job">Vagas</a>
                <span class="icon-thumbnail"><i class="pg-suitcase"></i></span>
              </li>
              <li class="">
                <a href="/crew">Tripulantes</a>
                <span class="icon-thumbnail"><i class="fa fa-users"></i></span>
              </li>
            </ul>
          </li>
          
          <li>
            <a href="javascript:;">
              Insights
            </a>
            <span class="icon-thumbnail"><i class="fa fa-line-chart"></i></span>
            <ul class="sub-menu">
              
              <li class="">
                <a href="/insights/salaries">Sal&aacute;rios</a>
                <span class="icon-thumbnail"><i class="fa fa-dollar"></i></span>
              </li>
              
            </ul>
          </li>

          <li>
            <a href="javascript:;"><span class="title">Configura&ccedil;&otilde;es</span>
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail"><i class="pg-settings"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="color.html">Empresa</a>
                <span class="icon-thumbnail"><i class="fa fa-building-o"></i></span>
              </li>
              <li class="">
                <a href="/account">Conta</a>
                <span class="icon-thumbnail"><i class="fa fa-user"></i></span>
              </li>
              <li class="">
                <a href="/data">Dados</a>
                <span class="icon-thumbnail">D</span>
              </li>
              <li class="">
                <a href="/settings/linkedin">LinkedIn</a>
                <span class="icon-thumbnail"><i class="fa fa-linkedin"></i></span>
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
        <div class="header ">
            <!-- START MOBILE SIDEBAR TOGGLE -->
            <a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu" data-toggle="sidebar">
            </a>
            <!-- END MOBILE SIDEBAR TOGGLE -->
            <div class="">
              <div class="brand inline m-l-10">
                <img src="/images/text.png" alt="logo" data-src="/images/text.png" data-src-retina="/images/text_retina.png" height="22">
              </div>
              <!-- START NOTIFICATION LIST -->
                <ul class="hidden-md-down notification-list no-margin hidden-sm-down b-grey b-l b-r no-style p-l-30 p-r-20">

                    <li class="p-r-10 inline">
                      <a href="#" class="header-icon"><i class="fa fa-plus"></i> Nova vaga</a>
                    </li>

                </ul>
              <!-- END NOTIFICATIONS LIST -->
              <!-- <a href="#" class="search-link hidden-md-down" data-toggle="search"><i class="pg-search"></i>Type anywhere to <span class="bold">search</span></a> -->
            </div>
            <div class="d-flex align-items-center">
                <!-- START User Info-->
                <div class="pull-left p-r-10 fs-14 font-heading hidden-md-down">
                    <span class="semi-bold">{{auth()->user()->name}} [{{auth()->user()->id}}]</span>
                </div>
                <div class="dropdown pull-right hidden-md-down">
                    <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="thumbnail-wrapper d32 circular inline">
                            <img src="{{auth()->user()->avatar}}" alt="" data-src="{{auth()->user()->avatar}}" data-src-retina="{{auth()->user()->avatar}}" width="32" height="32">
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                      
                        <a href="/account" class="dropdown-item">
                            <i class="fa fa-user"></i> Account
                        </a>
                        
                        <a href="/settings" class="dropdown-item">
                            <i class="pg-settings_small"></i> Settings
                        </a>

                        <a href="/extras/support" class="dropdown-item">
                            <i class="pg-signals"></i> Help
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
                <!-- END User Info-->
                <a href="#" class="header-icon pg pg-alt_menu btn-link m-l-10 sm-no-margin d-inline-block" data-toggle="quickview" data-toggle-element="#quickview"></a>
            </div>
        </div>
        <!-- END HEADER -->