<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>LOGIN BACKEND SYSTEM :: MOUNTAIN CMS</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{base_url('assets/global/plugins/font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{base_url('assets/global/plugins/simple-line-icons/simple-line-icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{base_url('assets/global/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{base_url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{base_url('assets/global/plugins/select2/css/select2.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{base_url('assets/global/plugins/select2/css/select2-bootstrap.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{base_url('assets/global/css/components.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{base_url('assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{base_url('assets/pages/css/login.css')}}" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="{{base_url('assets/pages/img/logo-big.png')}}" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="{{base_url('pj-admin/login/chklogin')}}" method="post">
                <h3 class="form-title font-green">Sign In</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">Login</button>
                    <label class="rememberme check mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" />Remember
                        <span></span>
                    </label>
                    <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                </div>
             
               
            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="index.html" method="post">
                <h3 class="font-green">Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
                    <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
          
        </div>
        <div class="copyright"> 2017 © Metronic. Admin Dashboard Template. </div>
        <!--[if lt IE 9]>
<script src="{{base_url('assets/global/plugins/respond.js')}}"></script>
<script src="{{base_url('assets/global/plugins/excanvas.js')}}"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{base_url('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{base_url('assets/global/plugins/bootstrap/js/bootstrap.js')}}" type="text/javascript"></script>
        <script src="{{base_url('assets/global/plugins/js.cookie.js')}}" type="text/javascript"></script>
        <script src="{{base_url('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js')}}" type="text/javascript"></script>
        <script src="{{base_url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.js')}}" type="text/javascript"></script>
        <script src="{{base_url('assets/global/plugins/jquery.blockui.js')}}" type="text/javascript"></script>
        <script src="{{base_url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{base_url('assets/global/plugins/jquery-validation/js/jquery.validate.js')}}" type="text/javascript"></script>
        <script src="{{base_url('assets/global/plugins/jquery-validation/js/additional-methods.js')}}" type="text/javascript"></script>
        <script src="{{base_url('assets/global/plugins/select2/js/select2.full.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{base_url('assets/global/scripts/app.js')}}" type="text/javascript"></script>
        <script src="{{base_url('assets/pages/scripts/login.js')}}" type="text/javascript"></script>

    </body>

</html>