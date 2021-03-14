<?php
require_once __DIR__."/autoload/autoload.php";
if(isset($_SESSION['name_id'])){
    $user  = $db->fetchID("users",intval($_SESSION['name_id']));

}
else
{
    header("Location: http://localhost:81/ProjectIT/dang-nhap.php");
}









//_debug($user);

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$data = 
	[
		"amount"=> $_SESSION['total'],
		"users_id" => $_SESSION['name_id'],
		 "note" => postInput("note"),

	];
	$idtran = $db->insert("transaction",$data);
	if($idtran > 0 )
	{
		foreach ($_SESSION['cart'] as $key => $value) {
			$data2=
			[
				'transaction_id' => $idtran,
				'product_id'     =>$key,
				'qty'            =>$value['slg'],
				'price'            =>$value['price'],
			];
			$id_insert = $db->insert("orders",$data2);
			
		}
		$_SESSION['success'] = "Lưu thông tin đơn hàng thành công chúng tôi sẽ liên lạc với bạn sớm nhất";
		header("location: thong-bao.php");
	}
}
?>
<?php  require_once __DIR__."/layouts/header.php";  ?>
<div class="col-md-9 bor">
	<section class="box-main1">
		<h3 class="tilte- main"><a style="font-size: 30px" href="">Thanh Toán </a></h3>
		
		<form action="" method="POST" class="form-horizontal formcustom" role = "form" style="margin-top: 30px">
			<div class="form-group" style="margin-bottom: 20px">
				<label  class="col-md-3 col-md-offset-1">Tên thành viên</label>
				<div class="col-md-8">
					<input readonly = "" type="text" name="name" class="form-control" placeholder="Nhập tên" value="<?php echo $user['name'] ?>">
					
					
				</div>
				
				
			</div>
			<div class="form-group" style="margin-bottom: 20px">
				<label  class="col-md-3 col-md-offset-1">Email</label>
				<div class="col-md-8">
					<input  readonly = "" type="email" name="email" class="form-control" placeholder="Nhập email" value="<?php echo$user['email'] ?>">
					
				</div>
			</div>
			<div class="form-group" style="margin-bottom: 20px">
				<label  class="col-md-3 col-md-offset-1">Số điện thoại</label>
				<div class="col-md-8">
					<input  readonly = ""  type="number" name="phone" class="form-control" value="<?php echo $user['phone'] ?>">
					
				</div>
				
				
			</div>
			<div class="form-group" style="margin-bottom: 20px">
				<label  class="col-md-3 col-md-offset-1">Địa chỉ</label>
				<div class="col-md-8">
					<input  readonly = "" type="text" name="address" class="form-control" value=" <?php echo$user['address'] ?>">
					
				</div>
				<label  style="margin-top: 30px" class="col-md-3 col-md-offset-1">Số tiền</label>
				<div class="col-md-8" style="margin-top: 20px">
					<input  readonly = ""  type="number" name="total" class="form-control" value="<?php echo$_SESSION['total'] ?>">
					
					
				</div>
				<label  style="margin-top: 30px" class="col-md-3 col-md-offset-1">Ghi chú</label>
				<div class="col-md-8" style="margin-top: 20px">
					<textarea name="note" id="" cols="30" rows="10" class="form-control"></textarea>
					
				</div>
				
				<button type="submit" class="btn btn-primary col-md-3 col-md-offset-5"  style="margin-top: 20px">Xác nhận</button>
				
			</form>
			
		</section>
		
	</div>
	<?php  require_once __DIR__."/layouts/footer.php";  ?>