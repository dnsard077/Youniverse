<?php 
//session_start();
require '../function.php';
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

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Youniverse</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <span data-feather="home"></span>
              Home 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=admin">
              <span data-feather="bar-chart-2"></span>
              Admin
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=pelanggan">
              <span data-feather="users"></span>
              User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=produk">
              <span data-feather="file"></span>
              Product
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=kategori">
              <span data-feather="file"></span>
              Category
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=pembelian">
              <span data-feather="shopping-cart"></span>
              Purchase
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?halaman=logout">
              <span data-feather="layers"></span>
              Logout
            </a>
          </li>
        </ul>

        
      </div>
    </nav>
    
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 pt-3 pl-3">
    <div id="page-wrapper" >
            <div id="page-inner">
                <?php 
                if (isset($_GET['halaman']))
                {
                    if ($_GET['halaman'] == "produk")
                    {
                        include 'produk.php';
                    }
                    elseif ($_GET['halaman'] == "pembelian")
                    {
                        include 'pembelian.php';
                    }
                    elseif ($_GET['halaman'] == "pelanggan")
                    {
                        include 'pelanggan.php';
                    }
                    elseif ($_GET['halaman'] == "detail")
                    {
                        include 'detail.php';
                    }
                    elseif ($_GET['halaman'] == "tambahproduk")
                    {
                        include 'tambahproduk.php';
                    }
                    elseif ($_GET['halaman'] == "hapusproduk")
                    {
                        include 'hapusproduk.php';
                    }
                    elseif ($_GET['halaman'] == "ubahproduk")
                    {
                        include 'ubahproduk.php';
                    }
                    elseif ($_GET['halaman'] == "logout")
                    {
                        include 'logout.php';
                    }
                    elseif ($_GET['halaman'] == "pembayaran")
                    {
                        include 'pembayaran.php';
                    }
                    elseif ($_GET['halaman'] == "admin")
                    {
                        include 'admin.php';
                    }
                    elseif ($_GET['halaman'] == "kategori")
                    {
                        include 'kategori.php';
                    }
                    elseif ($_GET['halaman'] == "addcategory")
                    {
                        include 'addcategory.php';
                    }
                    elseif ($_GET['halaman'] == "deletecategory")
                    {
                        include 'deletecategory.php';
                    }
                }
                else
                {
                    include 'home.php';
                }
                ?>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    </main>
  </div>
</div>


    
</body>
</html>