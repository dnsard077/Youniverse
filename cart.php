<?php 
session_start();
require 'function.php';
if (!isset($_SESSION['login']) OR empty($_SESSION['login']))
{
    echo "<script>alert('you are not logged in');</script> ";
    echo "<script>window.location.href='login.php'</script>";
}
if (empty($_SESSION['cart']) OR !isset($_SESSION['cart']))
{
    echo "
    <script>alert('Empty Cart');</script> ";
    echo "<script>window.location.href='index.php'</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>


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
    $email= $_SESSION['login']['email'];
    $result = mysqli_query($conn,"SELECT * FROM user WHERE user.email='$email'");
    $row = mysqli_fetch_assoc($result);

    ?>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-12 border-bottom py-3">
            <h4 class="text-center">Cart</h4>
        </div>
        </div>
        <div class="col-md-12">
            <div class="p-3 py-3">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>SubPrice</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter=1;?>
                            <?php foreach ($_SESSION['cart'] as $product_id => $jumlah):?>
                            <?php $result = mysqli_query($conn, "SELECT * FROM product WHERE product_id='$product_id'");
                            $data = mysqli_fetch_assoc($result);
                            $subprice = $data['product_price'] * $jumlah;
                            ?>
                            <tr>
                                <td><?php echo $counter;?></td>
                                <td><?php echo $data['product_name'];?></td>
                                <td><?php echo number_format($data['product_price']);?></td>
                                <td><?php echo $jumlah;?></td>
                                <td><?php echo number_format($subprice);?></td>
                                <td>
                                    <a href="dltcart.php?id=<?php echo $product_id?>" class="btn btn-primary">Remove</a>
                                </td>
                            </tr>
                            <?php $counter++;?>
                            <?php endforeach?>
                        </tbody>
                    </table>
                    <div class="col-md-12 mb-3 text-center"><a href="checkout.php" class="btn btn-primary">Checkout</a></div>
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
