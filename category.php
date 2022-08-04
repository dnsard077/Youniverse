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
        $category_id = $_GET['id'];
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
    <section class="white-section container ">
    <div id="carousel" class="carousel slide carousel-fade mb-5" data-ride="carousel" data-interval="3000">
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
    <section class="mt-5 rounded">
        <div class="container white-section">
            <b><h2 class="pt-5 mt-5">Explore new Products</h2></b>
            <?php $result = mysqli_query($conn,"SELECT * FROM category LEFT JOIN product ON product.category_id='$category_id' WHERE category.category_id = '$category_id'; ");
            if (mysqli_num_rows($result) !== 1){?>
            <div class="justify-content-center mt-50 mb-50">
                <div class="row">
                
                <?php while($perproduk = $result->fetch_assoc()){ ?>
                    <div class="col-md-4 col-lg-3 col-sm-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-img-actions"> <img src="assets/img/produk_pic/<?php echo $perproduk['product_pic'];?>" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                            </div>
                            <div class="card-body bg-light text-center">
                                <div class="mb-2">
                                    <h6 class="mb-2"> <a href="detail.php?id=<?php echo $perproduk['product_id'];?>" class="mb-2" data-abc="true"><?php echo $perproduk['product_name'];?></a> </h6> <a href="#" class="" ><?php echo $perproduk['category_name'];?></a>
                                </div>
                                <h3 class="mb-1">$ <?php echo number_format($perproduk['product_price']);?></h3>
                                <?php 
                                $id = $perproduk['product_id'];
                                $data = mysqli_query($conn, "SELECT quantity FROM product_purchase WHERE product_purchase.product_id=$id");
                                $counter = 0;
                                while ($tunggal = $data->fetch_assoc())
                                {
                                    $counter += $tunggal['quantity'];
                                }
                                ?>
                                <div class="mb-3"><?php echo "$counter";?> sold</div> 
                                <a type="button" class="btn btn-primary bg-cart" href="beli.php?id=<?php echo $perproduk['product_id'];?>"><i class="fa fa-cart-plus mr-2"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
            <?php } else{ ?>
                    <h5 class="p-5" style="color: red; font-style: italic;">empty Categories</h5>
            <?php } ?>
    </section>

    <?php 
    require 'footer.php';
    ?>
    
</body>
</html>