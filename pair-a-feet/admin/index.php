<?php
session_start();
require_once 'config/config.php';
require_once 'config/helper.php';
require_once 'config/auth_helper.php';
ob_start( "ob_html_compress" );
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>natural spice Login Admin panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="assets/images/favicon.ico" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-body">
                    <h3 class="text-center m-t-0 m-b-30">
                        <span class=""><img src="logo.png" alt="logo" /></span>
                    </h3>
                    <h4 class="text-muted text-center m-t-0"><b>Sign In</b></h4>
                    <?php include 'msg.php'; ?>
                    <form class="form-horizontal m-t-20" action="pages/loginaction.php" method="POST">
                        <div class="form-group">
                            <div class="col-xs-12"><input class="form-control" type="number" name="a_phone" required="" autocomplete="off" placeholder="Username" /></div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12"><input class="form-control" type="password" name="a_password" autocomplete="off" required="" placeholder="Password" /></div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-primary"><input id="checkbox-signup" type="checkbox" /> <label for="checkbox-signup"> Remember me </label></div>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12"><button class="btn btn-primary w-md waves-effect waves-light"  type="submit">Log In</button>
                                <input type="hidden" name="submit" value="Login"></div>

                        </div>
                        <div class="form-group m-t-30 m-b-0">
                            <div class="col-sm-7">
                                <a href="#" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                            </div>
                            <div class="col-sm-5 text-right"><a href="#" class="text-muted">Create an account</a></div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/app.js"></script>
    </body>

</html>
