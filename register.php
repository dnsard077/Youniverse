<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<?php
		require 'function.php';
		if(isset($_POST['register'])){
			if(register() > 0){
				echo "<script>
				alert('Registration Success')
			</script>";
			} else{
				echo mysqli_error($conn);
			}
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
                <div class="card rounded my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fs-5">Register</h5>
                    <form method="post">
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="enter Email" name="user" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                    </div>
					<div class="mb-3">
                        <label for="password-conf">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password-conf" placeholder="Enter Confirmation Password" name="konfirmasi" required>
                    </div>
                    <div class="mb-3">
                        <label for="question">Recovery Question</label>
                        <input type="text" class="form-control" id="question" placeholder="Enter Question" name="q1" required>
                    </div>
                    <div class="mb-3">
                        <label for="answer">Answer</label>
                        <input type="text" class="form-control" id="answer" placeholder="Enter Answer" name="answeruser" required>
                    </div>
                    <div class="text-center">
                        <button class="btn-login btn-primary text-uppercase" type="submit" name="register" value="register">Register</button>
                    </div>
                    <div class="text-center pt-4">
                        <a class="btn-login btn-light text-uppercase " href="login.php"> Login</a>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>