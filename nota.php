<?php 
session_start();
require 'function.php';

if (!isset($_SESSION['login']) OR empty($_SESSION['login']))
{
    echo "<script>alert('You are not logged in');</script> ";
    echo "<script location='login.php'>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>

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
        $result = mysqli_query($conn,"SELECT * FROM purchase JOIN user ON purchase.email=user.email WHERE purchase.purchase_id=$_GET[id]");
        $row = mysqli_fetch_assoc($result);
        $userid = $row['email'];
        $userlogin = $_SESSION['login']['email'];

        if ($userid !== $userlogin)
        {
            echo "<script>alert('You dont have access');</script> ";
            echo "<script location='riwayat.php'>";
        }
        ?>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
            <div class="col-md-4 text-left p-5">
                <h3>Purchase</h3>
                Purchase id: <?php echo $row['purchase_id'];?><br>
                Date : <?php echo $row['purchase_date'];?><br>
                Total : $<?php echo number_format($row['purchase_total']);?>
            </div>
            <div class="col-md-4 text-center p-5">
                <h3>Customer</h3>
                <?php echo $row['first_name']. ' '. $row['last_name'];?><br>
                    <?php echo $row['phone'];?><br>
                    <?php echo $row['email'];?>
            </div>
            <div class="col-md-4 text-right p-5">
                <h3>Shipping</h3>
                <?php echo $row['shipping_city'];?><br>
                Shipping Price: $<?php echo number_format($row['shipping_price']);?><br>
                Address : <?php echo $row['shipping_address'];?>

            </div>
        </div>
        <div class="col-md-12">
            <div class="p-3 py-3">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Weight</th>
                                <th>Quantity</th>
                                <th>Sub Weight</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter=1;?>
                            <?php $result = $conn->query("SELECT * FROM product_purchase  WHERE product_purchase.purchase_id='$_GET[id]'");?>
                            <?php while ($pecah = $result->fetch_assoc()){?>
                            <tr>
                                <td><?php echo $counter;?></td>
                                <td><?php echo $pecah['name'];?></td>
                                <td>$ <?php echo number_format($pecah['price']);?></td>
                                <td><?php echo $pecah['weight'];?></td>
                                <td><?php echo $pecah['quantity'];?></td>
                                <td><?php echo $pecah['subweight'];?></td>
                                <td>Rp. <?php echo number_format($pecah['subprice']);?></td>
                            </tr>
                            <?php $counter++;
                            $total = $pecah['price'] * $pecah['quantity'] ;?>
                            <?php }?>
                            <tr>
                                <th colspan="6">Total</th>
                                <th>$<?php echo number_format($row['purchase_total'] - $row['shipping_price']);?></th>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
        <?php if ($row['purchase_status'] !== 'already paid'){?>
                <div class="col-md-12 p-4">
                    <div class="alert alert-info">
                        <p>You have not paid off the amount of  $<?php echo number_format($row['purchase_total']);?></p>
                        <strong>please paid to the bank ??? on behalf of admin</strong>
                    </div>
                </div>
        <?php }else{ ?>
            <div class="col-md-12 p-4">
                    <div class="alert alert-info">
                        <p>thank you for paying</p>
                    </div>
                </div>
        <?php }?>
    </div>
    </div>
    </div>
    </div>
    <?php 
    require 'footer.php';
    ?>
</body>

</html>



