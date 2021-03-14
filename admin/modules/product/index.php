<?php
?>
<?php
require_once __DIR__."/../../autoload/autoload.php";
$product = $db->fetchAll("product");
?>
<?php
require_once __DIR__."/../../layouts/header.php"
?>
<main>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Sản phẩm
            <a href="add.php" class="btn btn-info">Thêm mới</a>
        </div>
        <?php
        require_once __DIR__."/../../../partials/notification.php"
        ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Sale</th>
                            <th>thumbar</th>
                            <th>category</th>
                            <th>Content</th>
                            <th>Info</th>
                            <th>Head</th>
                            <th>View</th>
                            <th>Hot</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt=1; foreach ($product as $items): ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $items['name'] ?></td>
                            <td><?php echo $items['slug'] ?></td>
                            
                            <td><?php echo $items['sale'] ?></td>
                            <td>
                                <img src="<?php echo uploads()?>product/<?php echo $items['thunbar'] ?>" width = "80px" height = "80px">
                                
                            </td>
                            <td><?php echo $items['category_id'] ?></td>
                            <td><?php echo $items['content'] ?></td>
                            <td>
                                <ul>
                                    <li><h6> Giá: <?php echo $items['price'] ?></h6></li>
                                    <li><h6> Số lượng: <?php echo $items['number'] ?></h6></li>
                                </ul>
                                
                                
                            </td>
                            <td><?php echo $items['head'] ?></td>
                            <td><?php echo $items['view'] ?></td>
                            <td><?php echo $items['hot'] ?></td>
                            <td >
                                <a href="edit.php?id=<?php echo $items['id'] ?>"  class="btn btn-info"><i class="fa fa-edit"></i>Sửa</a>
                                <a href="delete.php?id=<?php echo $items['id'] ?>" class="btn btn-danger"><i class="fa fa-time"></i>Xóa</a>
                            </td>
                        </tr>
                        
                        <?php $stt++; endforeach ?>
                        
                        
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
</main>
<?php
require_once __DIR__."/../../layouts/footer.php";
?>