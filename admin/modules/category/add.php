<?php
require_once __DIR__."/../../autoload/autoload.php";
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
// if(postInput('name') || postInput('slug') || postInput('images') || postInput('banner') ||postInput('home') || postInput('status') == '')
// {
//     $error['name'] = "Vui lòng nhập đầy đủ thông tin";
//     $error['slug'] = "Vui lòng nhập đầy đủ thông tin";
//     $error['images'] = "Vui lòng nhập đầy đủ thông tin";
//     $error['banner'] = "Vui lòng nhập đầy đủ thông tin";
//     $error['home'] = "Vui lòng nhập đầy đủ thông tin";
//     $error['status'] = "Vui lòng nhập đầy đủ thông tin";
// }

//error trong co nghia la khong co loi
if(empty($error))
{
$isset =$db->fetchOne("category","name = '".$data['name']."' ");
if(count($isset) > 0)
{
$_SESSION['error'] = "Tên danh mục đã tồn tại";
}
else
{
$id_insert = $db->insert("category",$data);
if($id_insert > 0 )
{
$_SESSION['success'] = "Thêm mới thành công";
redirectAdmin("category");
}
else
{
$_SESSION['error'] = "Thêm mới thất bại";
}
}

}
}
?>
<?php
require_once __DIR__."/../../layouts/header.php"
?>
<main>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Thêm Mới Sản Phẩm</div>
        <div class="clear-fix">
            <?php if(isset($_SESSION['success'])) :?>
            <div class="alert alert-success">
                <?php echo$_SESSION['success'];unset($_SESSION['success'])?>
            </div>
            <?php endif ?>
            <?php if(isset($_SESSION['error'])) :?>
            <div class="alert alert-danger">
                <?php echo$_SESSION['error'];unset($_SESSION['error'])?>
            </div>
            <?php endif ?>
        </div>
        <div class="col-md-12">
            <form action="" method="POST" >
                <div class="form-group" >
                    <label for="exampleInputEmail1">Tên Danh Mục</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <label for="exampleInputEmail1">Slug</label>
                    <input type="text" class="form-control" name="slug" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <label for="exampleInputEmail1">Images</label>
                    <input type="text" class="form-control" name="images" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <label for="exampleInputEmail1">Banner</label>
                    <input type="text" class="form-control" name="banner" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <label for="exampleInputEmail1">Home</label>
                    <input type="text" class="form-control" name="home" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <label for="exampleInputEmail1">Status</label>
                    <input type="text" class="form-control" name="status" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    
                    
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