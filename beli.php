<?php 
session_start();
$id_produk = $_GET['id'];

if (isset($_SESSION['cart'][$id_produk]))
{
    $_SESSION['cart'][$id_produk]+=1;
}
else
{
    $_SESSION['cart'][$id_produk] = 1;
}
echo "<script>alert('Product Added to Cart');</script> ";
echo "<script>window.location.href='index.php'</script>";

?>