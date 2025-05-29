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
                        <h4 class="pull-left page-title">Add Subcategory</h4>
                            <ol class="breadcrumb pull-right">
                               	<li><a href="dashboard">Dashboard</a></li>
                               
                                <li class="active">Subcategory</li>
                            </ol>
                               <div class="clearfix"></div>
                    </div>
                </div>
            </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Add Subcategory</h3></div>
                                    <div class="panel-body">
                                            <?php
                                            if (empty($_REQUEST['edit'])) {
                                                $edit_record = '';
                                            } else {
                                                $edit_record = $_REQUEST['edit'];
                                            }
                                            $run = $db->query("SELECT * FROM  `subcategory` WHERE sc_id ='$edit_record'");
                                            $row = $run->fetch_object();
                                            ?>


                                        <form role="form" action="pages/addsubcategory.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="category">Select Category</label>
                                                <select name="c_id" class="form-control" id="category">
                                                    <option value="">Select</option>
                                                    <?php 
                                                        $data1 = $db->query("SELECT * FROM `category`");
                                                        while ($value1 = $data1->fetch_object()) {

                                  
                                                     ?>
                                                     <option value="<?=$value1->c_id;?>"><?=$value1->c_name;?></option>
                                                 <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group"><label for="Title">Sub-Category Name</label> <input type="text" class="form-control" id="Product Name" name="sc_name" placeholder="Name" /></div>
                                            <div class="form-group"><label for="Upload Image">Upload Image <span class="text-danger">1000 * 1000</span></label> <input type="file" class="form-control" id="Upload Image" name="img1" placeholder="Upload Image" /></div>
                                            <div class="form-group"><label for="Upload Image">Description</label> <textarea class="wysihtml5 form-control" name="sc_desc" rows="9"></textarea></div>
                                         
                                            

                  <?php if (!empty($_REQUEST['edit'])) { ?>
                  
                        <button type="submit" name="submit" value="update" class="btn btn-dark waves-effect waves-light">Submit</button>

                    <input type="hidden" name="c_id" value="<?php echo $row->c_id; ?>">
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
                                    <div class="panel-heading"><h3 class="panel-title">View Subcategory</h3></div>
                                    <div class="panel-body">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Action</th>
                                                    <th>Category Name</th>
                                                    <th>Sub-Category Name</th>
                                                     <th>Image</th>
    
                                                    <th>Description</th>
                                                   
                                                    <th>Status</th>
                                                    <th>Date Of Add</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            	<?php 
                                            		$sl = 0;
                                            		$data = $db->query("SELECT * FROM `subcategory`");
                                            		while ($value = $data->fetch_object()) {
                                            			$sl ++;
                                            	 ?>
                                                <tr>
                                                    <td><?=$sl;?></td>
                                                    <td>
                                                    	<a href="pages/addsubcategory.php?sc_id=<?=$value->sc_id?>&submit=delete" class="btn btn-danger waves-effect waves-light"><i class="ion-trash-a"></i></a>
                                                    	<a href="" class="btn btn-success waves-effect waves-light"><i class="ion-edit"></i></a>
                                                    </td>
                                                    <td>
                                                    
                                                            <?php 
                                                                $c_id = $value->c_id;
                                                                $data2 = $db->query("SELECT * FROM `category` WHERE c_id = '$c_id'");
                                                                $value2 = $data2->fetch_object();
                                                                $name = $value2->c_name;
                                                                echo $name;
                                                             ?>

                                                        </td>
                                                    <td><?=$value->sc_name;?></td>
                               
              
                                                    <td>
                                                	<?php                                                   
                                                	if (!empty($value->img1)) {
                                                        ?>
                                                        <img src ="pages/<?= $value->img1; ?>"  class="img-responsive" />
                                                    <?php
                                                    } else {
                                                        echo '<img src ="https://www.pscpower.com/wp-content/plugins/blog-designer-pro/images/related_post_no_available_image.png"  class="img-responsive" />';
                                                    }
                                                    ?>
                                                    </td>
                                                    <td><?=$value->sc_desc;?></td>
                                                        
                                            <td>
                                                <?php if ($value->sts == '1') { ?>  &nbsp;
                                                    <a href="pages/addcategory.php?c_id=<?= $value->c_id; ?>&submit=Disable" onClick="return confirm('Are You Sure want to Disable??')" class="" style="font-size: 40px;" title="click to Disable">  <i class="ion-eye-disabled"></i></a>
                                                    <?php } else { ?> 
                                                    <a  style="font-size: 40px;" href="pages/addcategory.php?c_id=<?= $value->c_id; ?>&submit=Enable" onClick="return confirm('Are You Sure want to Enable??')" class="" title="click to Enable"> <i class="ion-eye"></i></a>
                                                <?php } ?>
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
            CKEDITOR.replace( 'sc_desc' ,{ 
            height: 300,
            filebrowserUploadUrl :"upload.php" 
            });
    </script>

<?php include 'footer.php'; ?>