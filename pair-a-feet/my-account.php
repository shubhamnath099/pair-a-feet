<?php include 'header.php';?> 
<?php 
    $u_id = $_SESSION['u_id'];
    $data = $db->query("SELECT * FROM `user` WHERE u_id = '$u_id'");
    $value = $data->fetch_object();

 ?>

<?php 
    $u_id = $_SESSION['u_id'];
    echo $u_id;
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
                        <li class="breadcrumb-item active">My Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    
    
    <!-- content-wraper start -->
    <div class="content-wraper mb--100">
        <div class="container">
            <?php include 'msg.php'; ?>
            <div class="row">
                <div class="col-12">
                    <div class="account-dashboard">
                        <div class="dashboard-upper-info">
                           <div class="row align-items-center no-gutters">
                               <div class="col-lg-3 col-md-12">
                                   <div class="d-single-info">
                                       <p class="user-name">Hello <span><?=$value->name;?></span></p>
                                       <p>(not <?=$value->mobile;?>? <a href="action/register.php?submit=logout">Log Out</a>)</p>
                                   </div>
                               </div>
                               <div class="col-lg-4 col-md-12">
                                   <div class="d-single-info">
                                       <p>Need Assistance? Customer service at.</p>
                                       <p>admin@devitems.com.</p>
                                   </div>
                               </div>
                               <div class="col-lg-3 col-md-12">
                                   <div class="d-single-info">
                                       <p>E-mail them at </p>
                                       <p>support@yoursite.com</p>
                                   </div>
                               </div>
                               <div class="col-lg-2 col-md-12">
                                   <div class="d-single-info text-lg-center">
                                       <a href="cart.php" class="view-cart"><i class="fa fa-cart-plus"></i>view cart</a>
                                   </div>
                               </div>
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-2">
                                <!-- Nav tabs -->
                                <ul role="tablist" class="nav flex-column dashboard-list">
                                    <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Dashboard</a></li>
                                    <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                                    <li><a href="#address" data-toggle="tab" class="nav-link">Addresses</a></li>
                                    <li><a href="#account-details" data-toggle="tab" class="nav-link">Account details</a></li>
                                    <li><a href="action/register.php?submit=logout" class="nav-link">logout</a></li>
                                </ul>
                            </div>
                            <div class="col-md-12 col-lg-10">
                                <!-- Tab panes -->
                                <div class="tab-content dashboard-content">
                                    <div class="tab-pane active" id="dashboard">
                                        <h3>Dashboard </h3>
                                        <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                    </div>
                                    <div class="tab-pane fade" id="orders">
                                        <h3>Orders</h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>	 	 	 	
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $sl = 0;
                                                        $data1 = $db->query("SELECT * FROM `order_details` where u_id = '$u_id'");
                                                        while($value1 = $data1->fetch_object()){
                                                            $sl++;
                                                     ?>
                                                    <tr>
                                                        <td><?=$sl;?></td>
                                                        <td><?=$value1->date;?></td>
                                                        <td><?php
                                                            $sts =  $value1->sts;
                                                            if ($sts == 1) {
                                                                echo "Processing";
                                                            }elseif ($sts == 2) {
                                                                echo "Order Receiveed";
                                                            }elseif ($sts == 3) {
                                                                echo "Shipped";
                                                            }elseif($sts == 4){
                                                                echo "Sorry Product Out of Stock";
                                                            }else{
                                                                echo "Delivered";
                                                            }
                                                         ?></td>
                                                        <td><?=$value1->total;?></td>
                                                        <td><a href="#" class="view">view</a></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="address">
                                       <p>The following addresses will be used on the checkout page by default.</p>
                                        <h4 class="billing-address">Billing address</h4>
                                        <a href="#" class="view">edit</a>
                                        <p class="biller-name">Johan Don</p>
                                        <p>Bangladesh</p>   
                                    </div>
                                    <div class="tab-pane fade" id="account-details">
                                        <h3>Account details </h3>
                                        <div class="login">
                                            <div class="login-form-container">
                                                <div class="account-login-form">
                                                    <form action="#">
                                                        <p>Already have an account? <a href="#">Log in instead!</a></p>
                                                        <label>Social title</label>
                                                        <div class="input-radio">
                                                            <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mr.</span>
                                                            <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mrs.</span>
                                                        </div>
                                                        <div class="account-input-box">
                                                            <label>First Name</label>
                                                            <input type="text" name="first-name">
                                                            <label>Last Name</label>
                                                            <input type="text" name="last-name">
                                                            <label>Email</label>
                                                            <input type="text" name="email-name">
                                                            <label>Password</label>
                                                            <input type="password" name="user-password">
                                                            <label>Birthdate</label>
                                                            <input type="text" placeholder="MM/DD/YYYY" value="" name="birthday">
                                                        </div>
                                                        <div class="example">
                                                          (E.g.: 05/31/1970)
                                                        </div>
                                                        <div class="custom-checkbox">
                                                            <input type="checkbox" value="1" name="optin">
                                                            <label>Receive offers from our partners</label>
                                                        </div>
                                                        <div class="custom-checkbox">
                                                            <input type="checkbox" value="1" name="newsletter">
                                                            <label>Sign up for our newsletter<br><em>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</em></label>
                                                        </div>
                                                        <div class="button-box">
                                                            <button class="btn default-btn" type="submit">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
<?php include 'footer.php';?>