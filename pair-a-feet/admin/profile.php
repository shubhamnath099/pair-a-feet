<?php
session_start();
require_once 'config/config.php';
require_once 'config/helper.php';
require_once 'config/auth_helper.php';
$a_idchk = $_SESSION[ 'a_id' ];
ob_start( "ob_html_compress" );
include_once 'header.php';
$data = $db->query("SELECT * FROM `admin` WHERE a_id = '$a_idchk'");
$value = $data->fetch_object();
?>
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-header-title">
                                    <h4 class="pull-left page-title">My Profile</h4>
                                    <ol class="breadcrumb pull-right">
                                       
                                        <li class="active">Profile</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

       
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Update My Profile</h3></div>
                                    <div class="panel-body">

                                        

                                        <form role="form" action="pages/updateprofile.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                      
                                        <input type="hidden" value="<?=$value->a_id;?>" name="a_id">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Title"> Name</label> 
                                                <input type="text" class="form-control" id="Product Name" value="<?=$value->a_name;?>" name="a_name" placeholder="Name" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Mobile">Mobile No</label> 
                                                <input type="number" class="form-control" id="price" value="<?=$value->a_phone;?>" name="a_phone" placeholder="Mobile Number" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email">Email Id</label> 
                                                <input type="email" class="form-control" id="email" value="<?=$value->a_email;?>" name="a_email" placeholder="Stock" />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Upload Image">Upload Image <span class="text-danger">1000 * 1000</span></label> 
                                                <input type="file" class="form-control" id="Upload Image" name="img1" placeholder="Upload Image" />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Upload Image">Change Password </label> 
                                                <input type="password" class="form-control" id="Upload Image" value="<?=$value->a_vpwd;?>" name="a_password" placeholder="Password" />
                                            </div>
                                        </div>
                                         
                                            
                <div class="clearfix"></div>

                        <button type="submit" name="submit" value="update" class="btn btn-dark waves-effect waves-light">Update</button>
        
      </div>
                                        </form>
                                    </div>
                                </div>
                                <?php include 'msg.php' ?>
                            </div>
</div>





</div>	
</div>
</div>






<?php include 'footer.php'; ?>