<?php include 'header.php';?>
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
                        <li class="breadcrumb-item active">Product</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    
    
    <!-- content-wraper start -->
    <div class="content-wraper mb--100">
        <div class="container">
            <?php include 'msg1.php'; ?>
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <!--sidebar-categores-box start  -->
                    <div class="sidebar-categores-box">
                        <div class="sidebar-title">
                            <h2>Top Category</h2>
                        </div>
                        <!-- category-sub-menu start -->
                        <div class="category-sub-menu">
                            <ul>
                                <?php
                                    $data1 = $db->query("SELECT * FROM `category`");
                                    while($value1 = $data1->fetch_object()){
                                ?>
                                <li class="has-sub"><a href="product.php?c_id=<?=$value1->c_id;?> "><?=$value1->c_name;?></a>
                                    <ul>
                                <li><a href="product.php?c_id=<?=$value1->c_id;?> "><?=$value1->c_name;?></a>
                                    <?php 
                                        $c_id = $value1->c_id;
                                        $data2 = $db->query("SELECT * FROM `subcategory` WHERE c_id = '$c_id'");
                                        while($value2 = $data2->fetch_object()){
                                     ?>                                        
                                     <li><a href="product.php?sc_id=<?=$value2->sc_id;?>"><?=$value2->sc_name;?></a></li>
                                    <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>
                        <!-- category-sub-menu end -->
                    </div>
                    <!--sidebar-categores-box end  -->
                    <!--sidebar-categores-box start  -->
                    <!--sidebar-categores-box end  -->

                    <!-- shop-banner start -->

                    <!-- shop-banner end -->
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <!-- shop-top-bar start -->
                    <div class="shop-top-bar mt-95">
                        <div class="shop-bar-inner">
                            <div class="product-view-mode">
                                <!-- shop-item-filter-list start -->
                                <ul class="nav shop-item-filter-list" role="tablist">
                                    <li class="active"><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                    <li><a data-toggle="tab"  href="#list-view"><i class="fa fa-th-list"></i></a></li>
                                </ul>
                                <!-- shop-item-filter-list end -->
                            </div>
                   <!--          <div class="toolbar-amount">
                                <span>Showing 1 to 9 of 15</span>
                            </div> -->
                        </div>
                        <!-- product-select-box start -->
<!--                         <div class="product-select-box">
                            <div class="product-short">
                                <p>Sort By:</p>
                                <select class="nice-select">
                                    <option value="trending">Relevance</option>
                                    <option value="sales">Name (A - Z)</option>
                                    <option value="sales">Name (Z - A)</option>
                                    <option value="rating">Price (Low &gt; High)</option>
                                    <option value="date">Rating (Lowest)</option>
                                    <option value="price-asc">Model (A - Z)</option>
                                    <option value="price-asc">Model (Z - A)</option>
                                </select>
                            </div>
                        </div> -->
                        <!-- product-select-box end -->
                    </div>
                    <!-- shop-top-bar end -->
                    
                    <!-- shop-products-wrapper start -->
                    <div class="shop-products-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane active">
                                <div class="shop-product-area">
                                    <div class="row">

                                        <?php 
                                            if ($_REQUEST['c_id']) {
                                                $c_id = $_REQUEST['c_id'];
                                                $data3 = $db->query("SELECT * FROM `product` WHERE c_id = '$c_id'");
                                            }elseif ($_REQUEST['sc_id']) {
                                                    $sc_id = $_REQUEST['sc_id'];
                                                    $data3 = $db->query("SELECT * FROM `product` WHERE sc_id = '$sc_id'");
                                            }else {
                                                    $data3 = $db->query("SELECT * FROM `product`");
                                                }
                                            while($value3 = $data3->fetch_object()){
                                         ?>


                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="product-single.php?name=<?=$value3->name;?>">
                                                        <?php 
                                                            $p_id = $value3->p_id;
                                                            $data4 = $db->query("SELECT * FROM `proimage` WHERE p_id = '$p_id'");
                                                            $value4 = $data4->fetch_object();
                                                         ?>
                                                        <img src="admin/pages/<?=$value4->img1;?>" alt="">
                                                    </a>
                                                    <span class="label-product label-new">new</span>
                                                    <div class="quick_view">
                                                        <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="product-single.php?name=<?=$value3->name;?>"><?=$value3->name;?></a></h3>
                                                    <div class="price-box">
                                                        <span class="new-price"><?=$value3->sprice;?></span>
                                                        <span class="old-price"><?=$value3->mprice;?></span>
                                                    </div>
                                                    <div class="product-action">
<!--                                 <form action="action/addtocart.php" method="post">
                                    <input type="hidden" name="p_id" value="<?=$value3->p_id;?>">
                                    <input type="hidden" name="qty" value="1">
                                    <input type="hidden" name="name" value="<?=$value3->name;?>">
                                    <input type="hidden" name="price" value="<?=$value3->sprice;?>">
                                    <input type="hidden" name="img1" value="<?=$value3->img1;?>">
                                    <input type="hidden" name="u_id" value="<?=$u_id;?>">
                                    <input type="hidden" name="url" value="<?=$finalurl;?>">
                                    <button class="add-to-cart" name="submit" value="submit" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>                                
                                </form> -->
                                             <a href="product-single.php?name=<?=$value3->name;?>"><button class="add-to-cart" name="submit" value="submit" title="Add to cart"><i class="fa fa-plus"></i> View Product</button>  </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                       <?php } ?>

                                      
                                    </div>
                                </div>
                            </div>
                            <div id="list-view" class="tab-pane">
                                <div class="row">
                                    <div class="col">

                                    <?php 
                                        if ($_REQUEST['c_id']) {
                                            $c_id = $_REQUEST['c_id'];
                                            $data6 = $db->query("SELECT * FROM `product` WHERE c_id = '$c_id'");
                                        }elseif ($_REQUEST['sc_id']) {
                                            $data6 = $db->query("SELECT * FROM `product` WHERE sc_id = '$sc_id'");
                                        }else{
                                            $data6 = $db->query("SELECT * FROM `product`");
                                        }
                                        while($value6 = $data6->fetch_object()){
                                    ?>

                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-5">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="product-single.php?name=<?=$value6->name;?>">
                                                        <?php 
                                                            $p_id = $value6->p_id;
                                                            $data4 = $db->query("SELECT * FROM `proimage` WHERE p_id = '$p_id'");
                                                            $value4 = $data4->fetch_object();
                                                         ?>                                                            
                                                         <img src="admin/pages/<?=$value4->img1;?>" alt="">
                                                        </a>
                                                        <span class="label-product label-new">new</span>
                                                        <div class="quick_view">
                                                            <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                            <div class="col-lg-8 col-md-7">
                                                <div class="product_desc">
                                                    <!-- single-product-wrap start -->
                                                    <div class="product-content-list">
                                                        <h3><a href="product-single.php?name=<?=$value6->name;?>"><?=$value6->name;?></a></h3>
                                                       
                                                        <div class="price-box">
                                                            <span class="new-price">Rs <?=$value6->sprice;?></span>
                                                            <span class="old-price">Rs <?=$value6->mprice;?></span>
                                                        </div>
                                                           <a href="product-single.php?name=<?=$value6->name;?>"><button class="add-to-cart" name="submit" value="submit" title="Add to cart"><i class="fa fa-plus"></i> View Product</button>  </a>
                                                        <p><?=$value6->sdesc;?></p>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>



                                    </div>
                                </div>
                            </div>
                            <!-- paginatoin-area start -->
            <!--                 <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <p>Showing 1-12 of 13 item(s)</p>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul class="pagination-box">
                                            <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                                            </li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li>
                                              <a href="#" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                            <!-- paginatoin-area end -->
                        </div>
                    </div>
                    <!-- shop-products-wrapper end -->
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
    
  

<?php include 'footer.php';?>