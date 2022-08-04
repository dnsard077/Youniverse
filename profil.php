<?php 
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
        if ( isset($_POST["save"])) {

            //cek jika data berhasil diedit
            if (edit($_POST) > 0) {
                echo "
                    <script>
                        alert('Data Saved');

                    </script>
                ";
            }else{
                echo "
                    <script>
                        alert('error');
    
                    </script>
                ";
            }
        
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
    $email= $_SESSION['login']['email'];
    $result = mysqli_query($conn,"SELECT * FROM user WHERE user.email='$email'");
    $row = mysqli_fetch_assoc($result);
    $_SESSION['login'] = $row;
    ?>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-12 border-bottom py-3">
            <h4 class="text-center">Profile</h4>
        </div>
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center image"><img class="img-responsive rounded-circle mt-5" width="150px" height="150px"  alt="user_profile" src="assets/img/user_profile/<?php echo $row['pic'];?>">
            <span class="font-weight-bold pt-2"><?php echo $row['first_name'];?></span>
            <span class="text-black-50"><?php echo $row['email'];?></span>
            <span class="text-black-50"><?php echo $row['status'];?></span>
            
        </div>
        
        </div>
        <div class="col-md-9 border-right">
            <div class="p-3 py-3">
                <div class="row mt-2">
                    <div class="ml-3">
                        <h5 class="text-left">Profile Settings</h5>
                    </div>    
                </div>
                <form method="post" class="form-col" enctype="multipart/form-data">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="labels">First Name</label>
                        <input type="text" class="form-control" placeholder="enter first name" name="first" value="<?php echo $row['first_name'];?>">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="labels">Last Name</label>
                        <input type="text" class="form-control" placeholder="enter last name" name="last" value="<?php echo $row['last_name'];?>">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="labels">Phone number</label>
                        <input type="text" class="form-control" placeholder="enter phone number" name="phone" value="<?php echo $row['phone'];?>">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="labels">Address</label>
                        <input type="text" class="form-control" placeholder="enter address" name="address" value="<?php echo $row['address'];?>">
                    </div>
                    
                </div>
                <div class="row mt-3">
                    <div class="ml-3">
                        <h5 class="text-left">Profile Picture</h5>
                    </div>    
                    <div class="form-group col-md-11">
                        <label>Change picture</label> 
                    </div>
                    <div class="col-md-1 changepic mb-5">
                        <label class="custom-file" id="customFile">
                            <input type="file" class="custom-file-input" id="changepic" name="pic">
                            <span for="changepic" class="custom-file-control form-control-file"><i class="fa fa-camera fa-2x fa-col"></i></span>
                        </label>
                    </div>
                </div>
                <div class="mb-3 text-center"><button class="btn btn-primary" type="submit" name="save">Save Profile</button></div>
                </form>
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