<?php 
require_once __DIR__."/autoload/autoload.php";
$name=$email=$password=$phone=$address = "";
$error =  [];
$data= [
	"name" => postInput('name'),
	"email" => postInput('email'),
	"password" => MD5(postInput('password')),
	"phone" => postInput('phone'),
	"address" => postInput('address'),
];
if(isset($_SESSION['name_user']))
{
	echo "<script>alert('Bạn đang đăng nhập');location.href='index.php'</script>";
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST['name']) && $_POST['name'] != NULL)
	{
		$name = $_POST['name'];
	}
	if($name == '')
	{
		$error['name'] = "Tên không được để trống";
	}
	if(isset($_POST['email']) && $_POST['email'] != NULL)
	{
		$email = $_POST['email'];
	}
	if($email == '')
	{
		$error['email'] = "Email không được để trống";
	}
	else
	{
		$is_check = $db->fetchOne("users","email = '".$data['email']."'");
		if($is_check != NULL)
		{
			$error['email'] = "Email đã tồn tại vui lòng thử lại";
		}
	}
	if(isset($_POST['password']) && $_POST['password'] != NULL)
	{
		$password = $_POST['password'];
	}
	if($password == '')
	{
		$error['password'] = "Password không được để trống";
	}
	if(isset($_POST['phone']) && $_POST['phone'] != NULL)
	{
		$phone = $_POST['phone'];
	}
	if($phone == '')
	{
		$error['phone'] = "Phone không được để trống";
	}
	if(isset($_POST['address']) && $_POST['address'] != NULL)
	{
		$address = $_POST['address'];
	}
	if($address == '')
	{
		$error['address'] = "Address không được để trống";
	}
	if(empty($error))
	{
		$insert = $db->insert("users",$data);
		if($insert>0)
	    {
            $_SESSION['success'] = "Đăng kí thành công";

            header("location: dang-nhap.php");
        }
        else
        {
    	$_SESSION['error'] = "Đăng kí thất bại";
        }

    }
}

?>
<?php  require_once __DIR__."/layouts/header.php";  ?>
<div class="col-md-9 bor">
	<section class="box-main1">
		<h3 class="tilte- main"><a style="font-size: 30px" href="">Đăng kí thành viên</a></h3>
		
		<form action="" method="POST" class="form-horizontal formcustom" role = "form" style="margin-top: 30px">
			<div class="form-group" style="margin-bottom: 20px">
					<label  class="col-md-3 col-md-offset-1">Tên thành viên</label>
					<div class="col-md-8">
						<input type="text" name="name" class="form-control" placeholder="Nhập tên" value="<?php echo $name ?>">
						<?php if( isset($error['name'])): ?>
						<p class="text-danger"><?php echo $error['name']; ?></p>
					<?php endif ?>
					
					</div>
					
				
			</div>
			<div class="form-group" style="margin-bottom: 20px">
					<label  class="col-md-3 col-md-offset-1">Email</label>
					<div class="col-md-8">
						<input type="email" name="email" class="form-control" placeholder="Nhập email" value="<?php echo $email ?>">
						<?php if(isset($error['email'])): ?>
						<p class="text-danger"><?php echo $error['email']; ?></p>
					<?php endif ?>
					</div>
					
				
			</div>
			<div class="form-group" style="margin-bottom: 20px">
					<label  class="col-md-3 col-md-offset-1">Mật khẩu</label>
					<div class="col-md-8">
						<input type="password" name="password" class="form-control" placeholder="***************" value="<?php echo $password ?>">
						<?php if(isset($error['password'])): ?>
						<p class="text-danger"><?php echo $error['password']; ?></p>
					<?php endif ?>
						
					</div>
					
				
			</div>
			<div class="form-group" style="margin-bottom: 20px">
					<label  class="col-md-3 col-md-offset-1">Số điện thoại</label>
					<div class="col-md-8">
						<input type="number" name="phone" class="form-control" value="<?php echo $phone ?>">
					<?php if(isset($error['phone'])): ?>
						<p class="text-danger"><?php echo $error['phone']; ?></p>
					<?php endif ?>
					</div>
					
				
			</div>
			<div class="form-group" style="margin-bottom: 20px">
					<label  class="col-md-3 col-md-offset-1">Địa chỉ</label>
					<div class="col-md-8">
						<input type="text" name="address" class="form-control" value=" <?php echo $address ?>">
						<?php if(isset($error['address'])): ?>
						<p class="text-danger"><?php echo $error['address']; ?></p>
					<?php endif ?>
					</div>
			</div>
			<button type="submit" class="btn btn-primary col-md-3 col-md-offset-5"  style="margin-bottom: 20px">Đăng kí</button>

			
		</form>
	</section>
	
</div>
<?php  require_once __DIR__."/layouts/footer.php";  ?>