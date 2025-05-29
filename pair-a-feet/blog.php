<?php include 'header.php';?>

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    
    
    <!-- content-wraper start -->
    <div class="content-wraper mb--100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- blog-wrapper start -->
                    <div class="blog-wrapper">
                        
                        <!-- blog-wrap start -->
                        <div class="row blog-wrap-col-3">
                            <?php 
                                $data = $db->query("SELECT * FROM `blog`");
                                while($value = $data->fetch_object()){
                             ?>
                            <div class="col-lg-4 col-md-6">
                                <!-- single-blog-area start -->
                                <div class="single-blog-area mb--40">
                                    <div class="blog-image">
                                        <a href="blog-single.php?title=<?=$value->title;?>"><img src="admin/pages/<?=$value->img1;?>" alt=""></a>
                                    </div>
                                    <div class="blog-contend">
                                        <h3><a href="#"><?=$value->title;?></a></h3>
                                        <div class="blog-date-categori">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-user"></i> <?=$value->sign;?> </a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> Comments </a></li>
                                            </ul>
                                        </div>
                                        <p><?=$value->sdescr;?></p>
                                        <div class="mt-30 blog-more-area">
                                            <a href="blog-single.php?title=<?=$value->title;?>" class="blog-btn btn">Read more</a>
                                            <ul class="social-icons">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-blog-area end -->
                            </div>
                        <?php } ?>



                        </div>
                        <!-- blog-wrap end -->
                        
                        <!-- paginatoin-area start -->

                        <!-- paginatoin-area end -->
                    </div>
                    <!-- blog-wrapper end -->
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
<?php include 'footer.php';?>