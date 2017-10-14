<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>System Management</title>

    @include('admin.layouts.head')
    @yield('local-head')
    
</head>
  <body class="fixed-header dashboard menu-pin menu-behind">

        @include('admin.layouts.menu')

        <!-- START PAGE CONTENT WRAPPER -->
        <div class="page-content-wrapper ">
            <!-- START PAGE CONTENT -->
            <div class="content sm-gutter">
            <!-- START CONTAINER FLUID -->
                <div class="container-fluid padding-25 sm-padding-10" id="up-app">

                    @yield('content')

                </div>
              <!-- END CONTAINER FLUID -->
            </div>
            <!-- END PAGE CONTENT -->

            <!-- START COPYRIGHT -->
            
            <div class=" container-fluid  container-fixed-lg footer">
                <div class="copyright sm-text-center">
                    <p class="small no-margin pull-left sm-pull-reset">
                      <span class="hint-text">&copy; {{date('Y')}}</span>
                      <span class="font-montserrat">UpShips.com</span>.

                      <!-- <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> <span class="muted">|</span> <a href="#" class="m-l-10">Privacy Policy</a></span> -->
                    </p>
                    <!-- <p class="small no-margin pull-right sm-pull-reset">
                      Hand-crafted <span class="hint-text">&amp; made with Love</span>
                    </p> -->
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- END COPYRIGHT -->
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->

    @include('admin.layouts.footer')

    @yield('local-footer')
  </body>
</html>