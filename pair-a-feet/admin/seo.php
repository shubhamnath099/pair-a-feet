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
                        <h4 class="pull-left page-title">Add SEO</h4>
                            <ol class="breadcrumb pull-right">
                               	<li><a href="dashboard">Dashboard</a></li>
                               
                                <li class="active">SEO</li>
                            </ol>
                               <div class="clearfix"></div>
                    </div>
                </div>
            </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Add SEO</h3></div>
                                    <div class="panel-body">
                                             <?php
                                            if (empty($_REQUEST['edit'])) {
                                                $edit_record = '';
                                            } else {
                                                $edit_record = $_REQUEST['edit'];
                                            }
                                            $run = $db->query("SELECT * FROM  `seo` WHERE id ='$edit_record'");
                                            $row = $run->fetch_object();
                                            ?>
                                        <form role="form" action="pages/actionseo.php" method="POST" enctype="multipart/form-data">

                                            <div class="form-group"><label for="title">title</label> <input type="text" class="form-control" id="title" name="title" placeholder="title" value="<?php
                                            if (!empty($row->title)) {
                                            echo $row->title;
                                            }
                                            ?>"/></div> 


                                            <div class="form-group"><label for="keywords">keywords</label> <input type="text" class="form-control" id="keywords" name="keywords" placeholder="keywords" value="<?php
                                            if (!empty($row->keywords)) {
                                            echo $row->keywords;
                                            }
                                            ?>"/></div>

                                            <div class="form-group"><label for="description">description</label> <input type="text" class="form-control" id="description" name="description" placeholder="description" value="<?php
                                            if (!empty($row->description)) {
                                            echo $row->description;
                                            }
                                            ?>"/></div> 

                                            <div class="form-group"><label for="author">author</label> <input type="text" class="form-control" id="author" name="author" placeholder="Link" value="<?php
                                            if (!empty($row->author)) {
                                            echo $row->author;
                                            }
                                            ?>"/></div> 

                                            <div class="form-group"><label for="canonical">canonical</label> <input type="text" class="form-control" id="canonical" name="canonical" placeholder="canonical" value="<?php
                                            if (!empty($row->canonical)) {
                                            echo $row->canonical;
                                            }
                                            ?>"/></div> 




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
                                    <div class="panel-heading"><h3 class="panel-title">View Slider</h3></div>
                                    <div class="panel-body">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Action</th>
                                                    <th>Title</th>
                                                    <th>Keywords</th>
                                                    <th>Description</th>
                                                    <th>Author</th>
                                                    <th>Canonical</th>
                                                    <th>Date Of Add</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            	<?php 
                                            		$sl = 0;
                                            		$data = $db->query("SELECT * FROM `seo`");
                                            		while ($value = $data->fetch_object()) {
                                            			$sl ++;
                                            	 ?>
                                                <tr>
                                                    <td><?=$sl;?></td>
                                                    <td>
                                                    	<a href="pages/actionseo.php?id=<?=$value->id?>&submit=delete" class="btn btn-danger waves-effect waves-light"><i class="ion-trash-a"></i></a>
                                                    	<a href="?edit=<?= $value->id; ?>" class="btn btn-success waves-effect waves-light"><i class="ion-edit"></i></a>
                                                    </td>
                                                    <td><?=$value->title;?></td>
                                                    <td><?=$value->keywords;?></td>
                                                    <td><?=$value->description;?></td>
                                                    <td><?=$value->author;?></td>
                                                    <td><?=$value->canonical;?></td>
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