<?php
require 'function.php';
$id_purchase1 = $_GET["id"];
mysqli_query($conn, "UPDATE purchase SET purchase_status='arrived' WHERE purchase_id='$id_purchase1'");
echo "<script>alert('Confirmed')</script>";
echo "<script>window.location.href='riwayat.php'</script>";
?>