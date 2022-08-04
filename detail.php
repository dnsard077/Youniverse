<?php 
//session_start();
require 'function.php';
$product_id = $_GET["id"];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Index</title>
    <?php
        session_start();

        if(!isset($_SESSION['login'])){
            header("Location:login.php");
            exit;
        }
    ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
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
    $result = $conn->query("SELECT * FROM product WHERE product_id='$product_id'");
    $row = $result->fetch_assoc();

    ?>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-12 border-bottom py-3">
            <h4 class="text-center">Product row</h4>
        </div>
        <div class="col-md-6 border-right">
            <div class="d-flex flex-column align-items-center text-center image"><img class="img-responsive mt-5" width="200px" height="max-content"  alt="product-pic" src="assets/img/produk_pic/<?php echo $row['product_pic'];?>">
            
        </div>
        
        </div>
        <div class="col-md-6 border-right">
            <div class="p-3 py-3">
                <div class="row mt-2">
                    <div class="ml-3">
                        <h5 class="text-left"><?php echo $row['product_name']?></h5>
                    </div>    
                </div>
                <form method="post" class="form-col" enctype="multipart/form-data">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <h6 class="labels">Price : $<?php echo number_format($row['product_price']) ?></h6>
                    </div>
                    <div class="col-md-12 mt-2">
                        <h6 class="labels">Weight : <?php echo $row['product_weight']?></h6>
                    </div>
                    <div class="col-md-12 mt-2">
                        <h6 class="labels">Stock : <?php echo $row['product_stock']?></h6>
                    </div>
                    <div class="col-md-12 mt-2">
                        <p class="labels">Description : <?php echo $row['product_description']?></p>
                    </div>
                    <div class="col-md-12">
                    <form method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" min="1" name="jumlah" class="form-control" max="<?php echo $row['product_stock']?>">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" name="beli">Buy Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                </form>
                <?php 
                    
                    if (isset($_POST['beli']))
                    {
                        $jumlah = $_POST['jumlah'];
                        if (isset($_SESSION['cart'][$product_id]))
                        {
                            $_SESSION['cart'][$product_id]+= $jumlah;
                        }
                        else
                        {
                            $_SESSION['cart'][$product_id] = $jumlah;
                        }
                        echo "<script>alert('Product Added to Cart');</script> ";
                        echo "<script>window.location.href='index.php'</script>";
                    }
                    ?>
                
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <?php 
    require 'footer.php';
    ?>
    </body>
    </html>








