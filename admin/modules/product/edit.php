<?php
require_once __DIR__."/../../autoload/autoload.php";
$id = intval(getInput('id'));
$editproduct = $db->fetchID("product",$id);
$category = $db->fetchAll("category");
if(empty($editproduct))
{
$_SESSION['error'] = "Dữ liệu không tồn tại";
redirectAdmin("product");
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{


$data =
[
"name" => postInput('name'),
"slug" => postInput('slug'),
"price" => postInput('price'),
"sale" => postInput('sale'),
"category_id" => postInput('category_id'),
"content" => postInput('content'),
"number" => postInput('number'),
"head" => postInput('head'),
"view" => postInput('view'),
"hot" => postInput('hot'),
];

$error =  [];

if(postInput('name') == '')
{
$error['name'] = "Mời bạn nhập tên sản phẩm";
}
if(postInput('slug') == '')
{
$error['slug'] = "Mời bạn nhập slug";
}
if(postInput('price') == '')
{
$error['price'] = "Mời bạn nhập giá tiền";
}

if(postInput('category_id') == '')
{
$error['category_id'] = "Vui lòng chọn danh mục sản phẩm";
}
if(empty($error))
{
if(isset($_FILES['image']))
{
$file_name = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];
$file_type = $_FILES['image']['type'];
$file_error = $_FILES['image']['error'];
if($file_error == 0)
{
$part = ROOT."product/";
$data['thunbar'] = $file_name;
}
}

$update = $db->update("product",$data,array("id"=>$id));

if($update > 0)
{
move_uploaded_file($file_tmp, $part.$file_name);
$_SESSION['success'] = "Cập nhật thành công";
redirectAdmin("product");
}
else
{
$_SESSION['error'] = "cập nhật thất bại";

}
}
}
?>
<?php
require_once __DIR__."/../../layouts/header.php"
?>
<main>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Sửa sản phẩm
        </div>
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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="#" method="POST" role = "form"  enctype="multipart/form-data">
                        <legend>thêm ảnh mới</legend>
                        <div class="form-group">
                            <label for="title"></label>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="exampleInputEmail1">Category_ID</label>
                                <select name="category_id" class="form-control">
                                    
                                    <?php foreach ($category as $items):  ?>
                                    <option value="<?php echo $items['id'] ?> " <?php echo $editproduct['category_id']  == $items['id'] ? "selected = 'selected'" : ''?>><?php  echo $items['name'];?></option>
                                    <?php endforeach ?>
                                </select>
                                <?php if(isset($error['category_id'])):?>
                                <p class="text-danger"> <?php echo $error['category_id'] ?></p>
                                <?php endif ?>
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editproduct['name'] ?>">
                                <?php if(isset($error['name'])):?>
                                <p class="text-danger"> <?php echo $error['name'] ?></p>
                                <?php endif ?>
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" class="form-control" name="slug" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editproduct['slug'] ?>">
                                <?php if(isset($error['slug'])):?>
                                <p class="text-danger"> <?php echo $error['slug'] ?></p>
                                <?php endif ?>
                                <label for="exampleInputEmail1">Price</label>
                                <input type="number" class="form-control" name="price" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editproduct['price'] ?>">
                                <?php if(isset($error['price'])):?>
                                <p class="text-danger"> <?php echo $error['price'] ?></p>
                                <?php endif ?>
                                <label for="exampleInputEmail1">Số lượng</label>
                                <input type="number" class="form-control" name="number" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editproduct['number'] ?>">
                                <?php if(isset($error['number'])):?>
                                <p class="text-danger"> <?php echo $error['number'] ?></p>
                                <?php endif ?>
                                <div class="col-sm-12">
                                    <label for="exampleInputEmail1">Sale</label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" name="sale" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editproduct['sale'] ?>">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="exampleInputEmail1">Hình ảnh</label>
                                        <input type="file" class="form-control" name="image" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" >
                                        <img src="<?php echo uploads()?>product/<?php echo $editproduct['thunbar'] ?>" alt="" width = "80px" height = "80px">
                                        
                                    </div>
                                    
                                </div>
                                
                                <label for="exampleInputEmail1">Content</label>
                                <input type="text" class="form-control" name="content" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editproduct['content'] ?>">
                                <label for="exampleInputEmail1">Head</label>
                                <input type="text" class="form-control" name="head" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editproduct['head'] ?>">
                                <label for="exampleInputEmail1">View</label>
                                <input type="text" class="form-control" name="View" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editproduct['view'] ?>">
                                <label for="exampleInputEmail1">Hot</label>
                                <input type="text" class="form-control" name="hot" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editproduct['hot'] ?>">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </form>
                        </div>
                    </div>
                </form>
                
            </main>
            <?php
            require_once __DIR__."/../../layouts/footer.php";
            ?>