<?php
require_once __DIR__."/autoload/autoload.php";
unset($_SESSION['cart']);
            unset($_SESSION['total']);
            unset($_SESSION['tongtien']);
?>
<?php  require_once __DIR__."/layouts/header.php";  ?>
<div class="col-md-9 bor">
	<section class="box-main1">
		<h3 class="tilte- main"><a href="">Thông báo thanh toán</a></h3>
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
            <a href="index.php" class="btn btn-success">Quay về trang chủ</a>
        </div>
	</section>
	
</div>
<?php  require_once __DIR__."/layouts/footer.php";  ?>