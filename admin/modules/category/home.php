<?php 
require_once __DIR__."/../../autoload/autoload.php";
$id = intval(getInput('id'));
$editcategory = $db->fetchID("category",$id);
if(empty($editcategory))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("category");
}
$home = $editcategory['home'] == 0  ? 1 : 0;
$id_update = $db->update("category",array("home" => $home),array("id"=>$id));
        if($id_update > 0 )
        {
            $_SESSION['success'] = "Cập nhật thành công";

            redirectAdmin("category");

        }
        else
        {
             $_SESSION['error'] = "Cập nhật thất bại";
              redirectAdmin("category");
        }

 ?>