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
                        <h4 class="pull-left page-title">View Order</h4>
                            <ol class="breadcrumb pull-right">
                                <li><a href="dashboard">Dashboard</a></li>
                               
                                <li class="active">Order</li>
                            </ol>
                               <div class="clearfix"></div>
                    </div>
                </div>
            </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">View Order</h3></div>
                                    <div class="panel-body">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>View Details  & Print</th>
                                                    <th>User Details</th>
                                                    <th>Order Details</th>
                                                     <th>Address</th>
                                                     <th>Order Ids</th>
    
                                                    <th>Total Bill</th>
                                                    <th>Order Status</th>
                                                   
                                                    <th>Order Date</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $sl = 0;
                                                    $data = $db->query("SELECT * FROM `order_details` ORDER BY od_id DESC");
                                                    while ($value = $data->fetch_object()) {
                                                        $sl ++;
                                                 ?>
                                                <tr>
                                                    <td><?=$sl;?></td>
                                                    <td>
                                                        <a href="invoice.php?od_id=<?=$value->od_id;?>" target="_blank" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                    </td>

                                                    <td>

                                                        <?php 
                                                            $u_id = $value->u_id;;
                                                            if($u_id == 0){
                                                                echo "Guest Checkout";
                                                            }else{
                                                            $data2 = $db->query("SELECT * FROM `user` WHERE u_id = '$u_id'");
                                                            $value2 = $data2->fetch_object();
                                                         ?>
                                                       <?=$value2->name;?> <br>
                                                        <?=$value2->email;?> <br>
                                                        <?=$value2->mobile;?>
                                                    <?php } ?>
                                                    </td>
                               

                                                    <td>
                                                       <?=$value->name;?> <br>
                                                      <?=$value->email;?> <br>
                                                        <?=$value->mobile;?>
                                                    </td>
                                                  
                                                    <td><?=$value->adtype;?> <br>
                                                        <?=$value->address;?>,<?=$value->city;?>,<?=$value->state;?>,<?=$value->zip;?></td>
                                                        

                                                  
                                                    <td><?=$value->order_id;?></td>
                                                    <td>Rs <?php echo number_format($value->total , 2);?></td>

                                                    <td>
                                                        <p class="bg-primary text-center"><?php 
                                                            $sts = $value->sts;
                                                            if ($sts == 1) {
                                                              echo "Placed";
                                                            }elseif ($sts == 2) {
                                                                echo "Packed";
                                                            }elseif ($sts == 3) {
                                                                echo "On the way";
                                                            }elseif($sts == 4) {
                                                                echo "Delivered";
                                                            }else{
                                                                echo "Order Cancel";
                                                            }
                                                        ?></p>
                                                        <form action="pages/ordersts.php" method="POST">
                                                            <?php 
                                                                $od_id = $value->od_id;
                                                                $data3 = $db->query("SELECT * FROM `od_sts` WHERE od_id = '$od_id'");
                                                                $value3 = $data3->fetch_object();

                                                            ?>
                                                            <input type="hidden" name="ods_id" value="<?=$value3->ods_id;?>">
                                                            <input type="hidden" name="od_id" value="<?=$value->od_id;?>">
                                                            <select name="sts" id="" class="form-control">
                                                            <option value="1">Placed</option>
                                                            <option value="2">Packed</option>
                                                            <option value="3">On the Way</option>
                                                            <option value="4">Order Cancel</option>
                                                            </select>
                                                            <button name="submit" value="submit" class="btn btn-success">Update</button>
                                                        </form>
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
</div>




  <script>
            CKEDITOR.replace( 'descr' ,{ 
            height: 300,
            filebrowserUploadUrl :"upload.php" 
            });
    </script>

<?php include 'footer.php'; ?>