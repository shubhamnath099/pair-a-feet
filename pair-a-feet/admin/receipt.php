<?php
session_start();
require_once 'config/config.php';
require_once 'config/helper.php';
require_once 'config/auth_helper.php';
$a_idchk = $_SESSION[ 'a_id' ];
ob_start( "ob_html_compress" );
include_once 'header.php';

?>
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-header-title">
                                    <h4 class="pull-left page-title">Sale Items</h4>
                                    <ol class="breadcrumb pull-right">
                                       
                                        <li class="active">Dashboard</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
<?php 
$s_id = $_REQUEST['s_id'];
$data1= $db->query("SELECT * FROM `sale` WHERE s_id = '$s_id'");
$value1 = $data1->fetch_object();

 ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="invoice-title">
                                                    <h4 class="pull-right">Invoice No #<?=$value1->bilno;?></h4>
                                                    <img src="logo2.png" alt="logo" height="36" />
                                                </div>
                                                <hr />
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <address style="text-transform: capitalize;">
                                                            <strong>Billed To:</strong><br />
                                                            Name  : <?=$value1->name;?><br />
                                                           Email : <?=$value1->email;?><br />
                                                           Mobile No :<?=$value1->mobile;?><br />
                                                           Address : <?=$value1->address;?><br />
                                                          
                                                        </address>
                                                    </div>
                                                    <div class="col-xs-6 text-right">
                                                        <address>
                                                            <strong>Purchase From:</strong><br />
                                                            Reshmi Electronic<br />
                                                            Shop No 1<br />
                                                            Ansari Market , Sorda<br />
                                                            +91-9937550443 <br>
                                                            rahmat.ansari.sorda@gmail.com
                                                        </address>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <address>
                                                            <strong>Payment Method:</strong><br />
                                                            Cash<br />
                                                        </address>
                                                    </div>
                                                    <div class="col-xs-6 text-right">
                                                        <address>
                                                            <strong>Order Date:</strong><br />
                                                          <?=$value1->bildate;?><br />
                                                            <br />
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title"><strong>Order summary</strong></h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <td><strong>Item</strong></td>
                                                                        <td class="text-center"><strong>Price</strong></td>
                                                                        <td class="text-center"><strong>Quantity</strong></td>
                                                                        <td class="text-right"><strong>Totals</strong></td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>                                                    
                                                            <?php 
                                                                $p_id = $value1->product;
                                                                $data2 = $db->query("SELECT * FROM `product` WHERE p_id = '$p_id'");
                                                                $value2 = $data2->fetch_object();
                                                                $name = $value2->name;
                                                                echo $name;
                                                             ?></td>
                                                                        <td class="text-center">Rs <?=$value1->price;?></td>
                                                                        <td class="text-center"><?=$value1->quntity;?></td>
                                                                        <td class="text-right"><?=$value1->total;?></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line text-center"><strong>Total</strong></td>
                                                                        <td class="no-line text-right"><h4 class="m-0">Rs <?=$value1->total;?></h4></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="hidden-print">
                                                            <div class="pull-right">
                                                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                                <a href="#" class="btn btn-primary waves-effect waves-light">Send</a>
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
            </div>

<?php include 'footer.php'; ?>