<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link href="{{asset('public/links/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Font Icons -->
    <link href="{{asset('public/links/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/links/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/links/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

    <!-- animate css -->
    <link href="{{asset('public/links/css/animate.css')}}" rel="stylesheet" />

    <!-- Waves-effect -->
    <link href="{{asset('public/links/css/waves-effect.css')}}" rel="stylesheet">

    <!-- sweet alerts -->
    <link href="{{asset('public/links/assets/sweet-alert/sweet-alert.min.css')}}" rel="stylesheet">

    <!-- Custom Files -->
    <link href="{{asset('public/links/css/helper.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/links/css/style.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{asset('public/links/js/modernizr.min.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

</head>
<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

                        <!-- Authentication Links -->
                        @guest

                        @else
                             <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="{{route('home')}}" class="logo"><i class="md md-terrain"></i> <span>Inventory </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notification</li>
                                        <li class="list-group">
                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New user registered</div>
                                                    <p class="m-0">
                                                       <small>You have 10 unread messages</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>
                                           <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New settings</div>
                                                    <p class="m-0">
                                                       <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">Updates</div>
                                                    <p class="m-0">
                                                       <small>There are
                                                          <span class="text-primary">2</span> new updates available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                           <!-- last list item -->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <small>See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{URL::to('public/links/images/avatar-1.jpg')}}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                        <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">

                                             <i class="md md-settings-power"></i> Logout</a>
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                            </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="{{URL::to('public/links/images/avatar-1.jpg')}}" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Arup Paul <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                    <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">

                                         <i class="md md-settings-power"></i> Logout</a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        </li>
                                </ul>
                            </div>

                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{route('home')}}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-mail"></i><span> Mail </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('inbox')}}">Inbox</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{route('calender')}}" class="waves-effect"><i class="md md-event"></i><span> Calendar </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Elements </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="typography.html">Typography</a></li>
                                    <li><a href="buttons.html">Buttons</a></li>
                                    <li><a href="panels.html">Panels</a></li>
                                    <li><a href="checkbox-radio.html">Checkboxs-Radios</a></li>
                                    <li><a href="tabs-accordions.html">Tabs &amp; Accordions</a></li>
                                    <li><a href="modals.html">Modals</a></li>
                                    <li><a href="bootstrap-ui.html">BS Elements</a></li>
                                    <li><a href="progressbars.html">Progress Bars</a></li>
                                    <li><a href="notification.html">Notification</a></li>
                                    <li><a href="sweet-alert.html">Sweet-Alert</a></li>
                                </ul>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->
                        @endguest

    </div>


        <main class="py-4">
            @yield('content')
        </main>

    <footer class="footer text-right" style="position:inherit;">
        2020 © Inventory
    </footer>

</div>



    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="{{asset('public/links/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/links/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/links/js/waves.js')}}"></script>
    <script src="{{asset('public/links/js/wow.min.js')}}"></script>
    <script src="{{asset('public/links/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/links/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('public/links/assets/chat/moment-2.2.1.js')}}"></script>
    <script src="{{asset('public/links/assets/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('public/links/assets/jquery-detectmobile/detect.js')}}"></script>
    <script src="{{asset('public/links/assets/fastclick/fastclick.js')}}"></script>
    <script src="{{asset('public/links/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('public/links/assets/jquery-blockui/jquery.blockUI.js')}}"></script>

    <!-- sweet alerts -->
    <script src="{{asset('public/links/assets/sweet-alert/sweet-alert.min.js')}}"></script>
    <script src="{{asset('public/links/assets/sweet-alert/sweet-alert.init.js')}}"></script>

    <!-- flot Chart -->
    <script src="{{asset('public/links/assets/flot-chart/jquery.flot.js')}}"></script>
    <script src="{{asset('public/links/assets/flot-chart/jquery.flot.time.js')}}"></script>
    <script src="{{asset('public/links/assets/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('public/links/assets/flot-chart/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('public/links/assets/flot-chart/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('public/links/assets/flot-chart/jquery.flot.selection.js')}}"></script>
    <script src="{{asset('public/links/assets/flot-chart/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('public/links/assets/flot-chart/jquery.flot.crosshair.js')}}"></script>

    <!-- Counter-up -->
    <script src="{{asset('public/links/assets/counterup/waypoints.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/links/assets/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>

    <!-- CUSTOM JS -->
    <script src="{{asset('public/links/js/jquery.app.js')}}"></script>

    <!-- Dashboard -->
    <script src="{{asset('public/links/js/jquery.dashboard.js')}}"></script>

    <!-- Chat -->
    <script src="{{asset('public/links/js/jquery.chat.js')}}"></script>

    <!-- Todo -->
    <script src="{{asset('public/links/js/jquery.todo.js')}}"></script>

    <script type="text/javascript">
        /* ==============================================
        Counter Up
        =============================================== */
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });
        });
    </script>
</body>
</html>
