<?php 
require_once __DIR__."/autoload/autoload.php";
if(!isset($_SESSION['cart'])){
	header("location: index.php");
}
$key = intval(getInput('key'));
if( $key )
{
	if(array_key_exists($key,$_SESSION['cart']))
	{
		unset($_SESSION['cart'][$key]);
		$_SESSION['success'] = 'Xóa thành công sản phẩm ';
		header("location: danh-sach-cart.php");	
		
	}
}

?>