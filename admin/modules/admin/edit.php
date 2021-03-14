<?php
require_once __DIR__."/../../autoload/autoload.php";
$id = intval(getInput('id'));
$editadmin = $db->fetchID("admin",$id);
if(empty($editadmin))
{
$_SESSION['error'] = "Dữ liệu không tồn tại";
redirectAdmin("admin");
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{

$data =
[
"name" => postInput('name'),
"address" => postInput('address'),
"email" => postInput('email'),
"phone"  => postInput('phone'),
"status" => postInput('status'),
"level" => postInput('level'),
"avatar" => postInput('avatar'),
];
$error =  [];
if(postInput('name') == '')
{
$error['name'] = "Vui lòng nhập đầy đủ thông tin";
}
if(postInput('address') == '')
{
$error['address'] = "Vui lòng nhập địa chỉ";
}
if(postInput('email') == '')
{
$error['email'] = "Vui lòng nhập email";
}
else
{
if(postInput('email') != $editadmin['email'])
{
$is_check = $db->fetchOne("admin","email = '".$data['email']."'");
if($is_check != NULL)
{
$error['email'] = "Email đã tồn tại vui lòng nhập lại";
}
}
}
if(postInput('password') !=NULL && postInput('ConfirmPassword') != NULL)
{
if(postInput('password')!= postInput('ConfirmPassword'))
{
$error['password'] = "Mật khẩu thay đổi không khớp";
}
else
{
$data['password'] = MD5(postInput("password"));
}
}
if(empty($error))
{
if(isset($_FILES['avatar']))
{
$file_name = $_FILES['avatar']['name'];
$file_tmp = $_FILES['avatar']['tmp_name'];
$file_type = $_FILES['avatar']['type'];
$file_error = $_FILES['avatar']['error'];
if($file_error == 0)
{
$part = ROOT."admin/";
$data['avatar'] = $file_name;
}
}

$update = $db->update("admin",$data,array("id"=>$id));
if($update > 0)
{
move_uploaded_file($file_tmp, $part.$file_name);
$_SESSION['success'] = "Cập nhật thành công";
redirectAdmin("admin");
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
        <div class="card-header"><i class="fas fa-table mr-1"></i>Thêm Mới Admin</div>
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
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group" >
                    <label for="exampleInputEmail1">Full name </label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editadmin['name'] ?>">
                    <?php if(isset($error['name'])):?>
                    <p class="text-danger"> <?php echo $error['name'] ?></p>
                    <?php endif ?>
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" name="address" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editadmin['address'] ?>">
                    <?php if(isset($error['address'])):?>
                    <p class="text-danger"> <?php echo $error['address'] ?></p>
                    <?php endif ?>
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editadmin['email'] ?>">
                    <?php if(isset($error['email'])):?>
                    <p class="text-danger"> <?php echo $error['email'] ?></p>
                    <?php endif ?>
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" class="form-control" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editadmin['phone'] ?>">
                    <?php if(isset($error['phone'])):?>
                    <p class="text-danger"> <?php echo $error['phone'] ?></p>
                    <?php endif ?>
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $editadmin['password'] ?>">
                    <?php if(isset($error['password'])):?>
                    <p class="text-danger"> <?php echo $error['password'] ?></p>
                    <?php endif ?>
                    <label for="exampleInputEmail1">ConfirmPassword</label>
                    <input type="password" class="form-control" name="ConfirmPassword" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required="">
                    <?php if(isset($error['cpassword'])):?>
                    <p class="text-danger"> <?php echo $error['cpassword'] ?></p>
                    <?php endif ?>
                    <label for="exampleInputEmail1">Level</label>
                    <select name="level" class="form-control">
                        <option value=1 <?php echo isset($data['level']) && $data['level'] == 1 ? " selected = 'selected' " :''?>>CTV</option>
                        <option value=2 <?php echo isset($data['level']) && $data['level'] == 2 ? " selected = 'selected'" :''?>>Admin</option>
                    </select>
                    <div class="col-sm-12">
                        <label for="exampleInputEmail1">Avatar</label>
                        <input type="file" class="form-control" name="avatar" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" >
                        <img src="<?php echo uploads()?>admin/<?php echo $editadmin['avatar'] ?>" alt="" width = "80px" height = "80px">
                        
                    </div>
                    <?php if(isset($error['image'])):?>
                    <p class="text-danger"> <?php echo $error['image'] ?></p>
                    <?php endif; ?>
                    
                    
                    
                </div>
                
                
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </main>
    <?php
    require_once __DIR__."/../../layouts/footer.php";
    ?>