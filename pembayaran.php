
<?php 
//session_start();
require 'function.php';
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
        if (!isset($_SESSION['login']) OR empty($_SESSION['login']))
        {
            echo "<div class='alert alert-info'>silahkan login</div>";
            echo "<script location='login.php'>";
        }
        
        $id_pem = $_GET["id"];
        $ambil = $conn->query("SELECT * FROM purchase WHERE purchase_id='$id_pem'");
        $detpem = $ambil->fetch_assoc();
        
        $id_pelanggan_beli = $detpem['email'];
        $id_pelanggan_login = $_SESSION['login']['email'];
        
        if ($id_pelanggan_login !== $id_pelanggan_beli)
        {
            echo "<script>alert('you cannot access this invoice');</script> ";
            echo "<script location='riwayat.php'>";
        }
        if ($detpem['purchase_status'] == 'already paid'){
            echo "<script>alert('you are already paid');</script> ";
            echo "<script location='riwayat.php'>";
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
    ?>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-12 border-bottom py-3">
            <h4 class="text-center">Payment</h4>
        </div>
        </div>
        <div class="col-md-12 ">
            <div class="p-3 py-3">
                <div class="row mt-2">
                    <div class="ml-3">
                        <h5 class="text-left">Information</h5>
                    </div>    
                </div>
            <div class="alert alert-info">
                Total Bill <strong>$<?php echo $detpem['purchase_total']?></strong>
            </div>
                <form method="post" class="form-col" enctype="multipart/form-data">
                <div class="row mt-2">
                <div class="ml-3">
                        <h5 class="text-left">Complete Data</h5>
                    </div>    
                    <div class="col-md-12">
                        <label class="labels">First Name</label>
                        <input type="text" class="form-control" placeholder="enter first name" name="first">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="labels">Last Name</label>
                        <input type="text" class="form-control" placeholder="enter last name" name="last">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="labels">Bank</label>
                        <input type="text" class="form-control" placeholder="enter Bank" name="bank" >
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="labels">transfer amount</label>
                        <input type="text" class="form-control" placeholder="enter address" name="jumlah">
                    </div>
                    
                </div>
                <div class="row mt-3">
                    <div class="ml-3">
                        <h5 class="text-left">Transfer Proof</h5>
                    </div>    
                    <div class="form-group col-md-11">
                        <label>Add Picture</label> 
                    </div>
                    <div class="col-md-1 changepic mb-5">
                        <label class="custom-file" id="customFile">
                            <input type="file" class="custom-file-input" id="changepic" name="bukti">
                            <span for="changepic" class="custom-file-control form-control-file"><i class="fa fa-camera fa-2x fa-col"></i></span>
                        </label>
                    </div>
                </div>
                <div class="mb-3 text-center"><button class="btn btn-primary" type="submit" name="kirim">Send</button></div>
                </form>
                <?php 
                if (isset($_POST["kirim"]))
                {
                    $namabukti = $_FILES["bukti"]["name"];
                    $lokasibukti = $_FILES["bukti"]["tmp_name"];
                    $namafiks = date("YmdHis").$namabukti;
                    move_uploaded_file($lokasibukti, "assets/img/proof/$namafiks");

                    $first_name = $_POST['first'];
                    $last_name = $_POST['last'];
                    $bank = $_POST['bank'];
                    $jumlah = $_POST['jumlah'];
                    $tanggal = date("Y-m-d");
                    mysqli_query($conn,"INSERT INTO payment VALUES ('', '$id_pem' , '$bank', '$jumlah', '$tanggal', '$namafiks', '$first_name', '$last_name')");
                    mysqli_query($conn,"UPDATE purchase SET purchase_status='already paid' WHERE purchase_id='$id_pem'");
                    
                    echo "<script>alert('thank you for paying');</script> ";
                    echo "<script location='riwayat.php'>";

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







