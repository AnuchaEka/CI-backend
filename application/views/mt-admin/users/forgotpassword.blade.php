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
    <link href="{{base_url('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"
    />
    <link href="{{base_url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css"
    />
    <link href="{{base_url('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{base_url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css"
    />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{base_url('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{base_url('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css"
    />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{base_url('assets/global/css/components.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{base_url('assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{base_url('assets/pages/css/login.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{base_url('assets/layouts/layout/css/custom.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class=" login">
    <!-- BEGIN LOGO -->
    <div class="logo">
    <a href="{{base_url()}}">
    <img src="{{base_url('assets/media/mountain-logo-w.png')}}" alt="" /> </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
       
        <!-- BEGIN FORGOT PASSWORD FORM -->
        <form class="forget-form" action="" method="post">
      

            <h3 class="font-green">{{$web->getLable('forgotpassword')}}</h3>
            <p>{{$web->getLable('msg-resetpass')}}</p>
            @if(!empty($error))
            <div class="alert alert-danger ">
                <button class="close" data-close="alert"></button>
                <span> {{$error}}</span>
            </div>
             @endif
             @if(!empty($msg))
            <div class="alert alert-success">
                <button class="close" data-close="alert"></button>
                <span> {{$msg}}</span>
            </div>
             @endif

            <div class="form-group">
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="{{$web->getLable('email')}}" name="email" required />                </div>
            <div class="form-actions">
                <button type="button" id="back-btn" onclick="window.location='{{base_url('mt-admin')}}'" class="btn green btn-outline">{{$web->getLable('back')}}</button>
                <button type="submit" class="btn btn-success uppercase pull-right">{{$web->getLable('submit')}}</button>
            </div>
        </form>
        <!-- END FORGOT PASSWORD FORM -->

    </div>
    <div class="copyright"> 2017 © BACKEND SYSTEM BY <a href="">MOUNTAIN STUDIO</a> </div>
    <!--[if lt IE 9]>
<script src="{{base_url('assets/global/plugins/respond.min.js')}}"></script>
<script src="{{base_url('assets/global/plugins/excanvas.min.js')}}"></script> 
<![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="{{base_url('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
    <script src="{{base_url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script src="{{base_url('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{base_url('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->

    <script src="{{base_url('assets/pages/scripts/form-validation.js')}}" type="text/javascript"></script>
        <script>
        $('form').parsley();
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>