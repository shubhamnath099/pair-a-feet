<?php include 'header.php'; ?>
    <?php 
        $name = $_REQUEST['name'];
        $data = $db->query("SELECT * FROM `product` WHERE name = '$name'");
        $value = $data->fetch_object();
    ?>

<?php
$u_id = $_SESSION['u_id'];
 
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$query = $_SERVER['QUERY_STRING'];
$finalurl =  $url;
?>

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item ">Product </li>
                        <li class="breadcrumb-item active"><?=$value->name;?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    
    
    <!-- content-wraper start -->
    <div class="mb--100">
    <div class="content-wraper">
        <div class="container">
            <?php include 'msg1.php'; ?>
            <div class="row single-product-area">
                <div class="col-lg-6 col-md-6">
                   <!-- Product Details Left -->
                    <div class="product-details-left">
                        <div class="product-details-images-2 slider-lg-image-2">
                            <?php 
                                $p_id = $value->p_id;
                                $data1 = $db->query("SELECT * FROM `proimage` WHERE p_id = '$p_id'");
                                while($value1 = $data1->fetch_object()){
                            ?>
                            <div class="lg-image">
                                <a href="admin/pages/<?=$value1->img1;?>" class="img-poppu"><img src="admin/pages/<?=$value1->img1;?>" alt="product image"></a>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="product-details-thumbs-2 slider-thumbs-2">		
                            <?php 
                                $p_id = $value->p_id;
                                $data2 = $db->query("SELECT * FROM `proimage` WHERE p_id = '$p_id'");
                                while($value2 = $data2->fetch_object()){
                            ?>
                            <div class="sm-image"><img src="admin/pages/<?=$value2->img1;?>" alt="product image thumb"></div>
                            <?php } ?>
                            <?php 
                                $p_id = $value->p_id;
                                $data3 = $db->query("SELECT * FROM `proimage` WHERE p_id = '$p_id'");
                              $value3 = $data3->fetch_object();
                            ?>
                        </div>
                    </div>
                    <!--// Product Details Left -->
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="product-details-view-content">
                        <div class="product-info">
                            <h2><?=$value->name;?></h2>
                            <div class="price-box">
                                <span class="old-price">Rs <?=$value->mprice;?></span>
                                <span class="new-price">Rs <?=$value->sprice;?></span>
                            </div>
                           <?=$value->sdesc;?>
                            <form action="action/addtocart.php" method="post" class="cart-quantity">       
                                    <input type="hidden" name="p_id" value="<?=$value->p_id;?>">
                                    <input type="hidden" name="name" value="<?=$value->name;?>">
                                    <input type="hidden" name="img1" value="<?=$value3->img1;?>">
                                    <input type="hidden" name="u_id" value="<?=$u_id;?>">
                                    <input type="hidden" name="url" value="<?=$finalurl;?>">


                            <div class="product-variants">
                                <div class="produt-variants-size">
                                    <label>Size</label>
                                    <select class="form-control-select" name="ps_id" id="byprice" required="required">
                                        <option value="">Select Size</option>
                                      <?php 
                                        $p_id = $value->p_id;
                                        $data4 = $db->query("SELECT * FROM `price` WHERE p_id = '$p_id'");
                                        while($value4 = $data4->fetch_object()){
                                       ?>
                                        <option value="<?=$value4->ps_id;?>" title="M"><?=$value4->name;?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                              
                            </div>
                            <div class="single-add-to-cart">
                                
                                    <div id="aprice">
                                        
                                    </div>
                                    <div class="quantity">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="1" name="qty" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>
                                    <button class="add-to-cart" name="submit" value="submit" type="submit">Add to cart</button>
                               
                            </div>
                             </form>
                            <div class="product-availability">
                              <i class="fa fa-check"></i> In stock
                            </div>
                            <div class="product-social-sharing">
                                <label>Share</label>
                                <ul>
                                    <li><a href="http://www.facebook.com/share.php?u=<?=$finalurl;?>" target="_"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="http://twitter.com/home?status=<?=$finalurl;?>" target="_"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://plus.google.com/share?url=<?=$finalurl;?>" target="_"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-details-tab mt--60">
                        <ul role="tablist" class="mb--50 nav">
                            <li class="active" role="presentation">
                                <a data-toggle="tab" role="tab" href="#description" class="active">Description</a>
                            </li>

                            <li role="presentation">
                                <a data-toggle="tab" role="tab" href="#reviews">Reviews</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="product_details_tab_content tab-content">
                        <!-- Start Single Content -->
                        <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                            <div class="product_description_wrap">
                                <div class="product_desc mb--30">
                                    <h2 class="title_3">Details</h2>
                                    <?=$value4->descr?>
                                </div>
    
                            </div>
                        </div>
                        <!-- End Single Content -->
                        <!-- Start Single Content -->

                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">
                            <div class="review_address_inner">
                                <!-- Start Single Review -->
                                <div class="pro_review">
                                    <div class="review_thumb">
                                        <img alt="review images" src="assets/images/review/1.jpg">
                                    </div>
                                    <div class="review_details">
                                        <div class="review_info">
                                            <h4><a href="#">Gerald Barnes</a></h4>
                                            <ul class="product-rating d-flex">
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                                <li><span class="fa fa-star"></span></li>
                                            </ul>
                                            <div class="rating_send">
                                                <a href="#"><i class="fa fa-reply"></i></a>
                                            </div>
                                        </div>
                                        <div class="review_date">
                                            <span>27 Jun, 2018 at 3:30pm</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                    </div>
                                </div>
                                <!-- End Single Review -->
                                <!-- Start Single Review -->

                                <!-- End Single Review -->
                            </div>
                            <!-- Start RAting Area -->
                            <div class="rating_wrap">
                                <h2 class="rating-title">Write  A review</h2>
                                <h4 class="rating-title-2">Your Rating</h4>
                                <div class="rating_list">
                                    <ul class="product-rating d-flex">
                                        <li><span class="fa fa-star"></span></li>
                                        <li><span class="fa fa-star"></span></li>
                                        <li><span class="fa fa-star"></span></li>
                                        <li><span class="fa fa-star"></span></li>
                                        <li><span class="fa fa-star"></span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End RAting Area -->
                            <div class="comments-area comments-reply-area">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="#" class="comment-form-area">
                                            <div class="comment-input">
                                                <p class="comment-form-author">
                                                    <label>Name <span class="required">*</span></label> 
                                                    <input type="text" required="required" name="Name">
                                                </p>
                                                <p class="comment-form-email">
                                                    <label>Email <span class="required">*</span></label> 
                                                    <input type="text" required="required" name="email">
                                                </p>
                                            </div>
                                            <p class="comment-form-comment">
                                                <label>Comment</label> 
                                                <textarea class="comment-notes" required="required"></textarea>
                                            </p>
                                            <div class="comment-form-submit">
                                                <input type="submit" value="Post Comment" class="comment-submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>                             
                        </div>
                        <!-- End Single Content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
    
    
    <!-- Product Area Start -->
    <div class="product-area section-pt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- section-title start -->
                    <div class="section-title section-bg-2">
                        <h2>Other Products</h2>
                        <p>Most Trendy 2018 Clother</p>
                    </div>
                    <!-- section-title end -->
                </div>
            </div>
            <!-- product-wrapper start -->
            <div class="product-wrapper">
                <div class="row product-slider">
                    <?php 
                        $data5 = $db->query("SELECT * FROM `product`");
                        while($value5 = $data5->fetch_object()){
                    ?>

                    <div class="col-12">
                        <!-- single-product-wrap start -->
                        <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="product-single.php?name=<?=$value5->name;?>">
                                    <?php 
                                        $p_id = $value5->p_id;
                                        $data6 = $db->query("SELECT * FROM `proimage` WHERE p_id = '$p_id'");
                                        $value6 = $data6->fetch_object();
                                     ?>
                                    <img src="admin/pages/<?=$value6->img1;?>" alt="">
                                </a>
                                <span class="label-product label-new">new</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-single.php?name=<?=$value5->name;?>"><?=$value5->name;?></a></h3>
                                <div class="price-box">
                                    <span class="new-price">Rs <?=$value5->sprice;?></span>
                                    <span class="old-price">Rs <?=$value5->mprice;?></span>
                                </div>
                                <div class="product-action">
                                    <a href="product-single.php?name=<?=$value6->name;?>"><button class="add-to-cart" name="submit" value="submit" title="Add to cart"><i class="fa fa-plus"></i> View Product</button>  </a>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-wrap end -->
                    </div>
                <?php } ?>







                </div>
            </div>
            <!-- product-wrapper end -->
        </div>
    </div>
    <!-- Product Area End -->
    </div>
    <style>
.mprice {
    border: none;
    font-size: 20px;
}

</style>
    
<?php include 'footer.php'; ?>

      <script>
    $(document).ready(function(){
    $('#byprice').on('change', function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxDatasd.php',
                data:'ps_id='+countryID,
                success:function(html){
                    $('#aprice').html(html);
                }
            }); 
        }else{
            $('#subcategory').html('<option value="">Select category first</option>');
        }
    });

});
</script>