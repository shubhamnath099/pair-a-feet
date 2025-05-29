<?php include 'header.php'; ?>
<!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    
    
    <!-- content-wraper start -->
    <div class="content-wraper mb--100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#" class="cart-table">
                        <div class="table-content table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="plantmore-product-thumbnail">Images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="plantmore-product-price">Unit Price</th>
                                        <th class="plantmore-product-quantity">Quantity</th>
                                        <th class="plantmore-product-Size">Size</th>
                                        <th class="plantmore-product-subtotal">Total</th>
                                        <th class="plantmore-product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                    <tr>
                                        <td class="plantmore-product-thumbnail"><a href="#"><img width="100px" src="admin/pages/<?=$value->img1;?>" alt=""></a></td>
                                        <td class="plantmore-product-name"><a href="#"><?=$value->name;?></a></td>
                                        <td class="plantmore-product-price"><span class="amount">Rs <?=$value->price;?></span></td>
                                        <td class="plantmore-product-quantity">
                                            <input value="<?=$value->qty;?>" type="number">
                                        </td>
                                        <td class="plantmore-product-Size">
                                            <?=$value->size;?>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">Rs <?=$value->total;?></span></td>
                                        <td class="plantmore-product-remove"><a href="action/addtocart.php?submit=deletecart&ct_id=<?=$value->ct_id;?>"><i class="fa fa-close"></i></a></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="coupon-all">
                                   
                                   <div class="coupon2">
                                        <input class="submit btn" name="update_cart" value="Update cart" type="submit">
                                        <a href="product.php" class="btn continue-btn">Continue Shopping</a>
                                    </div>
                                   
                                    <div class="coupon">
                                        <h3>Coupon</h3>
                                        <p>Enter your coupon code if you have one.</p>
                                        <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                        <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
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
                                    <li>Total <span>Rs <?=$value4->price;?></span></li>
                                    </ul>
                                    <a href="checkout.php" class="proceed-checkout-btn">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
<?php include 'footer.php'; ?>