<?php include 'header.php'; ?>

<?php
$u_id = $_SESSION['u_id'];
 
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$query = $_SERVER['QUERY_STRING'];
$finalurl =  $url;
?>




<!-- Hero Slider start -->
    <div class="hero-slider-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="hero-slider hero-slider-one">
                        <?php 
                            $data2 = $db->query("SELECT * FROM `banner`");
                            while($value2 = $data2->fetch_object()){
                        ?>
                        <div class="single-slide" style="background-image: url(admin/pages/<?=$value2->img1;?>)">
                            <!-- Hero Content One Start -->
                            <div class="hero-content-one container">
                                <div class="row">
                                    <div class="col"> 
                                        <div class="slider-text-info text-black">
                                            <h1><?=$value2->head;?></h1>
                                            
                                            <a href="product.php" class="btn slider-btn uppercase"><span><i class="fa fa-plus"></i> Shop Now</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Hero Content One End -->
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Slider end -->
            <?php include 'msg1.php'; ?>
    <div class="slider-bottom-inner">
        <!-- Banner area start -->
        <div class="banner-area ">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="banner-area-inner-tp">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <!-- single-banner start -->
                                    <div class="single-banner mt--30">
                                        <a href="product.php"><img src="assets/images/banner/1.jpg" alt=""></a>
                                    </div>
                                    <!-- single-banner end -->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!-- single-banner start -->
                                    <div class="single-banner mt--30">
                                        <a href="product.php"><img src="assets/images/banner/2.jpg" alt=""></a>
                                    </div>
                                    <!-- single-banner end -->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!-- single-banner start -->
                                    <div class="single-banner mt--30">
                                        <a href="product.php"><img src="assets/images/banner/3.jpg" alt=""></a>
                                    </div>
                                    <!-- single-banner end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner area end -->
    </div>
    
    <!-- Our Services Area Start -->
    <div class="our-services-area pt--60 pb--30">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <!-- single-service-item start -->
                    <div class="single-service-item">
                        <div class="our-service-icon">
                            <i class="fa fa-truck"></i>
                        </div>
                        <div class="our-service-info">
                            <h3>Free Shipping</h3>
                            <p>Free shipping on all US order or order above Rs 200</p>
                        </div>
                    </div>
                    <!-- single-service-item end -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- single-service-item start -->
                    <div class="single-service-item">
                        <div class="our-service-icon">
                            <i class="fa fa-support"></i>
                        </div>
                        <div class="our-service-info">
                            <h3>Support 24/7</h3>
                            <p>Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                    <!-- single-service-item end -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- single-service-item start -->
                    <div class="single-service-item">
                        <div class="our-service-icon">
                            <i class="fa fa-undo"></i>
                        </div>
                        <div class="our-service-info">
                            <h3>30 Days Return</h3>
                            <p>Simply return it within 30 days for an exchange</p>
                        </div>
                    </div>
                    <!-- single-service-item end -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- single-service-item start -->
                    <div class="single-service-item">
                        <div class="our-service-icon">
                            <i class="fa fa-credit-card"></i>
                        </div>
                        <div class="our-service-info">
                            <h3>100% Payment Secure</h3>
                            <p>We ensure secure payment with PEV</p>
                        </div>
                    </div>
                    <!-- single-service-item end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services Area End -->
    
    <!-- Product Area Start -->
    <div class="product-area pb--30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- section-title start -->
                    <div class="section-title-two pt--60 border-t-one text-center">
                        <h2>Popular Category</h2>
                        <p>Most Trendy <?php echo date('Y'); ?> Clother</p>
                    </div>
                    <!-- section-title end -->
                </div>
            </div>
            <!-- product-wrapper start -->
            <div class="product-wrapper-tab-panel">
                <!-- tab-contnt start -->
                <div class="tab-content">
                    <div class="tab-pane active" id="arrival">
                        <div class="row product-slider">
                            <?php 
                                $data3 = $db->query("SELECT * FROM `category`");
                                while($value3 = $data3->fetch_object()){
                             ?>
                            <div class="col-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="product.php?c_id=<?=$value3->c_id;?>"><img src="admin/pages/<?=$value3->img1;?>" alt=""></a>                               
                                    </div>
                                    
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                            <?php } ?>

                        </div>
                    </div>





                </div>
                <!-- tab-contnt end -->
            </div>
            <!-- product-wrapper end -->
        </div>
    </div>
    <!-- Product Area End -->
    
    <!-- Banner area start -->
    <div class="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <!-- single-banner start -->
                    <div class="single-banner mt--30">
                        <a href="product.php"><img src="assets/images/banner/bg4.jpg" alt=""></a>
                    </div>
                    <!-- single-banner end -->
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- single-banner start -->
                    <div class="single-banner mt--30">
                        <a href="product.php"><img src="assets/images/banner/bg11.jpg" alt=""></a>
                    </div>
                    <!-- single-banner end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Banner area end -->
    
    <!-- category-container-slider Start -->
    <div class="category-container-slider">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- section-title start -->
                    <div class="section-title-two pt--60 border-t-one text-center">
                        <h2>Popular Products</h2>
                        <p>Most Trendy <?php echo date('Y'); ?> Clother</p>
                    </div>
                    <!-- section-title end -->
                </div>
            </div>       

                            <div class="row">

                <div class="col-lg-12">

                    <!-- category-main-container start -->
                    <div class="category-main-container">
                        <!-- product-three-area start -->
                        <div class="product-three-area pt--60">
                     
<!-- product-wrapper-four start -->
    <div class="product-wrapper-four">
        <div class="tab-content">
            <div class="tab-pane active anime-tab" id="earrings">
                <div class="row product-slider-show-3">
                    <?php 
                        $data4 = $db->query("SELECT * FROM `product`");
                        while($value4 = $data4->fetch_object()){
                    ?>
                    <div class="col-12">
                        <!-- single-product-wrap start -->
                        <div class="single-product-wrap">
                            <div class="product-image">
                                <?php
                                    $p_id = $value4->p_id;
                                    $data5 = $db->query("SELECT * FROM `proimage` WHERE p_id = '$p_id'");
                                    $value5 = $data5->fetch_object();
                                ?>
                                <a href="product-single.php?name=<?=$value4->name;?>"><img src="admin/pages/<?=$value5->img1;?>" alt=""></a>
                                <!-- <span class="label-product label-new">new</span>
                                <span class="label-product label-sale">-9%</span> -->
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-single.php?name=<?=$value4->name;?>"><?=$value4->name;?></a></h3>
                                <div class="price-box">
                                    <span class="new-price">Rs <?=$value4->sprice;?></span>
                                    <span class="old-price">Rs <?=$value4->mprice;?></span>
                                </div>
                            <div class="product-action">
<!--                                 <form action="action/addtocart.php" method="post">
                                    <input type="hidden" name="p_id" value="<?=$value4->p_id;?>">
                                    <input type="hidden" name="qty" value="1">
                                    <input type="hidden" name="name" value="<?=$value4->name;?>">
                                    <input type="hidden" name="price" value="<?=$value4->sprice;?>">
                                    <input type="hidden" name="img1" value="<?=$value5->img1;?>">
                                    <input type="hidden" name="u_id" value="<?=$u_id;?>">
                                    <input type="hidden" name="url" value="<?=$finalurl;?>">
                                    <button class="add-to-cart" name="submit" value="submit" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>                                
                                </form> -->
<a href="product-single.php?name=<?=$value4->name;?>"><button class="add-to-cart" name="submit" value="submit" title="Add to cart"><i class="fa fa-plus"></i> View Product</button>  </a>                               
                              </div>
                           </div>
                        </div>
                    <!-- single-product-wrap end -->

                </div>

            <?php } ?>
  </div>
</div>


            </div>
         </div>
        <!-- product-wrapper-four end -->
    </div>
    <!-- product-three-area end -->

                    </div>
                    <!-- category-main-container end -->
                </div>
            </div>
        </div>
    </div>
    <!-- category-container-slider Start -->
    
    <!-- Our Brand Area Start -->
    <div class="our-brand-area pb--60">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="pt--60 border-t-one"></div>
                    <div class="row our-brand-active text-center">
                        <?php 
                            $data7 = $db->query("SELECT * FROM `partner`");
                            while($value7 = $data7->fetch_object()){
                        ?>
                        <div class="col-12">
                            <div class="single-brand">
                                <a href="#"><img src="admin/pages/<?=$value7->img1;?>" alt=""></a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Brand Area End -->
    
    <!-- Client Testimonials Area Start -->
    <div class="client-testimonials-area testimonials-bg section-ptb">
        <div class="container">
           <div class="row">
                <div class="col-lg-12">
                    <!-- section-title start -->
                    <div class="section-title section-bg-2">
                        <h2>Client Testimonials</h2>
                        <p>What they say</p>
                    </div>
                    <!-- section-title end -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 ml-auto mr-auto">
                    <div class="testimonial-slider">
                        <!-- testimonial-content start -->
                        <?php 
                            $data6 = $db->query("SELECT * FROM `testimonial`");
                            while($value6 = $data6->fetch_object()){
                         ?>
                        <div class="testimonial-content text-center">
                            <p class="des_testimonial"><?=$value6->para;?></p>
                            <div class="content_author">
                                <div class="author-image">
                                    <img src="admin/pages/<?=$value6->img1;?>" alt="">
                                </div>
                            </div>
                            <p class="des_namepost"><?=$value6->name;?></p>
                        </div>
                        <!-- testimonial-content end -->
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Client Testimonials Area End -->
    
<?php include 'footer.php'; ?>