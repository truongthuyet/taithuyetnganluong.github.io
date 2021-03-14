<?php 
session_start();
require_once __DIR__. "/../libraries/Database.php";
require_once __DIR__. "/../libraries/Function.php";
$db = new Database;
define("ROOT", $_SERVER['DOCUMENT_ROOT']."/ProjectIT/public/uploads/");
$category = $db->fetchAll("category");
$sqlsl ="SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 3 ";
$product_new = $db->fetchsql($sqlsl);
$sqlpay = "SELECT * FROM  product WHERE head = 1 ORDER BY head DESC LIMIT 3";
$pro = $db->fetchsql($sqlpay);


 ?>