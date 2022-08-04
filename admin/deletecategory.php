<?php
$result = $conn->query("SELECT * FROM category WHERE category_id='$_GET[id]'");
$row = $result->fetch_assoc();

$conn->query("DELETE FROM category WHERE category_id='$_GET[id]'");

echo "<script>alert('Category Has Been Removed');</script>";
echo "<script>location='index.php?halaman=kategori';</script>";
?>