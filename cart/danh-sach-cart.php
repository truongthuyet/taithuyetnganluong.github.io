<?php
require_once __DIR__."/../autoload/autoload.php";
?>
<?php  require_once __DIR__."/../layouts/header.php";  ?>
	<!-- <?php if(isset($_SESSION['cart'])): ?> -->
<!-- <div class="col-md-9 bor">
	<section class="box-main1">
		<h3 class="tilte- main"><a href=""></a></h3>
		<div class="card-body">
		<div class="table-responsive">
			<table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>STT</th>
						<th>Name</th>
						<th>Hình ảnh</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach($_SESSION['cart'] as $key => $val):?>
					<tr>
						<td><?= $key?></td>
						<td><?= $val['name']?></td>
						<td><?= $val['slg']?></td>
						<td>
							<img src="<?php echo uploads()?>admin/<?php echo $items['avatar'] ?>" width = "80px" height = "80px">
							
						</td>
						<td >
							<a href="edit.php?id=<?php echo $items['id'] ?>"  class="btn btn-info"><i class="fa fa-edit"></i>Sửa</a>
							<a href="delete.php?id=<?php echo $items['id'] ?>" class="btn btn-danger"><i class="fa fa-time"></i>Xóa</a>
						</td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
			<?php  endif; ?>
		</div>
		
	</section>
	
</div> -->
	
<?php  require_once __DIR__."/../layouts/footer.php";  ?>