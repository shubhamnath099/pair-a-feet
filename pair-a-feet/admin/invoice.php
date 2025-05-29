<?php
session_start();
require_once 'config/config.php';
require_once 'config/helper.php';
require_once 'config/auth_helper.php';
$a_idchk = $_SESSION[ 'a_id' ];
ob_start( "ob_html_compress" );
include_once 'header.php';
?>
<?php 
    $od_id = $_REQUEST['od_id'];
    $data = $db->query("SELECT * FROM `order_details` WHERE od_id = '$od_id'");
    $value = $data->fetch_object();


 ?>
<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
@media print {
    a[href]:after {
        content: none !important;
    }
}
</style>
<div class="content-page">
 <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-header-title">
                                    <h4 class="pull-left page-title">Invoice</h4>
                                    <ol class="breadcrumb pull-right">
                                        <li><a href="#">Eateriz</a></li>
                                        <li class="active">Invoice</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="invoice-title">
                                                    <h4 class="pull-right">Order # <?=$value->order_id;?></h4>
                                                    <img src="logo.jpg" alt="logo"  width="200"  />
                                                </div>
                                                <hr />
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <address>
                                                            <strong>Billed To:</strong><br />
                                                            John Smith<br />
                                                            1234 Main<br />
                                                            Apt. 4B<br />
                                                            Springfield, ST 54321
                                                        </address>
                                                    </div>
                                                    <div class="col-xs-6 text-right">
                                                        <address>
                                                            <strong>Shipped To:</strong><br />
                                                           <?=$value->name?><br />
                                                           <?=$value->email?><br />
                                                           <?=$value->mobile;?><br />
                                                            <?=$value->address?>,<?=$value->city?><br />

                                                            <?=$value->state?>-<?=$value->zip?><br />
                                                          
                                                          
                                                        </address>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <address>
                                                            <strong>Payment Method:</strong><br />
                                                            <?php 
                                                                $sts = $value->sts;
                                                                if($sts == 1){
                                                                    echo "Cash On Delivery";
                                                                }else{
                                                                    echo "Online Payment ";
                                                                }
                                                             ?>
                                                           
                                                        </address>
                                                    </div>
                                                    <div class="col-xs-6 text-right">
                                                        <address>
                                                            <strong>Order Date:</strong><br />
                                                            <?=$value->date;?>
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
                                                                    <?php 
                                                                        $od_id = $_REQUEST['od_id'];
                                                                        $data1 = $db->query("SELECT * FROM `order_data` WHERE od_id = '$od_id'");
                                                                        while($value1 = $data1->fetch_object()){
                                                                     ?>
                                                                     <?php 
                                                                        $ct_id = $value1->ct_id;
                                                                        $data2 = $db->query("SELECT * FROM `cart` WHERE ct_id = '$ct_id'");
                                                                        while($value2 = $data2->fetch_object()){
                                                                            $subtotal += $value2->total;
                                                                      ?>
                                                                    <tr>
                                                                        <td><?=$value2->name;?></td>
                                                                        <td class="text-center">Rs <?=number_format($value2->price, 2, '.', ','); ?></td>
                                                                        <td class="text-center"><?=$value2->qty;?></td>
                                                                        <td class="text-right">Rs <?=number_format($value2->total, 2, '.', ','); ?></td>
                                                                    </tr> 
                                                                    <?php }} ?>
                                                                    <tr>
                                                                        <td class="thick-line"></td>
                                                                        <td class="thick-line"></td>
                                                                        <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                                                        <td class="thick-line text-right">Rs <?=number_format($subtotal, 2, '.', ','); ?></td>
                                                                    </tr>
<!--                                                                     <tr>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line text-center"><strong>Shipping</strong></td>
                                                                        <td class="no-line text-right">$15</td>
                                                                    </tr> -->
                                                                    <tr>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line text-center"><strong>Total</strong></td>
                                                                        <td class="no-line text-right"><h4 class="m-0">Rs <?=number_format($subtotal, 2, '.', ','); ?></h4></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="hidden-print">
                                                            <div class="pull-right">
                                                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                                
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