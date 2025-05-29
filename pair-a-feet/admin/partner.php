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
                        <h4 class="pull-left page-title">Upload partner Logo</h4>
                            <ol class="breadcrumb pull-right">
                               	<li><a href="dashboard">Dashboard</a></li>
                               
                                <li class="active">Upload partner Logo</li>
                            </ol>
                               <div class="clearfix"></div>
                    </div>
                </div>
            </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Add partner Logo</h3></div>
                                    <div class="panel-body">
                                            <?php
                                            if (empty($_REQUEST['edit'])) {
                                                $edit_record = '';
                                            } else {
                                                $edit_record = $_REQUEST['edit'];
                                            }
                                            $run = $db->query("SELECT * FROM  `partner` WHERE id ='$edit_record'");
                                            $row = $run->fetch_object();
                                            ?>


                                        <form role="form" action="pages/addpartner.php" method="POST" enctype="multipart/form-data">
                                     
                                  
                                            <div class="form-group">
                                                <label for="Upload Image"> Image </label> 
                                                <input type="file" class="form-control" id="Upload Image" name="img1" placeholder="Upload Image" />
                                            </div>
                                     

                  <?php if (!empty($_REQUEST['edit'])) { ?>
                  
                        <button type="submit" name="submit" value="update" class="btn btn-dark waves-effect waves-light">Update</button>

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
                                    <div class="panel-heading"><h3 class="panel-title">View partner Logo</h3></div>
                                    <div class="panel-body">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Action</th>
                                                    
                                                     <th>Image</th>
    


                                                </tr>
                                            </thead>
                                            <tbody>
                                            	<?php 
                                            		$sl = 0;
                                            		$data = $db->query("SELECT * FROM `partner`");
                                            		while ($value = $data->fetch_object()) {
                                            			$sl ++;
                                            	 ?>
                                                <tr>
                                                    <td><?=$sl;?></td>
                                                    <td>
                                                    	<a href="pages/addpartner.php?id=<?=$value->id?>&submit=delete" class="btn btn-danger waves-effect waves-light"><i class="ion-trash-a"></i></a>
                                                    	<a href="?edit=<?= $value->id;?>" class="btn btn-success waves-effect waves-light"><i class="ion-edit"></i></a>
                                                    </td>
              
                               
              
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
            CKEDITOR.replace( 'sdesc' ,{ 
            height: 300,
            filebrowserUploadUrl :"upload.php" 
            });
            CKEDITOR.replace( 'fdesc' ,{ 
            height: 300,
            filebrowserUploadUrl :"upload.php" 
            });
    </script>

<?php include 'footer.php'; ?>