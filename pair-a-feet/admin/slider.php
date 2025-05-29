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
                        <h4 class="pull-left page-title">Add Slider</h4>
                            <ol class="breadcrumb pull-right">
                               	<li><a href="dashboard">Dashboard</a></li>
                               
                                <li class="active">Slider</li>
                            </ol>
                               <div class="clearfix"></div>
                    </div>
                </div>
            </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Add Slider</h3></div>
                                    <div class="panel-body">
                                        <form role="form" action="pages/addbanner.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group"><label for="Title">Title</label> <input type="text" class="form-control" id="Title" name="head" placeholder="Title" /></div>
                                            <div class="form-group"><label for="Upload Image">Upload Image <span class="text-danger">1920 * 720</span></label> <input type="file" class="form-control" id="Upload Image" name="img1" placeholder="Upload Image" /></div>
                                         
                                            <button type="submit" name="submit" value="submit" class="btn btn-dark waves-effect waves-light">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <?php include 'msg.php' ?>
                            </div>
                            <div class="col-md-8">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">View Slider</h3></div>
                                    <div class="panel-body">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Action</th>
                                                    <th>Title</th>
                                                    <th>Image</th>
                                                    <th>Date Of Add</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            	<?php 
                                            		$sl = 0;
                                            		$data = $db->query("SELECT * FROM `banner`");
                                            		while ($value = $data->fetch_object()) {
                                            			$sl ++;
                                            	 ?>
                                                <tr>
                                                    <td><?=$sl;?></td>
                                                    <td>
                                                    	<a href="pages/addbanner.php?id=<?=$value->id?>&submit=delete" class="btn btn-danger waves-effect waves-light"><i class="ion-trash-a"></i></a>
                                                    	<a href="" class="btn btn-success waves-effect waves-light"><i class="ion-edit"></i></a>
                                                    </td>
                                                    <td><?=$value->head;?></td>
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







<?php include 'footer.php'; ?>