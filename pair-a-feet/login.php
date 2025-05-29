<?php include 'header.php';?>

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Login Register</li>
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
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <?php include 'msg.php'; ?>
                    <div class="login-register-wrapper">
                        <!-- login-register-tab-list start -->
                        <div class="login-register-tab-list nav">
                            <a class="active" data-toggle="tab" href="#lg1">
                                <h4> login </h4>
                            </a>
                            <a data-toggle="tab" href="#lg2">
                                <h4> register </h4>
                            </a>
                        </div>
                        <!-- login-register-tab-list end -->
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="action/register.php" method="post">
                                            <div class="login-input-box">
                                                <input type="text" name="mobile" placeholder="mobile number">
                                                <input type="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox">
                                                    <label>Remember me</label>
                                                    <a href="#">Forgot Password?</a>
                                                </div>
                                                <div class="button-box">
                                                    <button class="login-btn btn" name="submit" value="login" type="submit"><span>Login</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="lg2" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="action/register.php" method="post" enctype="multipart/form-data">
                                            <div class="login-input-box">
                                                <input type="text" name="name" placeholder=" Name">
                                                <input name="email" placeholder="Email" type="email">
                                                <input name="mobile" placeholder="mobile" type="number">
                                                <input type="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="button-box">
                                                <button class="register-btn btn" name="submit" value="submit" type="submit"><span>Register</span></button>
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
    <!-- content-wraper end -->
<?php include 'footer.php';?>