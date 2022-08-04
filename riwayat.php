<?php 
session_start();
require 'function.php';

if (!isset($_SESSION['login']) OR empty($_SESSION['login']))
{
    echo "
        <script>alert('you are not logged in');</script> ";
    echo "<script location='login.php'>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>History</title>


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
    $ambil = mysqli_query($conn,"SELECT * FROM user WHERE user.email='$email'");
    $detail = mysqli_fetch_assoc($ambil);

    ?>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-12 border-bottom py-3">
            <h4 class="text-center">History</h4>
        </div>
        </div>
        <div class="col-md-12">
            <div class="p-3 py-3">
                <section class="riwayat">
                    <div class="container">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter=1;
                                $id_user = $_SESSION['login']['email'];
                                $ambil = $conn->query("SELECT * FROM purchase WHERE email='$id_user'");
                                while ($pecah = $ambil->fetch_assoc()){?>
                                <tr>
                                    <td><?php echo $counter;?>.</td>
                                    <td><?php echo $pecah['purchase_date'];?></td>
                                    <td>
                                        <?php echo $pecah['purchase_status'];?>
                                        <br>
                                        <?php if(!empty($pecah['delivery_receipt'])):?>
                                            Delivery Receipt : <?php echo $pecah['delivery_receipt'] ?>
                                        <?php endif ?>
                                    </td>
                                    <td> $<?php echo number_format($pecah['purchase_total']);?></td>
                                    <td>
                                            <a href="nota.php?id=<?php echo $pecah['purchase_id']?>" class="btn btn-primary">Invoice</a>
                                        <?php
                                        if ($pecah['purchase_status'] == 'pending'){?>
                                            <a href="pembayaran.php?id=<?php echo $pecah['purchase_id'];?>" class="btn btn-primary">Payment</a>
                                        <?php } ?>
                                        <?php if ($pecah['purchase_status'] == 'on delivery'){?>
                                            <a href="confirmation.php?id=<?php echo $pecah['purchase_id'];?>" class="btn btn-primary">confirm</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php $counter++;?>
                                <?php }?>
                            </tbody>
                        </table>
                        
                    </div>
                </section>
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


