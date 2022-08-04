<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <?php
        session_start();
        if(isset($_SESSION['pass'])){
            unset($_SESSION['pass']);
        }
        if(isset($_COOKIE['login'])){
            if ($_COOKIE['login'] == 'true'){
                $_SESSION['login'] = $row;
            }
        }
        if(isset($_SESSION['login'])){
            if($_SESSION['login']['status'] == 'Administrator')
            {
                header("Location:admin/index.php");
                exit;
            }
            else
            {
                header("Location:index.php");
                exit;
            }
            
        }

        require 'function.php';

        if (isset($_POST['login'])){
            $email = $_POST['user'];
            $password = $_POST['pass'];

            $result = mysqli_query($conn, "select * from user where email = '$email'");

            if (mysqli_num_rows($result) === 1){

                $row = mysqli_fetch_assoc($result);
                if(password_verify($password, $row['password'])){

                    $_SESSION['login'] = $row;

                    if(isset($_POST['remember'])){
                        setcookie('login', 'true', time()+60);
                    }
                    if($_SESSION['login']['status'] == 'Administrator')
                    {
                        header("Location:admin/index.php");
                        exit;
                    }
                    else
                    {
                        header("Location:index.php");
                        exit;
                    }
                }
            }

            $error = true;
        }
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
                <div class="card my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fs-5">Login</h5>
                    <form method="post">
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="user" required>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="pass" required>
                    </div>
                    <div class="text-right mb-4">
                        <a class="text-lowercase" href="forpass.php"> forgot password?</a>
                    </div>

                    <div class="mb-3">
                        <input type="checkbox" value="" id="remember" name="remember">
                        <label for="remember">
                        Remember me
                        </label>
                    </div>
                    <?php if(isset($error)): ?>
                    <p style="color: red; font-style: italic;">Wrong Email / Password</p>
                    <?php endif; ?>
                    <div class="text-center">
                        <button class="btn-login btn-primary text-uppercase" type="submit" name="login">Login</button>
                    </div>
                    <div class="text-center pt-4">
                        <a class="btn-login btn-light text-uppercase" href="register.php"> Register</a>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>




</body>
</html>





