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
                        <h4 class="pull-left page-title">Add Product</h4>
                            <ol class="breadcrumb pull-right">
                                <li><a href="dashboard">Dashboard</a></li>
                               
                                <li class="active">Product</li>
                            </ol>
                               <div class="clearfix"></div>
                    </div>
                </div>
            </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Add Product</h3></div>
                                    <div class="panel-body">
                                            <?php
                                            if (empty($_REQUEST['edit'])) {
                                                $edit_record = '';
                                            } else {
                                                $edit_record = $_REQUEST['edit'];
                                            }
                                            $run = $db->query("SELECT * FROM  `product` WHERE p_id ='$edit_record'");
                                            $row = $run->fetch_object();
                                            ?>


                                        <form role="form" action="pages/addproduct.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-4">
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
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="category">Select Sub-category</label>
                                                        <select name="sc_id" class="form-control" id="subcategory">
                                                            <option value="">Select</option>
                                                            <?php 
                                                                $data1 = $db->query("SELECT * FROM `subcategory`");
                                                                while ($value1 = $data1->fetch_object()) {

                                          
                                                             ?>
                                                             <option value="<?=$value1->sc_id;?>"><?=$value1->sc_name;?></option>
                                                         <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Title">Product Name</label> 
                                                <input type="text" class="form-control" id="Product Name" name="name" placeholder="Name" value="<?php
                                if (!empty($row->name)) {
                                    echo $row->name;
                                }
                                ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="price">Saling Price</label> 
                                                <input type="text" class="form-control" id="price" name="sprice" placeholder="Price" value="<?php
                                if (!empty($row->sprice)) {
                                    echo $row->sprice;
                                }
                                ?>" />
                                            </div>
                                        </div>
                                               <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="mprice">Market Price</label> 
                                                <input type="text" class="form-control" id="mprice" name="mprice" placeholder="Market Price" value="<?php
                                if (!empty($row->mprice)) {
                                    echo $row->mprice;
                                }
                                ?>"  />
                                            </div>
                                        </div>



                                      
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="Upload Image">Description</label>
                                                 <textarea class="wysihtml5 form-control" name="descr" rows="9"><?php
                                if (!empty($row->descr)) {
                                    echo $row->descr;
                                }
                                ?></textarea>
                                             </div>
                                        </div>

                                         
                                            
                <div class="clearfix"></div>
                  <?php if (!empty($_REQUEST['edit'])) { ?>
                  
                        <button type="submit" name="submit" value="update" class="btn btn-dark waves-effect waves-light">Submit</button>

                    <input type="hidden" name="p_id" value="<?php echo $row->p_id; ?>">
                     <?php } else { ?>
                        <button type="submit" name="submit" value="submit" class="btn btn-dark waves-effect waves-light">Submit</button>
              
                        <input type="hidden" name="submit" value="submit" />
                 <?php } ?>
      </div>
                                        </form>
                                    </div>
                                </div>
                                <?php include 'msg.php' ?>
                            </div>
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">View Product</h3></div>
                                    <div class="panel-body">
                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Action</th>
                                                    <th>Category Name</th>
                                                    <th>Product</th>
                                                     <th>Image</th>
                                                     <th>price</th>
    
                                                    <th>Description</th>
                                                   
                                                    <th>Status</th>
                                                    <th>Date Of Add</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $sl = 0;
                                                    $data = $db->query("SELECT * FROM `product`");
                                                    while ($value = $data->fetch_object()) {
                                                        $sl ++;
                                                 ?>
                                                <tr>
                                                    <td><?=$sl;?></td>
                                                    <td>
                                                        <a href="pages/addproduct.php?p_id=<?=$value->p_id?>&submit=delete" class="btn btn-danger waves-effect waves-light"><i class="ion-trash-a"></i></a>
                                                        <a href="?edit=<?= $value->p_id; ?>" class="btn btn-success waves-effect waves-light"><i class="ion-edit"></i></a>
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

                                                    <td><?=$value->name;?></td>
                               
              
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
                                                    <td><?=$value->sprice;?></td>
                                                  
                                                    <td><?=$value->descr;?></td>
                                                        
                                            <td>
                                                <?php if ($value->sts == '1') { ?>  &nbsp;
                                                    <a href="pages/addproduct.php?p_id=<?= $value->p_id; ?>&submit=Disable" onClick="return confirm('Are You Sure want to Disable??')" class="" style="font-size: 40px;" title="click to Disable">  <i class="ion-eye-disabled"></i></a>
                                                    <?php } else { ?> 
                                                    <a  style="font-size: 40px;" href="pages/addproduct.php?p_id=<?= $value->p_id; ?>&submit=Enable" onClick="return confirm('Are You Sure want to Enable??')" class="" title="click to Enable"> <i class="ion-eye"></i></a>
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
            CKEDITOR.replace( 'descr' ,{ 
            height: 300,
            filebrowserUploadUrl :"upload.php" 
            });
    </script>

<?php include 'footer.php'; ?>