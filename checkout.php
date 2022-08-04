<?php 
session_start();
require 'function.php';

if (!isset($_SESSION['login']))
{
    echo "<div class='alert alert-info'>anda belum login</div>";
    echo "<script location='login.php'>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Index</title>


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
            <h4 class="text-center">Checkout</h4>
        </div>
        </div>
        <div class="col-md-12 border-right">
            <div class="p-3 py-3">
                <div class="row mt-2">
                    <div class="ml-3">
                        <h5 class="text-left">Cart</h5>
                    </div>    
                </div>
                <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subprice</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter=1;
                    $purchase_total = 0;
                    foreach ($_SESSION['cart'] as $product_id => $jumlah):
                    $result = $conn->query("SELECT * FROM product WHERE product_id='$product_id'");
                    $pecah = $result -> fetch_assoc();
                    $subprice = $pecah['product_price']*$jumlah;
                    ?>
                    <tr>
                        <td><?php echo $counter;?>.</td>
                        <td><?php echo $pecah['product_name'];?></td>
                        <td><?php echo number_format($pecah['product_price']);?></td>
                        <td><?php echo $jumlah;?></td>
                        <td><?php echo number_format($subprice);?></td>
                    </tr>
                    <?php $counter++;
                    $purchase_total+=$subprice;
                    endforeach?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total</th>
                        <th>$<?php echo (number_format($purchase_total));?></th>
                    </tr>
                </tfoot>
                </table>
                <div class="row mt-4">
                    <div class="ml-3">
                        <h5 class="text-left">Complete Information</h5>
                    </div>    
                </div>
                <form method="post" class="form-col" enctype="multipart/form-data">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="labels">First Name</label>
                        <input type="text" readonly value="<?php echo $_SESSION['login']['first_name']?>" class="form-control">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="labels">Last Name</label>
                        <input type="text" readonly value="<?php echo $_SESSION['login']['last_name']?>" class="form-control">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="labels">Phone number</label>
                        <input type="text" readonly value="<?php echo $_SESSION['login']['phone']?>" class="form-control">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="labels">Address</label>
                        <input type="text" class="form-control" placeholder="enter address" name="address" value="<?php echo $row['address'];?>">
                    </div>
                    <div class="col-md-12 mt-2">
                    <label class="labels">Shipping</label>
                    <select class="form-control" name="shipping_id" required>
                            <?php 
                            $result = $conn->query("SELECT * FROM shipping");
                            while ($perongkir= $result->fetch_assoc()){?>
                            <option value="<?php echo $perongkir['shipping_id']?>">
                                <?php echo $perongkir['shipping_city']?>
                                - $<?php echo number_format($perongkir['shipping_price'])?>
                            </option>
                            <?php } ?>
                    </select>
                    </div>
                </div>

                <div class="mb-3 mt-5 text-center"><button class="btn btn-primary" type="submit" name="checkout">Checkout</button></div>
                </form>
                <?php 
            if ( isset($_POST['checkout']))
            {
                $email = $_SESSION['login']['email'];
                $shipping_id = $_POST['shipping_id'];
                $date = date("Y-m-d");
                $shipping_address = $_POST['address'];
                $result = $conn->query("SELECT * FROM shipping WHERE shipping_id='$shipping_id'");
                $shipping_array = $result->fetch_assoc();
                $shipping_city = $shipping_array['shipping_city'];
                $shipping_price = $shipping_array['shipping_price'];
                $total = $purchase_total + $shipping_price;

                mysqli_query($conn,"INSERT INTO purchase(email, shipping_id, purchase_date, purchase_total, shipping_city, shipping_price, shipping_address)
                    VALUES ('$email', '$shipping_id', '$date', '$total', '$shipping_city', '$shipping_price', '$shipping_address')");
                
                $last_purchase_id = $conn->insert_id;
                foreach ($_SESSION['cart'] as $product_id => $jumlah) {
                    $result = $conn->query("SELECT * FROM product WHERE product_id='$product_id'");
                    $single = $result->fetch_assoc();
                    $name = $single['product_name'];
                    $price = $single['product_price'];
                    $weight = $single['product_weight'];
                    $subweight = $single['product_weight']*$jumlah;
                    $subprice = $single['product_price']*$jumlah;
                    

                    $conn->query("INSERT INTO product_purchase(purchase_id, product_id, name, price, weight, subweight, subprice, quantity)
                        VALUES('$last_purchase_id', '$product_id', '$name', '$price', '$weight', '$subweight', '$subprice',  '$jumlah')");
                    

                    $conn->query("UPDATE product SET product_stock=product_stock -$jumlah
                    WHERE product_id='$product_id'");
                }

                unset($_SESSION['cart']);
                echo "<script>alert('Sucess')</script>";
                echo "<script>window.location.href='nota.php?id=$last_purchase_id'</script>";
                //header("Location:nota.php?id=$last_purchase_id");
                exit;
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