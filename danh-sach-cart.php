<?php
require_once __DIR__."/autoload/autoload.php";
$SUM =0;


?>
<?php  require_once __DIR__."/layouts/header.php";  ?>
<?php 
if( !isset($_SESSION['cart']) || count($_SESSION['cart']) ==0)
{
	echo "<script>alert('Không có sản phẩm trong giỏ hàng');location.href='index.php'</script>";


}
 
?>
	 <?php if(isset($_SESSION['cart'])): ?>
<div class="col-md-9 bor">
	<section class="box-main1">
		<h3 class="tilte- main"><a href=""></a></h3>
		<div class="card-body">
		<div class="table-responsive">
		<div class="col-md-6">
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
			
        </div>
			<table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>STT</th>
						<th>Name</th>
						<th>Số lượng</th>
						<th>Hình ảnh</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="tbody">
					<?php  $stt = 1; foreach($_SESSION['cart'] as $key => $val):?>
					<tr>
						<td><?php echo $stt ?></td>
						<td><?= $val['name']?></td>
						<td width="80px">
							<input type="number" class="form-control" name="qty" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $val['slg'] ?>">
								
						</td>
						<td>
							<img src="<?php echo uploads()?>/product/<?php echo $val['image'] ?>" width = "80px" height = "80px">
							
						</td>
						<td >
							<a href="#"  class="btn btn-info updatecart" data-key=<?php echo $key; ?>><i class="fa fa-edit"></i>Sửa</a>
							<a href="delete-cart.php?key=<?php echo $key?>" class="btn btn-danger"><i class="fa fa-time"></i>Xóa</a>
						</td>
					</tr>
						
					   <?php $SUM += ($val['price'] * $val['slg']);$_SESSION['tongtien'] = $SUM; ?>  
						
					<?php $stt++; endforeach;?>
				</tbody>
			</table>
			<?php  endif; ?>
		</div>
		
	</section>
<div class="col-md-5 pull-right">
	<ul class="list-group">
		<li class="list-group-item active">Thông tin đơn hàng: </li>
		<li class="list-group-item">Số tiền: 
			<span class="badge">
				<?php echo formatpc($_SESSION['tongtien']);?></li>
			</span>
			
		<li class="list-group-item">Thuế VAT
			<span class="badge">
				5%
			</span>
		 </li>
		<li class="list-group-item">
			Giảm giá
			<span class="badge">
				<?php echo sale($_SESSION['tongtien']); ?>%
			</span>
		</li>
		<li class="list-group-item">Tổng tiền thanh toán:
		<span class="badge">
				<?php $_SESSION['total'] = ($_SESSION['tongtien']+$_SESSION['tongtien']*5/100  - (sale($_SESSION['tongtien'] )/100)*$_SESSION[
					'tongtien']);echo formatpc( $_SESSION['total']);?>
			</span> 
		</li>
	</ul>
		<div  class="col-md-2"	>
		<button class="btn btn-success" type="submit"><a style="color: white" href="thanhtoan.php">Thanh toán </a></button>
	</div>
</div>
	<div class="col-md-3">
		<button  class="btn btn-primary" type="submit" value="Quay lại"><a style="color: white" href="chi-tiet-san-pham.php?id=<?php echo $key ?>" >Quay lại </a></button>
	</div>
	
</div>
	
<?php  require_once __DIR__."/layouts/footer.php";  ?>