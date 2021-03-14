<?php 
session_start();
unset($_SESSION['name_user']);
unset($_SESSION['name_id']);
unset($_SESSION['cart']);
header("location: index.php");
 ?>