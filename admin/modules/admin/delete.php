<?php 
require_once __DIR__."/../../autoload/autoload.php";
$id = intval(getInput('id'));
$num = $db->delete("admin",$id);
if($num>0)
{
   $_SESSION['success'] = "Xóa thành công";

            redirectAdmin("admin");
}
else
{
    $_SESSION['error'] = "Xóa thất bại";

            redirectAdmin("admin");
}
?>