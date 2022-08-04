<?php
session_start();
$_SESSION=[];
session_unset();
echo "<div class='alert alert-info'>anda telah logout</div>";
header("Location:../login.php");
exit;
?>