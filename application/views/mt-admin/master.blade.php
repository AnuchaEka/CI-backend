@php defined('BASEPATH') OR exit('No direct script access allowed'); @endphp

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>BACKEND SYSTEM :: MOUNTAIN CMS</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <link href="{{base_url('assets/global/plugins/font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{base_url('assets/global/plugins/simple-line-icons/simple-line-icons.css')}}" rel="stylesheet" type="text/css"
    />
    <link href="{{base_url('assets/global/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{base_url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css"
    />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{base_url('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{base_url('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css"
    />
    <link href="{{base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css"
    />
    <link href="{{base_url('assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{base_url('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{base_url('assets/global/plugins/fancybox/source/jquery.fancybox.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{base_url('assets/global/plugins/codemirror/lib/codemirror.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{base_url('assets/global/plugins/codemirror/theme/material.css')}}" rel="stylesheet" type="text/css" />

    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{base_url('assets/global/css/components.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{base_url('assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{base_url('assets/layouts/layout/css/layout.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{base_url('assets/layouts/layout/css/themes/darkblue.css')}}" rel="stylesheet" type="text/css" id="style_color"
    />
    <link href="{{base_url('assets/layouts/layout/css/custom.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<script type="text/javascript">
    function get_menu(id) {
        $('#menu' + id).addClass('active open');

    }

    function sub_menu(id) {
        $('#submenu' + id).addClass('active open');
    }
</script>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white" onLoad="get_menu({{$ac}}); sub_menu({{$sac}});">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="index.html">
                        <img src="{{base_url('assets/layouts/layout/img/logo.png')}}" alt="logo" class="logo-default" /> </a>
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
                    <!-- BEGIN INBOX DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-envelope-open"></i>
                                <span class="badge badge-default"> 4 </span>
                            </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>You have
                                    <span class="bold">7 New</span> Messages</h3>
                                <a href="app_inbox.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                    <li>
                                        <a href="#">
                                                <span class="photo">
                                                    <img src="{{base_url('assets/layouts/layout3/img/avatar2.jpg')}}" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">Just Now </span>
                                                </span>
                                                <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                <span class="photo">
                                                    <img src="{{base_url('assets/layouts/layout3/img/avatar3.jpg')}}" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">16 mins </span>
                                                </span>
                                                <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                <span class="photo">
                                                    <img src="{{base_url('assets/layouts/layout3/img/avatar1.jpg')}}" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Bob Nilson </span>
                                                    <span class="time">2 hrs </span>
                                                </span>
                                                <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                <span class="photo">
                                                    <img src="{{base_url('assets/layouts/layout3/img/avatar2.jpg')}}" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">40 mins </span>
                                                </span>
                                                <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                            </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                <span class="photo">
                                                    <img src="{{base_url('assets/layouts/layout3/img/avatar3.jpg')}}" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">46 mins </span>
                                                </span>
                                                <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="{{base_url('assets/layouts/layout/img/avatar3_small.jpg')}}" />
                                <span class="username username-hide-on-mobile"> Nick </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="page_user_profile_1.html">
                                        <i class="icon-user"></i> ข้อมูลส่วนตัว </a>
                            </li>
                            <li>
                                <a href="app_calendar.html">
                                        <i class="icon-calendar"></i> My Calendar </a>
                            </li>
                            <li>
                                <a href="app_inbox.html">
                                        <i class="icon-envelope-open"></i> My Inbox
                                        <span class="badge badge-danger"> 3 </span>
                                    </a>
                            </li>
                            <li>
                                <a href="app_todo.html">
                                        <i class="icon-rocket"></i> My Tasks
                                        <span class="badge badge-success"> 7 </span>
                                    </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="page_user_lock_1.html">
                                        <i class="icon-lock"></i> Lock Screen </a>
                            </li>
                            <li>
                                <a href="page_user_login_1.html">
                                        <i class="icon-key"></i> ออกจากระบบ </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->

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
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200"
                    style="padding-top: 20px">
                    <li class="sidebar-toggler-wrapper hide">
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        <div class="sidebar-toggler">
                            <span></span>
                        </div>
                        <!-- END SIDEBAR TOGGLER BUTTON -->
                    </li>

                    @php $qr=$web->getMenu(); @endphp @foreach($qr as $menu) @php $qrsub=$web->getMenu($menu['menu_id']); @endphp
                    <li id="menu{{$menu['menu_id']}}" class="@if(empty($menu['menu_url']) or $menu['menu_url']=='#') {{'nav-item'}} @endif">
                        <a href="@if(empty($menu['menu_url']) or $menu['menu_url']=='#') {{'javascript:;'}} @else {{base_url('mt-admin/'.$menu['menu_url'])}} @endif"
                            class="nav-link nav-toggle">
                                <i class="fa {{$menu['menu_icon']}}"></i>
                                <span class="title">{{$menu['menu_name_'.$session->userdata('configlang')]}}</span>

                                <span class="@if(count($qrsub)>0) {{'arrow'}} @endif"></span>

                            </a> @if(count($qrsub)>0)
                        <ul class="sub-menu">
                            @foreach($qrsub as $menusub)
                            <li class="nav-item  " id="submenu{{$menusub['menu_id']}}">
                                <a href="@if(empty($menusub['menu_url']) or $menusub['menu_url']=='#') {{'javascript:;'}} @else {{base_url('mt-admin/'.$menusub['menu_url'])}} @endif"
                                    class="nav-link ">
                                        <span class="title">{{$menusub['menu_name_'.$session->userdata('configlang')]}}</span>
                                    </a>
                            </li>
                            @endforeach

                        </ul>
                        @endif


                    </li>
                    @endforeach

                </ul>
                <!-- END SIDEBAR MENU -->
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">

                @yield('content')

            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->

    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="page-footer-inner"> 2017 &copy; BACKEND SYSTEM BY
            <a href="#" target="_blank">MOUNTAIN STUDIO</a>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->
    <!--[if lt IE 9]>
<script src="{{base_url('assets/global/plugins/respond.js')}}"></script>
<script src="{{base_url('assets/global/plugins/excanvas.js')}}"></script> 
<![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script>
        var baseurl = '{{base_url()}}';
    </script>
    <script src="{{base_url('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/bootstrap/js/bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{base_url('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{base_url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/codemirror/lib/codemirror.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/codemirror/mode/javascript/javascript.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/codemirror/mode/css/css.js')}}" type="text/javascript"></script>

    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{base_url('assets/global/scripts/app.js')}}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <script src="{{base_url('assets/pages/scripts/table-datatables.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/pages/scripts/form-validation.js')}}" type="text/javascript"></script>
    @yield('script')
    <script>
        $('form').parsley();
    </script>
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{base_url('assets/global/plugins/fancybox/source/jquery.fancybox.pack.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/layouts/layout/scripts/layout.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/layouts/layout/scripts/web.app.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/layouts/global/scripts/quick-sidebar.js')}}" type="text/javascript"></script>
    <script>
        $('.iframe-btn').fancybox({
            'width': 950,
            'height': 450,
            'type': 'iframe',
            'autoScale': false,
            'autoSize': false,
        });

        function responsive_filemanager_callback(field_id) {
            console.log(field_id);
            var url = jQuery('#' + field_id).val();
            $("#inputimage").addClass("fileinput-new thumbnail");
            $("#removeimages").removeAttr("style");
            $("#inputimage").css({
                "max-width": "200px"
            });
            $('#image_preview').attr('src', document.getElementById("image_link").value).show();
            parent.$.fancybox.close();
        }

        $("#removeimages").on("click", function () {
            $('#image_preview').css({
                "display": "none"
            });
            $("#removeimages").css({
                "display": "none"
            });
            $("#inputimage").removeAttr("style");
            $("#inputimage").removeAttr("class");
            $("#image_link").val("");
        });
        setTimeout(function () {
            $('.alert').fadeOut()
        }, 3000);

        function chked(obj) {

            if ($(obj).prop('checked')) {

                $('.S' + $(obj).val()).prop('disabled', false);

            } else {
                $('.S' + $(obj).val()).prop('disabled', true);

            }

        }
    </script>
    <!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>