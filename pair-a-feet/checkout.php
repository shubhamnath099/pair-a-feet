<?php include 'header.php'; ?>

<?php 
    $u_id = $_SESSION['u_id'];
    if ($u_id  == '') {
          echo '<script>window.location.href = "login.php";
</script>';
    }else{
       

    }

 ?>


<!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Checkout Page</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    
                            <form action="action/checkout.php" method="post">
    <!-- content-wraper start -->
    <div class="content-wraper mb--100">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="coupon-area">
                        <!-- coupon-accordion start -->
  
                        <!-- coupon-accordion end -->
                        <!-- coupon-accordion start -->

                        <!-- coupon-accordion end -->
                    </div>
                </div>
            </div>
            <!-- checkout-details-wrapper start -->
            <div class="checkout-details-wrapper">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <!-- billing-details-wrap start -->
                        <div class="billing-details-wrap">
                                <h3 class="shoping-checkboxt-title">Billing Details</h3>
                                <div class="row">
                                    <input type="hidden" name="u_id" value="<?=$u_id;?>">
                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>First name <span class="required">*</span></label>
                                            <input type="text" name="name" placeholder="Name">
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="single-form-row">
                                            <label> email <span class="required">*</span></label>
                                            <input type="email" name="email" placeholder="email">
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="single-form-row">
                                            <label>Phone <span class="required">*</span></label>
                                            <input type="text" name="mobile" required="" placeholder="mobile no">
                                        </p>
                                    </div>


                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Company name</label>
                                            <input type="text" name="cmpny">
                                        </p>
                                    </div>

                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Street address <span class="required">*</span></label>
                                            <input type="text" placeholder="House number and street name" name="address" required="">
                                        </p>
                                    </div>
 
                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Town / City <span class="required">*</span></label>
                                            <input type="text" name="city" required="">
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>State / County <span class="required">*</span></label>
                                            <input type="text" name="state" required="">
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Postcode / ZIP <span class="required">*</span></label>
                                            <input type="text" name="zip" required="">
                                        </p>
                                    </div>




                                    <div class="col-lg-12">
                                        <p class="single-form-row m-0">
                                            <label>Order notes</label>
                                            <textarea placeholder="Notes about your order, e.g. special notes for delivery." class="checkout-mess" rows="2" cols="5"></textarea>
                                        </p>
                                    </div>
                                </div>
                        </div>
                        <!-- billing-details-wrap end -->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!-- your-order-wrapper start -->
                        <div class="your-order-wrapper">
                            <h3 class="shoping-checkboxt-title">Your Order</h3>
                            <!-- your-order-wrap start-->
                            <div class="your-order-wrap">
                                <!-- your-order-table start -->
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>							
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $u_id = $_SESSION['u_id'];
                                                $data2 = $db->query("SELECT * FROM `cart` WHERE u_id = '$u_id' AND sts = 0");
                                                while($value2 = $data2->fetch_object()){
                                                    $subtotal += $value2->total;
                                             ?>

                                             <input type="hidden" name="ct_id[]" value="<?=$value2->ct_id;?>">
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                   <?=$value2->name;?> <strong class="product-quantity"> × <?=$value2->qty;?></strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">Rs <?= 
                                                    number_format($value2->total, 2, '.', ','); ?></span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">Rs <?= 
                                                    number_format($subtotal, 2, '.', ','); ?></span></td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>Payment Methord</th>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <input type="radio" name="p_type" value="1" class="radio" required="">
                                                            <label>
                                                               COD (Cash on Delivery) 
                                                            </label>
                                                        </li>
                                                    
                                                        <li></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">Rs <?= 
                                                    number_format($subtotal, 2, '.', ','); ?></span></strong>
                                                </td>
                                                <input type="hidden" name="total" value="<?= 
                                                    number_format($subtotal, 2, '.', ','); ?>">
                                            </tr>								
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- your-order-table end -->
                                
                                <!-- your-order-wrap end -->
                                <div class="payment-method">

                                    <div class="order-button-payment">
                                        <input type="submit" value="Place order" name="submit" />
                                        <input type="hidden" name="submit" value="submit">
                                    </div>
                                </div>
                                <!-- your-order-wrapper start -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
            <!-- checkout-details-wrapper end -->
        </div>
    </div>
    <!-- content-wraper end -->
<?php include 'footer.php'; ?>