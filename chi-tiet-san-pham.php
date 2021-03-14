<?php

require_once __DIR__."/autoload/autoload.php";
$id  = intval(getInput('id'));


/// lay chi tiet san pham
//--/////////////////
$product_id = $db->fetchID("product",$id);
if($product_id > 0)
{
	//
//lay danh muc san pham
$cate =intval($product_id['category_id']) ;
//_debug($cate);
$sql= "SELECT * FROM product WHERE category_id = $cate ORDER BY ID DESC LIMIT 4";
$sql1= "SELECT * FROM category WHERE id = $cate ";

$sanphamkemtheo = $db->fetchsql($sql);
$danhmuc = $db->fetchsql($sql1);

}
else
{
	
	header("location:index.php");exit();
}



?>
<?php  require_once __DIR__."/layouts/header.php";  ?>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0" nonce="K3atrOyj"></script>
	<div class="col-md-9 bor">
	<div id="fb-root"></div>
	
	<section class="box-main1" >
		<div class="col-md-6 text-center">
			<img src="<?php echo uploads()?>/product/<?php echo $product_id['thunbar'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">
			
			<ul class="text-center bor clearfix" id="imgdetail">
				<li>
					<img src="<?php echo uploads()?>/product/<?php echo $product_id['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
				</li>
				<li>
					<img src="<?php echo uploads()?>/product/<?php echo $product_id['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
				</li>
				<li>
					<img src="<?php echo uploads()?>/product/<?php echo $product_id['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
				</li>
				<li>
					<img src="<?php echo uploads()?>/product/<?php echo $product_id['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
				</li>
				
				
			</ul>
		</div>

		<div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
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
			<ul id="right">
				<li><h3> <?php echo $product_id['name']; ?> </h3></li>
				<li><p> </p></li>
				<?php if($product_id['sale'] > 0): ?>
					<li><p style="color: RED; font-size: 25;font-weight: bold;">Khuyến mãi hot: <?php echo $product_id['sale']; ?>%</p></li>
				
					<li><p><strike class="sale"><?php echo formatpc($product_id['price']) ?></strike> <b class="price"><?php echo formatpricesale($product_id['price'],$product_id['sale']) ?></b></li>
			
				<?php else: ?>
					<li><b><?php echo formatpc($product_id['price'])?></b></li>
				 
			<?php endif ?>
				
				<li><a href="them-vao-gio-hang.php?id=<?php echo $product_id['id'] ?>" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Thêm vào giỏ hàng</a></li>
			</ul>
		</div>
	</section>
	<div class="col-md-12" id="tabdetail">
		<div class="row">
			
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Mô tả sản phẩm </a></li>
				<li><a data-toggle="tab" href="#menu1">Đánh giá </a></li>
				<li><a data-toggle="tab" href="#menu2">Facebook </a></li>
				<li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
			</ul>
			<div class="tab-content">
				<div id="home" class="tab-pane fade in active">
					<h3>Nội dung</h3>
					<p><?php echo $product_id['content'] ?></p>
				</div>
				<div id="menu1" class="tab-pane fade">
					<h3> Bình luận </h3>
					<div class="fb-comments" data-href="http://localhost:1337/ProjectIT/chi-tiet-san-pham.php" data-numposts="5" data-width=""></div>
				</div>
				<div id="menu2" class="tab-pane fade">
					<h3>Fanpage</h3>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
				</div>
				<div id="menu3" class="tab-pane fade">
					<h3>Menu 3</h3>
					<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<?php foreach ($danhmuc as $item):  ?>
		 <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"><?php echo $item['name'] ?></a></h3>
		  <?php endforeach ?>
		<?php foreach ($sanphamkemtheo as $items):  ?>
            <div class="col-md-3  item-product bor">
                <a href="chi-tiet-san-pham.php?id=<?php echo $items['id'] ?>">
                    <img src="<?php echo uploads()?>/product/<?php echo $items['thunbar'] ?>" class="" width="100%" height="180">
                </a>
                <div class="info-item">
                    <a href="chi-tiet-san-pham.php?id=<?php echo $items['id'] ?>"><?php echo $items['name'] ?></a>
                    <p><strike class="sale"><?php echo formatpc($items['price']) ?>đ</strike><b class="price"><?php echo formatpricesale($items['price'],$items['sale']) ?></b></p>
                </div>
                <div class="hidenitem">
                    <p><a href=""><i class="fa fa-search"></i></a></p>
                    <p><a href=""><i class="fa fa-heart"></i></a></p>
                    <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                </div>
            </div>
            <?php endforeach ?>
	</div>
</div>
</div>
</body>

<?php  require_once __DIR__."/layouts/footer.php";  ?>