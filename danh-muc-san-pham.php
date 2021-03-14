<?php
require_once __DIR__."/autoload/autoload.php";
$id  = intval(getInput('id'));
$categoryid = $db->fetchID("category",$id);
$sql = "SELECT * FROM product WHERE category_id = $id";
if(isset($_GET['p']))
{
  $p = $_GET['p'];
}
else
{
  $p = 1;
}
// _debug($categoryid);
$total = count($db->fetchsql($sql));
$product = $db->fetchJones("product",$sql,$total,$p,9,true);
$sotrang = $product['page'];
// _debug($product);
unset($product['page']);
$path = $_SERVER['SCRIPT_NAME'];
// _debug($path);
?>
<?php  require_once __DIR__."/layouts/header.php";  ?>
<div class="col-md-9 bor">
  <section class="box-main1">
    
    <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"><?php echo $categoryid['name'] ?> </a></h3>
    <?php foreach ($product as $items):  ?>
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
  </section>
  <div style="float: right;">
    <nav aria-label="Page navigation example">
      <ul class="pagination float-right">
        <?php for($i =1;$i<=$sotrang;$i++): ?>
        <li class="<?php echo isset($_GET['p']) && $_GET['p'] == $i ? 'active' : ''?>"><a class="page-link" href="<?php echo $path ?>?id=<?php echo $id ?>&&p=<?php echo $i ?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>
        
      </ul>
    </nav>
    
  </div>
  
  
</div>
<?php  require_once __DIR__."/layouts/footer.php";  ?>