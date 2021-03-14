<?php
require_once __DIR__."/../../autoload/autoload.php";
$id = intval(getInput('id'));
$editcategory = $db->fetchID("category",$id);
if(empty($editcategory))
{
$_SESSION['error'] = "Dữ liệu không tồn tại";
redirectAdmin("category");
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$data =
[
"name" => postInput('name'),
"slug" => postInput('slug'),
"images" => postInput('images'),
"banner" => postInput('banner'),
"home"  => postInput('home'),
"status" => postInput('status'),
];
$error =  [];
if(empty($error))
{
$id_update = $db->update("category",$data,array("id"=>$id));

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
}
}
?>
<?php
require_once __DIR__."/../../layouts/header.php"
?>
<main>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Thêm Mới Sản Phẩm
        </div>
        <div class="col-md-12">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên Danh Mục</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editcategory['name'] ?>">
                    <label for="exampleInputEmail1">Slug</label>
                    <input type="text" class="form-control" name="slug" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editcategory['slug'] ?>">
                    <label for="exampleInputEmail1">Images</label>
                    <input type="text" class="form-control" name="images" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editcategory['images'] ?>">
                    <label for="exampleInputEmail1">Banner</label>
                    <input type="text" class="form-control" name="banner" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editcategory['banner'] ?>">
                    <label for="exampleInputEmail1">Home</label>
                    <input type="text" class="form-control" name="home" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editcategory['home'] ?>">
                    <label for="exampleInputEmail1">Status</label>
                    <input type="text" class="form-control" name="status" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editcategory['status'] ?>">
                    
                    <?php if(isset($error['name'])):?>
                    <p class="text-danger"> <?php echo $error['name'] ?></p>
                    <?php endif ?>
                    
                    
                    
                </div>
                
                
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </main>
    <?php
    require_once __DIR__."/../../layouts/footer.php";
    ?>