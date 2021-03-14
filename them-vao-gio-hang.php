<?php
require_once __DIR__."/autoload/autoload.php";
$id = intval(getInput('id'));


$product = $db->fetchID("product",$id);

_debug($product);
if($product)
{
	//ton tai san pham
	if(isset($_SESSION['cart']))
	{
		if(isset($_SESSION['cart'][$id]))
		{
			$_SESSION['cart'][$id]['slg'] += 1;

		}
		else
		{
			$_SESSION['cart'][$id]['slg'] = 1;

		}
		$_SESSION['cart'][$id]['name'] = $product['name'];
		$_SESSION['cart'][$id]['image'] = $product['thunbar'];
		$_SESSION['cart'][$id]['price'] = $product['price'];		
		$_SESSION['success'] = 'Tồn tại giỏ hàng,thêm mới thành công ';
		header("location: chi-tiet-san-pham.php?id=".$id);exit();
	}
	else
	{
		$_SESSION['cart'][$id]['slg'] = 1;
		$_SESSION['cart'][$id]['name'] = $product['name'];
		$_SESSION['cart'][$id]['image'] = $product['thunbar'];
		$_SESSION['cart'][$id]['price'] = $product['price'];
		$_SESSION['success'] = 'Thêm mới thành công ';
		header("location: chi-tiet-san-pham.php?id=".$id);exit();
  
	}
}
else
{
	$_SESSION['error'] = 'Không tồn tại sản phẩm';
	header("location: index.php");exit();

}
?>
<?php  require_once __DIR__."/layouts/header.php";  ?>
<div class="col-md-9 bor">
	<section class="box-main1">
		<h3 class="tilte- main"><a href=""></a></h3>		
	</section>
</div>
<?php  require_once __DIR__."/layouts/footer.php";  ?>