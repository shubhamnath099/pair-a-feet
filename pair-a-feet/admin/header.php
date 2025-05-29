<?php 
    $a_id = $_SESSION['a_id'];
    $data = $db->query("SELECT * FROM `admin` WHERE a_id = '$a_id'");
    $value = $data->fetch_object();
 ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Admin panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="assets/images/favicon.ico" />
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="select2.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
   <script src="assets/js/jquery.min.js"></script>
         <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>


    </head>
    <body class="fixed-left">
        <div id="wrapper">
            <div class="topbar">
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="dashboard.php" class="logo"><img src="assets/images/logo_white_2.png" height="28" /></a> <a href="dashboard.php" class="logo-sm"><img src="assets/images/logo_sm.png" height="36" /></a>
                    </div>
                </div>
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button type="button" class="button-menu-mobile open-left waves-effect waves-light"><i class="ion-navicon"></i></button> <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group"><input type="text" class="form-control search-bar" placeholder="Search..." /></div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"> <i class="fa fa-bell"></i> <span class="badge badge-xs badge-danger">0</span> </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notification <span class="badge badge-xs badge-success">0</span></li>
                                        <li class="list-group">
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="media-heading">No Any Notification Yet</div>
                                                    
                                                </div>
                                            </a>
     
                                            <a href="javascript:void(0);" class="list-group-item"> <small class="text-primary">See all notifications</small> </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="fa fa-crosshairs"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
              
                            <?php 
                              
                                if (!empty($value->img1)) {
                                    # code...
                                

                             ?>
                             <img src="pages/<?=$value->img1;?>" alt="" class="img-circle" />
                         <?php } else { ?>
                            <img src="assets/images/users/avatar-1.jpg" alt="" class="img-circle" />
                        <?php } ?>
                    
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="profile"> Profile</a></li>
                                        <li>
                                            <a href="javascript:void(0)"><span class="badge badge-success pull-right">5</span> Settings </a>
                                        </li>
                                        <li><a href="javascript:void(0)"> Lock screen</a></li>
                                        <li class="divider"></li>
                                        <li><a href="pages/loginaction?submit=logout"> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="text-center">
                            <?php 
                              
                                if (!empty($value->img1)) {
                                    # code...
                                

                             ?>
                             <img src="pages/<?=$value->img1;?>" alt="" class="img-circle" />
                         <?php } else { ?>
                            <img src="assets/images/users/avatar-1.jpg" alt="" class="img-circle" />
                        <?php } ?>
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?=$value->a_name;?></a>
                                <ul class="dropdown-menu">
                                    <li><a href="profile"> Profile</a></li>
                                    <li><a href="javascript:void(0)"> Settings</a></li>
                                    <li><a href="javascript:void(0)"> Lock screen</a></li>
                                    <li class="divider"></li>
                                    <li><a href="pages/loginaction?submit=logout"> Logout</a></li>
                                </ul>
                            </div>
                            <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
                        </div>
                    </div>
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="dashboard.php" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
                            </li>

                        <?php
                        foreach ( explode( ',', $_SESSION[ 'a_pagepermission' ] ) as $perm ) {
                            if ( $perm == '1' ) {
                                ?>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="mdi mdi-sitemap"></i><span> Page Section </span><span class="pull-right"><i class="mdi mdi-plus"></i></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="slider">Add Banner</a></li>
                                    <li><a href="testimonials">Add testimonials</a></li>
                                    <li><a href="seo">Add SEO</a></li>
                                    <li><a href="partner">Add Brand image</a></li>
                                    <li><a href="blog">Add blogs</a></li>


                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="mdi mdi-sitemap"></i><span> Order Section </span><span class="pull-right"><i class="mdi mdi-plus"></i></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="order">View Order</a></li>

                                </ul>
                            </li>


                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="mdi mdi-sitemap"></i><span> Product Section </span><span class="pull-right"><i class="mdi mdi-plus"></i></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="catagory">Add Category</a></li>
                                    <li><a href="subcategory">Add Subcategory</a></li>
                                    <li><a href="product">Add Product</a></li>
                                    <li><a href="productimage">Add Product Extra Image</a></li>
                                    <li><a href="unit">Add unit</a></li>
                                    <li><a href="price">Add Price </a></li>

                                </ul>
                            </li>




                                  <?php
                                }
                            }
                            ?>
                                <?php
                            foreach (explode(',', $_SESSION['a_pagepermission']) as $perm) {
                                if ($perm == '2') {
                                    ?>

                                      <?php
                                }
                            }
                            ?>
                            
                            <?php
                            foreach (explode(',', $_SESSION['a_pagepermission']) as $perm) {
                                if ($perm == '3') {
                                    ?>

                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>