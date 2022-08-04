<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <?php
        session_start();

        require 'function.php';

        
    ?>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card rounded my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center">Forgot Password</h5>
                    <form method="post">
                    <div class="mb-3">
                        <label >email</label>
                        <div class="form-inline justify-content-center">
                        <input type="text" class="form-control" placeholder="Enter Email" name="email" required>
                        <button class="btn btn-primary my-2 my-sm-0 form-control" type="submit" name="search"><i class="fa fa-search"></i></button>
                        </div>
                    </div>         
                    </form>
                    <?php 
                    if (isset($_POST['search'])){                
                        $email = $_POST['email'];
                        $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['pass'] = $row;
                        
                        
                        if (mysqli_num_rows($result) === 1){
                            $question = $row["question"];
                            $format = '
                            <form method="post">
                            <div class="mb-3">
                            <label  value="">%s</label>
                            <input type="text" class="form-control"  placeholder="Enter Answer" name="answer" required>
                            </div>
                            <div class= "mb-3">
                                <label >New Password</label>
                                <input type="password" class="form-control"  placeholder="Enter New Password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label >Password Confirmation</label>
                                <input type="password" class="form-control"  placeholder="Enter Password Confirmation" name="passconf" required>
                            </div>
                            <div class="d-grid text-center">
                            <button class="btn btn-primary btn-login text-uppercase" type="submit" name="save">Save</button>
                            </div>
                            </form>
                            ';
                            printf($format, $question);             
                        }
                        else
                        {
                            echo '<p style="color: red; font-style: italic;">Email Not Found</p>';
                        }
                    }
                    elseif (isset($_POST['save'])){
                        $answeru = mysqli_real_escape_string($conn, $_POST['answer']);
                        $password = mysqli_real_escape_string($conn, $_POST['password']);
                        $confirm = mysqli_real_escape_string($conn, $_POST['passconf']);
                        if ($password !== $confirm){
                            echo "<script>
                                alert('Confirm password does not match')
                            </script>";
                            unset($_SESSION['pass']);
                            return false;
                        }
                        $password = password_hash($password, PASSWORD_DEFAULT);
                        $answer = $_SESSION['pass']['answer'];
                        
                        if ($answer == $answeru){
                            $email= $_SESSION['pass']['email'];
                            echo $email;
                            
                            mysqli_query($conn, "UPDATE user SET password='$password' WHERE email= '$email'");
                            unset($_SESSION['pass']);
                            //echo "<script>alert('Password Has Been Changed')</script>";
                            //echo "<script>window.location.href='login.php'</script>";
                            
                        }else {
                            unset($_SESSION['pass']);
                            echo "<script>alert('Wrong Answer')</script>";
                        }
                        
                    }
                    ?>
                    <hr class="my-4">
                    <div class="text-center mt-2">
                        <a class="btn btn-light text-uppercase" href="login.php">Login</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>





