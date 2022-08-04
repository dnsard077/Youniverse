<?php 
require 'function.php';

$keyword = $_GET['keyword'];

$alldata=array();
$result = $conn->query("SELECT * FROM product WHERE product_name LIKE '%$keyword%' OR product_description LIKE '%$keyword%'");
while($row = $result->fetch_assoc())
{
    $alldata[]=$row;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Index</title>
    
    <?php
        session_start();


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
    ?>
    <div class="container">
    <h3 class="p-3 alert alert-info">Search Result: <?php echo $keyword ?></h3>
    <?php if (empty($alldata)){ ?>
        <div class="alert alert-danger text-center"><?php echo $keyword ?> Not found</div>
        <div class="fixed-bottom">
            <?php 
            require 'footer.php';
            ?> 
    </div>
    <?php } else{?>
    </div>
    <div class="container justify-content-center mt-50 mb-50">
        <div class="row">
        <?php $result = mysqli_query($conn,"SELECT * FROM product LEFT JOIN category ON product.category_id = category.category_id WHERE product_name LIKE '%$keyword%' OR product_description LIKE '%$keyword%'");?>
        <?php while($single = $result->fetch_assoc()){ ?>
            <div class="col-md-4 col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-img-actions"> <img src="assets/img/produk_pic/<?php echo $single['product_pic'];?>" class="card-img img-fluid" width="96" height="350" alt=""> </div>
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
                        while ($single = $data->fetch_assoc())
                        {
                            $counter += $single['quantity'];
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
    <div class="sticky-bottom">
    <?php 
        require 'footer.php';
    ?> 
    </div>
    <?php } ?>
    </div>
</body>
    
</html>