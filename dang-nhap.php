<?php 
require_once __DIR__."/autoload/autoload.php";
$error = [];
$data = [
	"email" => postInput("email"),
	"password" => postInput("password"),
];
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if($data['email'] == '')
	{
		$error['email'] = "Mời bạn nhập email";
	}
	if($data['password'] == '')
	{
		$error['password'] = "Mời bạn nhập password";
	}
	if(empty($error))
	{
		$is_check = $db->fetchOne("users","email = '".$data['email']."' AND password = '".md5($data['password'])."'");
		if($is_check != NULL ) {
            $_SESSION['name_user'] = $is_check['name'];
            $_SESSION['name_id'] = $is_check['id'];
            if(isset($_SESSION['cart']))
                header("Location: http://localhost:81/ProjectIT/thanhtoan.php");
            else
                echo "<script>alert('Đăng nhập thành công');location.href='index.php'</script>";

        }
		else
		{
			$_SESSION['error'] = "Đăng nhập thất bại";
		}
	}
}
?>
<?php  require_once __DIR__."/layouts/header.php";  ?>
<div class="col-md-9 bor">
	<section class="box-main1">
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
		<h3 class="tilte- main"><a style="font-size: 30px" href="">Đăng nhập</a></h3>
		<form action="" method="POST" class="form-horizontal formcustom" role = "form" style="margin-top: 30px">
			
			<div class="form-group" style="margin-bottom: 20px">
					<label  class="col-md-3 col-md-offset-1">Email</label>
					<div class="col-md-8">
						<input type="email" name="email" class="form-control" placeholder="Nhập email"  value="<?php echo $data['email'] ?> ">
						<?php if( isset($error['email'])): ?>
						<p class="text-danger"><?php echo $error['email']; ?></p>
					<?php endif ?>
					</div>		
											
			</div>
			<div class="form-group" style="margin-bottom: 20px">
					<label  class="col-md-3 col-md-offset-1">Mật khẩu</label>
					<div class="col-md-8">
						<input type="password" name="password" class="form-control" >
						<?php if( isset($error['password'])): ?>
						<p class="text-danger"><?php echo $error['password']; ?></p>
					<?php endif ?>
					</div>
					
					
				
			</div>
			
			<button type="submit" class="btn btn-info col-md-3 col-md-offset-5"  style="margin-bottom: 20px">Đăng nhập</button>

			
		</form>
	</section>
	
</div>
<?php  require_once __DIR__."/layouts/footer.php";  ?>