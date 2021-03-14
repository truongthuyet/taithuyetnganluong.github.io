<?php
require_once __DIR__."/autoload/autoload.php";

$sqlHomecate = "SELECT   name , id FROM category WHERE home = 1 ORDER BY update_at ";
$category_home = $db->fetchsql($sqlHomecate);
// _debug($category_home);
$data = [];
foreach ($category_home as $item )
{
$cateID = intval($item['id']);
// _debug($cateID);
$sql = "SELECT * FROM product WHERE category_id = $cateID";
$producthome = $db->fetchsql($sql);
// _debug($producthome);
$data[$item['name']] = $producthome;

}
// _debug($data);
?>
<?php
require_once __DIR__."/layouts/header.php";
?>
<!--ENDMENUNAV-->

<div class="col-md-9 bor">
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0" nonce="Y8AJOHzV"></script>

    <section id="slide" class="text-center" >
        <img src="<?php echo base_url()?>public/frontend/images/main-logo.png" class="img-thumbnail">
    </section>
    <section class="box-main1">
        <?php foreach ($data as $key => $value):  ?>
        <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"><?php echo $key ?> </a></h3>
        <div class="showitem">
            <?php foreach ($value as $items):  ?>
            <div class="col-md-3  item-product bor">
                <a href="chi-tiet-san-pham.php?id=<?php echo $items['id'] ?>">
                    <img src="<?php echo uploads()?>/product/<?php echo $items['thunbar'] ?>" class="" width="100%" height="180">
                </a>
                <div class="info-item">
                    <a href="chi-tiet-san-pham.php?id=<?php echo $items['id'] ?>"><?php echo $items['name'] ?></a>
                    <p><strike class="sale"><?php echo formatpc($items['price']) ?>đ</strike><b class="price"><?php echo formatpricesale($items['price'],$items['sale']) ?></b></p>
                </div>
                <div class="hidenitem">
                    <p><a href="chi-tiet-san-pham.php?id=<?php echo $items['id'] ?>"><i class="fa fa-search"></i></a></p>
                    <p><a href=""><i class="fa fa-heart"></i></a></p>
                    <p><a href="them-vao-gio-hang.php?id=<?php echo $items['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <?php endforeach ?>
        <div style="float: right;" class="float-right">
            <nav aria-label="Page navigation example">
                <ul class="pagination float-right">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
            
            
        </div>
        
    </section>
    
</div>
</div>



<?php
require_once __DIR__."/layouts/footer.php";
?>
