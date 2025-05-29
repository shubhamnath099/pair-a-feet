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
                        <h4 class="pull-left page-title">Add Testimonials</h4>
                            <ol class="breadcrumb pull-right">
                               	<li><a href="dashboard">Dashboard</a></li>
                               
                                <li class="active">Testimonials</li>
                            </ol>
                               <div class="clearfix"></div>
                    </div>
                </div>
            </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Add Testimonials</h3></div>
                                    <div class="panel-body">
                                            <?php
                                            if (empty($_REQUEST['edit'])) {
                                                $edit_record = '';
                                            } else {
                                                $edit_record = $_REQUEST['edit'];
                                            }
                                            $run = $db->query("SELECT * FROM  `testimonial` WHERE id ='$edit_record'");
                                            $row = $run->fetch_object();
                                            ?>


                                        <form role="form" action="pages/addtestimonial.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group"><label for="Title">Name</label> <input type="text" class="form-control" id="Title" name="name" placeholder="Name" /></div>
                                            <div class="form-group"><label for="Upload Image">Upload Image <span class="text-danger">400 * 400</span></label> <input type="file" class="form-control" id="Upload Image" name="img1" placeholder="Upload Image" /></div>
                                            <div class="form-group"><label for="Upload Image">Comments</label> <textarea class="wysihtml5 form-control" name="para" rows="9"></textarea></div>
                                         
                                            

                  <?php if (!empty($_REQUEST['edit'])) { ?>
                  
                        <button type="submit" name="submit" value="update" class="btn btn-dark waves-effect waves-light">Submit</button>

                    <input type="hidden" name="id" value="<?php echo $row->id; ?>">
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
                                    <div class="panel-heading"><h3 class="panel-title">View Testimonials</h3></div>
                                    <div class="panel-body">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Action</th>
                                                    <th>Name</th>
                                                     <th>Comments</th>
    
                                                    <th>Image</th>
                                                   
                                                    <th>Status</th>
                                                    <th>Date Of Add</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            	<?php 
                                            		$sl = 0;
                                            		$data = $db->query("SELECT * FROM `testimonial`");
                                            		while ($value = $data->fetch_object()) {
                                            			$sl ++;
                                            	 ?>
                                                <tr>
                                                    <td><?=$sl;?></td>
                                                    <td>
                                                    	<a href="pages/addtestimonial.php?id=<?=$value->id?>&submit=delete" class="btn btn-danger waves-effect waves-light"><i class="ion-trash-a"></i></a>
                                                    	<a href="" class="btn btn-success waves-effect waves-light"><i class="ion-edit"></i></a>
                                                    </td>
                                                    <td><?=$value->name;?></td>
                                                          <td><?=$value->para;?></td>
              
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
                                                
                                                        
                                            <td>
                                                <?php if ($value->sts == '1') { ?>  &nbsp;
                                                    <a href="pages/addtestimonial.php?id=<?= $value->id; ?>&submit=Disable" onClick="return confirm('Are You Sure want to Disable??')" class="" style="font-size: 40px;" title="click to Disable">  <i class="ion-eye-disabled"></i></a>
                                                    <?php } else { ?> 
                                                    <a  style="font-size: 40px;" href="pages/addtestimonial.php?id=<?= $value->id; ?>&submit=Enable" onClick="return confirm('Are You Sure want to Enable??')" class="" title="click to Enable"> <i class="ion-eye"></i></a>
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
            CKEDITOR.replace( 'para' ,{ 
            height: 300,
            filebrowserUploadUrl :"upload.php" 
            });
    </script>

<?php include 'footer.php'; ?>