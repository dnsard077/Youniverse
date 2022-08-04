<?php
$result = $conn->query("SELECT * FROM product WHERE product_id='$_GET[id]'");
$row = $result->fetch_assoc();
$fotoproduk = $row['product_pic'];
if (file_exists("../assets/img/product_pic/$fotoproduk"))
{
    unlink("../assets/img/product_pic/$fotoproduk");
}

$conn->query("DELETE FROM product WHERE product_id='$_GET[id]'");

echo "<script>alert('product has been deleted');</script>";
echo "<script>location='index.php?halaman=produk';</script>";
?>