
<?php 
require_once __DIR__."/../../autoload/autoload.php";
$id = intval(getInput('id'));
$is_product = $db->fetchOne("product"," category_id = $id ");
if($is_product == NULL)
{
	$num = $db->delete("category",$id);
	if($num>0)
	{
   $_SESSION['success'] = "Xóa thành công";

            redirectAdmin("category");
	}
	else
	{
    $_SESSION['error'] = "Xóa thất bại";

            redirectAdmin("category");
	}


}
else
{
	$_SESSION['error'] = "Danh mục có sản phẩm bạn không thể xóa";
	redirectAdmin("category");
}

?>
