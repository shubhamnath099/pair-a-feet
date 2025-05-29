<?php 
    session_start();
    include 'admin/config/config.php';
    include 'admin/config/helper.php';

 ?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
        $data = $db->query("SELECT * FROM seo");
        $value = $data->fetch_object();
     ?>
        <title><?=$value->title;?> </title>
        <meta name="keywords" content="<?=$value->keywords;?>">
        <link rel="canonical"  href="<?=$value->canonical;?>">
        <meta name="description" content="<?=$value->description;?>">
        <meta name="author" content="<?=$value->author;?>">    <!-- CSS 
    ========================= -->
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Font CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

<!-- Main Wrapper Start -->
<div class="main-wrapper">
    <!-- header-area start -->
    <div class="header-area">
        <!-- header-top start -->
        <div class="header-top bg-black">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 order-2 order-lg-1">
                        <div class="top-left-wrap">
                            <ul class="phone-email-wrap">
                                <li><i class="fa fa-phone"></i> 9938062586</li>
                                <li><i class="fa fa-envelope-open-o"></i> mohammed.mozasim@gmail.com</li>
                            </ul>
                            <ul class="link-top">
                                <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" title="Rss"><i class="fa fa-rss"></i></a></li>
                                <li><a href="#" title="Google"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" title="Youtube"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 order-1 order-lg-2">
                        <div class="top-selector-wrapper">
                            <ul class="single-top-selector">
                                <!-- Currency Start -->
      
                                <!-- Currency End -->
                                <!-- Language Start -->

                                <!-- Language End -->
                                <!-- Sanguage Start -->
                                <?php 
                                    $u_id = $_SESSION['u_id'];
                                    if($u_id == ''){
                                ?>
                                 <li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>  Sign in</a></li>


                            <?php }else{ ?>
                                <li class="setting-top list-inline-item">
                                    <div class="btn-group">
                                        <button class="dropdown-toggle"><i class="fa fa-user-circle-o"></i> Setting <i class="fa fa-angle-down"></i></button>
                                        <div class="dropdown-menu">
                                            <ul>
                                                <li><a href="my-account.php">My account</a></li>
                                                <li><a href="action/register.php?submit=logout">Logout</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                                <!-- Sanguage End -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header-top end -->
        <!-- Header-bottom start -->
        <div class="header-bottom-area header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-4">
                        <!-- logo start -->
                       <div class="logo">
                            <a href="index.php"><img src="images/safi.png" width="130" height="85"></a>
                        </div>
                        <!-- logo end -->
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <!-- main-menu-area start -->
                        <div class="main-menu-area">
                            <nav class="main-navigation">
                                <ul>
                                    <li  class="active"><a href="index.php">Home  </a>
                                    </li>
                                    <li><a href="product.php">Products</a>
                                    </li>
                                    <li><a href="blog.php">Blog  </a>
                                    </li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="contact.php">Contact us</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- main-menu-area start -->
                    </div>
                    <div class="col-lg-3 col-8">
                        <div class="header-bottom-right">
                            <div class="block-search">
                                <div class="trigger-search"><i class="fa fa-search"></i> <span>Search</span></div>
                                <div class="search-box main-search-active">
                                    <form action="#" class="search-box-inner">
                                        <input type="text" placeholder="Search our catalog">
                                        <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="shoping-cart">
                                <div class="btn-group">
                                    <?php 
                                        $sessionid=session_id();
                                        $u_id = $_SESSION['u_id'];
                                        if($u_id == ''){
                                            $data5 = $db->query("SELECT * FROM `cart` WHERE sesion = '$sessionid' AND sts = 0");
                                        }else{
                                            $data5 = $db->query("SELECT * FROM `cart` WHERE u_id = '$u_id' AND sts = 0");                                        
                                        }
                                        $value5 = $data5->fetch_object();
                                    ?>  

                                    
                                    <!-- Mini Cart Button start -->
                                    <button class="dropdown-toggle"><i class="fa fa-shopping-cart"></i> Cart (<?=$data5->num_rows;?>)</button>
                                    <!-- Mini Cart button end -->
                                    
                                    <!-- Mini Cart wrap start -->
                                    <div class="dropdown-menu mini-cart-wrap">
                                        <div class="shopping-cart-content">
                                            <ul class="mini-cart-content">
                                                <!-- Mini-Cart-item start -->
                                    <?php 
                                        $sessionid=session_id();
                                        $u_id = $_SESSION['u_id'];
                                        if($u_id == ''){
                                            $data = $db->query("SELECT * FROM `cart` WHERE sesion = '$sessionid' AND sts = 0");
                                        }else{
                                            $data = $db->query("SELECT * FROM `cart` WHERE u_id = '$u_id' AND sts = 0");                                        
                                        }
                                        while($value = $data->fetch_object()){
                                    ?>                                                
                                    <li class="mini-cart-item">
                                                    <div class="mini-cart-product-img">
                                                        <a href="#"><img src="admin/pages/<?=$value->img1;?>" alt=""></a>
                                                        <span class="product-quantity"><?=$value->qty;?>x</span>
                                                    </div>
                                                    <div class="mini-cart-product-desc">
                                                        <h3><a href="#"><?=$value->name;?></a></h3>
                                                        <div class="price-box">
                                                            <span class="new-price">Rs <?=number_format($value->total, 2, '.', ',');?></span>
                                                        </div>
                                                        <div class="size">
                                                            Size: <?=$value->size;?>
                                                        </div>
                                                    </div>
                                                    <div class="remove-from-cart">
                                                        <a href="action/addtocart.php?submit=deletecart&ct_id=<?=$value->ct_id;?>" title="Remove"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                                <!-- Mini-Cart-item end -->
                                                
                                                <!-- Mini-Cart-item start -->
   
                                                <!-- Mini-Cart-item end -->
                                    <?php 
                                        $sessionid=session_id();
                                        $u_id = $_SESSION['u_id'];
                                        if($u_id == ''){
                                            $data4 = $db->query("SELECT SUM(total) as 'price' FROM `cart` WHERE sesion = '$sessionid' AND sts = 0");
                                        }else{
                                            $data4 = $db->query("SELECT SUM(total) as 'price' FROM `cart` WHERE u_id = '$u_id' AND sts = 0");                                        
                                        }
                                        $value4 = $data4->fetch_object();
                                    ?>                                                   
                                    <li>
                                                    <!-- shopping-cart-total start -->
                                                    <div class="shopping-cart-total">
                                                        <h4>Total : <span>Rs <?= number_format($value4->price, 2, '.', ',');?></span></h4>
                                                    </div>
                                                    <!-- shopping-cart-total end -->
                                                </li>
                                                
                                                <li>   
                                                    <!-- shopping-cart-btn start -->
                                                    <div class="shopping-cart-btn">
                                                        <a href="cart.php">Cart</a>
                                                        <a href="checkout.php">Checkout</a>
                                                    </div>
                                                     <!-- shopping-cart-btn end -->
                                                </li>
                                            


                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Mini Cart wrap End -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- mobile-menu start -->
                        <div class="mobile-menu d-block d-lg-none"></div>
                        <!-- mobile-menu end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Header-bottom end -->
    </div>
    <!-- Header-area end -->
    