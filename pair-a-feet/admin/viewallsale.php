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
                                                        <?php include 'msg.php' ?>
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">All Sale Product</h3></div>
                                    <div class="panel-body">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Action</th>
                                                    <th>Customer Details</th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th>Billing Id</th>
                                                    <th>Print</th>
                                                    <th>Date Of Add</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $sl = 0;
                                                    $data = $db->query("SELECT * FROM `sale` ORDER BY s_id DESC");
                                                    while ($value = $data->fetch_object()) {
                                                        $sl ++;
                                                 ?>
                                                <tr>
                                                    <td><?=$sl;?></td>
                                                    <td>
                                                        <a href="pages/sale.php?s_id=<?=$value->s_id?>&submit=delete" class="btn btn-danger waves-effect waves-light"><i class="ion-trash-a"></i></a>
                                                 
                                                    </td>
                                                    <td>
                                                        <?=$value->name;?><br>
                                                        <?=$value->mobile;?><br>
                                                        <?=$value->email;?><br>
                                                        <?=$value->address;?><br>
                                                    </td>
                                                    <td>
                                                    
                                                            <?php 
                                                                $p_id = $value->product;
                                                                $data2 = $db->query("SELECT * FROM `product` WHERE p_id = '$p_id'");
                                                                $value2 = $data2->fetch_object();
                                                                $name = $value2->name;
                                                                echo $name;
                                                             ?>

                                                    </td>

                                                    <td><?=$value->quntity;?></td>
                                                    <td><?=$value->total;?></td>
                                                    <td><?=$value->bilno;?></td>
                               
              


                                             
                                                
                                                        
                                            <td>
                                                
                                                    <a  style="font-size: 20px;" href="receipt.php?s_id=<?=$value->s_id;?>" class="" title="click to Enable"> <i class="mdi mdi-printer-alert"></i></a>
                                          
                                            </td>

                                                  
                                                    <td><?=$value->date;?></td>
      
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>                            
                            </div>



                    </div>
                </div>
            </div>






<?php include 'footer.php'; ?>