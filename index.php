<?php 
//session_start();
require 'function.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
    <?php
        session_start();
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
    require 'navbar.php';
    ?>
    <section class="white-section container">
    <div id="carousel" class="carousel slide carousel-fade " data-ride="carousel" data-interval="3000">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <a href="">
                     <picture>
                      <img src="assets/img/sk.png" alt="responsive image" class="d-block img-fluid">
                    </picture>

                    <div class="carousel-caption">
                        <div>
                            <h2>beli sk 2</h2>
                            <span class="btn btn-light">Learn More</span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /.carousel-item -->
            <div class="carousel-item">
                <a href="">
                     <picture>
                      <img src="assets/img/asus.jpg" alt="responsive image" class="d-block img-fluid">
                    </picture>

                    <div class="carousel-caption">
                        <div>
                            <h2>beli sk 2</h2>
                            <span class="btn btn-light">Learn More</span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /.carousel-item -->
            <div class="carousel-item">
                <a href="">
                     <picture>
                      <img src="assets/img/gucci.jpg" alt="responsive image" class="d-block img-fluid">
                    </picture>

                    <div class="carousel-caption">
                        <div>
                            <h2>beli sk 2</h2>
                            <span class="btn btn-light">Learn More</span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /.carousel-item -->
        </div>
        <!-- /.carousel-inner -->
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> 
    </section>
    <section class="">
    <div class="container white-section rounded mt-5">
    <div class="row ">
        <div class="col-md-12 border-bottom">
        <b><h2 class="text-center">Category</h2></b>
        </div>
        <?php 
        $result = mysqli_query($conn,"SELECT * FROM category ");
        while($single = $result->fetch_assoc()){ ?>
        <div class="col-md-2 text-center py-5 border">
            <a href="category.php?id=<?php echo $single['category_id'];?>"><i class="fa fa-<?php echo $single['category_name'];?> fa-4x fa-white p-2 rounded"></i><h6 class="pt-3"><?php echo $single['category_name'];?></h6></a>
        </div>
        <?php } ?>
    </div>
    </div>
    </section>
    <section class="container white-section rounded">
        <b><h2 class="pt-5">Explore new Products</h2></b>
        <div class="container justify-content-center mt-50 mb-50">
            <div class="row">
            <?php $result = mysqli_query($conn,"SELECT * FROM product LEFT JOIN category ON product.category_id = category.category_id");
            while($single = $result->fetch_assoc()){ ?>
                <div class="col-md-4 col-lg-3 col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-img-actions"> <img src="assets/img/produk_pic/<?php echo $single['product_pic'];?>" class="card-img img-responsive img-fluid" width="100" height="350" alt=""> </div>
                        </div>
                        <div class="card-body bg-light text-center">
                            <div class="mb-2">
                                <h6 class="mb-2"> <a href="detail.php?id=<?php echo $single['product_id'];?>" class="mb-2" data-abc="true"><?php echo $single['product_name'];?></a> </h6> <a href="#" class="" ><?php echo $single['category_name'];?></a>
                            </div>
                            <h3 class="mb-1">$ <?php echo number_format($single['product_price']);?></h3>
                            <?php 
                            $id = $single['product_id'];
                            $data = mysqli_query($conn, "SELECT quantity FROM product_purchase WHERE product_purchase.product_id=$id");
                            $counter = 0;
                            while ($tunggal = $data->fetch_assoc())
                            {
                                $counter += $tunggal['quantity'];
                            }
                            ?>
                            <div class="mb-3"><?php echo "$counter";?> sold</div> 
                            <a type="button" class="btn btn-primary bg-cart" href="beli.php?id=<?php echo $single['product_id'];?>"><i class="fa fa-cart-plus mr-2"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </section>
    <?php 
    require 'footer.php';
    ?>
</body>
</html>