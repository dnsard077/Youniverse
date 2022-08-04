<head>
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="nav.css">
  <?php 
  if (isset($_SESSION['login'])){
  $email= $_SESSION['login']['email'];
  $ambil = mysqli_query($conn,"SELECT * FROM user WHERE user.email='$email'");
  $detail = mysqli_fetch_assoc($ambil);}
  ?>
</head>
<section class="colored-section">

<div class="utility-nav d-none d-md-block pt-2">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <p class="medium"><i class="fa fa-envelope "></i> youniverse@youniversemail.com  |  <i class="fa fa-phone"></i> +621234567890
        </p>
      </div>

      <div class="col-12 col-md-6 text-right">
        <p class="medium">Boyolali</p>
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-md navbar-dark main-menu" style="box-shadow:none">
  <div class="container mb-2">


    <a class="navbar-brand" href="index.php">
      <h4 class="medium">youniverse</h4>
    </a>


    <div class="navbar-collapse " >
      <form action="pencarian.php" method="get" class="form-inline form-search">
        <input class="form-control " type="search" placeholder="Masukkan Keyword" aria-label="Search" name="keyword">
        <button class="btn btn-primary" type="submit"><i class="fa fa-search" style="color:white"></i></button>
      </form>
      <?php
      $counter = 0; 
      if (isset($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $id_produk => $jumlah) {
          $counter += $jumlah;
        }
      }
      else{
        $counter=0;
      }?>
      <ul class="navbar-nav">
        <li class="nav-item pt-2">
          <a class="btn-log" href="cart.php"><i class="fa fa-shopping-cart fa-2x" style="color:white"></i> <span class="badge badge-light"><?php echo $counter?></span></a>
        </li>
        <?php if (!isset($_SESSION['login'])){?>
        <li class="nav-item pt-3">
          <a class="btn-primary btn-log" href="login.php"><i class="fa fa-user-circle "></i> Log In </a>
        </li>
        <?php }else{ ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="assets/img/user_profile/<?php echo $detail['pic'];?>" width="40" height="40" class="rounded-circle">
              <?php echo $detail['first_name'];?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="profil.php">Profile</a>
              <a class="dropdown-item" href="riwayat.php">History</a>
              <a class="dropdown-item" href="about us/index.php">About Us</a>
              <a class="dropdown-item" href="logout.php">Log Out</a>
            </div>
          </li>
          <?php }?>
      </ul>

    </div>
    </div>
  </div>
</nav>


</section>