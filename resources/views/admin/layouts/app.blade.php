<!DOCTYPE html>
<html  lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="Techno-hat" name="author" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('admin') }}/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('admin') }}/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ asset('admin') }}/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ asset('admin') }}/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/css/style.css" rel="stylesheet" type="text/css" />

    @yield('css')
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="{{ asset('admin') }}/assets/img/favicon.png" />
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-closed">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{ url('admin/home') }}">
                <img src="{{ asset('admin') }}/assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="{{ asset('admin') }}/assets/img/man.png" />
                        <span class="username username-hide-on-mobile"> {{ auth()->guard('admin')->user()->username }} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{ url('admin/profile') }}">
                                <i class="icon-user"></i> My Profile </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/logout') }}">
                                <i class="icon-key"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="nav-item start ">
                    <a href="{{ url('admin/home') }}" class="nav-link nav-toggle">
                        <img class="icon_sidebar" src="{{ asset('admin/assets/img/icon/home.png') }}">
                        <span class="title">Home Page</span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('admin/setting') }}" class="nav-link nav-toggle">
                        <img class="icon_sidebar" src="{{ asset('admin/assets/img/icon/setting.png') }}">
                        <span class="title">Setting</span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('admin/admins') }}" class="nav-link nav-toggle">
                        <img class="icon_sidebar" src="{{ asset('admin/assets/img/icon/admins.png') }}">
                        <span class="title">Admins</span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('admin/teachers') }}" class="nav-link nav-toggle">
                        <img class="icon_sidebar" src="{{ asset('admin/assets/img/icon/teacher.png') }}">
                        <span class="title">Teachers</span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('admin/students') }}" class="nav-link nav-toggle">
                        <img class="icon_sidebar" src="{{ asset('admin/assets/img/icon/student.png') }}">
                        <span class="title">Students</span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('admin/courses') }}" class="nav-link nav-toggle">
                        <img class="icon_sidebar" src="{{ asset('admin/assets/img/icon/course.png') }}">
                        <span class="title">Courses</span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('admin/classes') }}" class="nav-link nav-toggle">
                        <img class="icon_sidebar" src="{{ asset('admin/assets/img/icon/class.png') }}">
                        <span class="title">Classes</span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('admin/lessons') }}" class="nav-link nav-toggle">
                        <img class="icon_sidebar" src="{{ asset('admin/assets/img/icon/lesson.png') }}">
                        <span class="title">Lessons Online</span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('admin/materials') }}" class="nav-link nav-toggle">
                        <img class="icon_sidebar" src="{{ asset('admin/assets/img/icon/book.png') }}">
                        <span class="title">Materials</span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('admin/events') }}" class="nav-link nav-toggle">
                        <img class="icon_sidebar" src="{{ asset('admin/assets/img/icon/event.png') }}">
                        <span class="title">Events</span>
                    </a>
                </li>


            </ul>
        </div>
        <!-- END SIDEBAR -->
    </div>


    <div class="page-content-wrapper">
        @yield('content')
    </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner" style="text-transform: uppercase"> 2018 © Almunif Pipes. </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<!--[if lt IE 9]>
<script src="{{ asset('admin') }}/assets/global/plugins/respond.min.js"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('admin') }}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('admin') }}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('admin') }}/assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('admin') }}/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ asset('admin') }}/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('admin') }}/assets/pages/scripts/form-wizard.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS --><!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('admin') }}/assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('admin') }}/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('admin') }}/assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset('admin') }}/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/js/work.js" type="text/javascript"></script>

@yield('js')
</body>

</html>