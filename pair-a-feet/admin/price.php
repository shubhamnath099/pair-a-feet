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
                        <h4 class="pull-left page-title">Add Price</h4>
                            <ol class="breadcrumb pull-right">
                               	<li><a href="dashboard">Dashboard</a></li>
                               
                                <li class="active">Price</li>
                            </ol>
                               <div class="clearfix"></div>
                    </div>
                </div>
            </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Add Price</h3></div>
                                    <div class="panel-body">
                                            <?php
                                            if (empty($_REQUEST['edit'])) {
                                                $edit_record = '';
                                            } else {
                                                $edit_record = $_REQUEST['edit'];
                                            }
                                            $run = $db->query("SELECT * FROM  `proimage` WHERE pi_id ='$edit_record'");
                                            $row = $run->fetch_object();
                                            ?>


                                        <form role="form" action="pages/addprice.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="category">Select Product</label>
                                                <select name="p_id" class="form-control" id="category">
                                                    <option value="">Select</option>
                                                    <?php 
                                                        $data1 = $db->query("SELECT * FROM `product`");
                                                        while ($value1 = $data1->fetch_object()) {

                                  
                                                     ?>
                                                     <option value="<?=$value1->p_id;?>"><?=$value1->name;;?></option>
                                                 <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="unit">Select Product</label>
                                                <select name="uid" class="form-control" id="unit">
                                                    <option value="">Select</option>
                                                    <?php 
                                                        $data2 = $db->query("SELECT * FROM `unit`");
                                                        while ($value2 = $data2->fetch_object()) {

                                  
                                                     ?>
                                                     <option value="<?=$value2->uid;?>"><?=$value2->name;;?></option>
                                                 <?php } ?>
                                                </select>
                                            </div>                                            


                                            <div class="form-group"><label for="Price">Price </label> <input type="number" class="form-control" id="Price" name="price" placeholder="Price" /></div>
                                           
                                         
                                            

                  <?php if (!empty($_REQUEST['edit'])) { ?>
                  
                        <button type="submit" name="submit" value="update" class="btn btn-dark waves-effect waves-light">Submit</button>

                    <input type="hidden" name="ps_id" value="<?php echo $row->ps_id; ?>">
                     <?php } else { ?>
                        <button type="submit" name="submit" value="submit" class="btn btn-dark waves-effect waves-light">Submit</button>
              
                        <input type="hidden" name="submit" value="submit" />
                 <?php } ?>

                                        </form>
                                    </div>
                                </div>
                                <?php include 'msg.php' ?>
                            </div>
                            <div class="col-md-8">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">View Product Price</h3></div>
                                    <div class="panel-body">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Action</th>
                                                    <th>Product Name</th>
                                                     <th>SIze</th>
    
                                                    <th>Date Of Add</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            	<?php 
                                            		$sl = 0;
                                            		$data = $db->query("SELECT * FROM `price`");
                                            		while ($value = $data->fetch_object()) {
                                            			$sl ++;
                                            	 ?>
                                                <tr>
                                                    <td><?=$sl;?></td>
                                                    <td>
                                                    	<a href="pages/addprice.php?ps_id=<?=$value->ps_id?>&submit=delete" class="btn btn-danger waves-effect waves-light"><i class="ion-trash-a"></i></a>
                                                    	<a href="" class="btn btn-success waves-effect waves-light"><i class="ion-edit"></i></a>
                                                    </td>
                                                    <td>
                                                    
                                                            <?php 
                                                                $p_id = $value->p_id;
                                                                $data3 = $db->query("SELECT * FROM `product` WHERE p_id = '$p_id'");
                                                                $value3 = $data3->fetch_object();
                                                                $name = $value3->name;
                                                                echo $name;
                                                             ?>

                                                        </td>
                               
                                                    <td>
                                                    
                                                            <?php 
                                                                $uid = $value->uid;
                                                                $data4 = $db->query("SELECT * FROM `unit` WHERE uid = '$uid'");
                                                                $value4 = $data4->fetch_object();
                                                                $name = $value4->name;
                                                                echo $name;
                                                             ?>

                                                        </td>

                                                        

                                                    <td><?=$value->price;?></td>
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
            CKEDITOR.replace( 'sc_desc' ,{ 
            height: 300,
            filebrowserUploadUrl :"upload.php" 
            });
    </script>

<?php include 'footer.php'; ?>