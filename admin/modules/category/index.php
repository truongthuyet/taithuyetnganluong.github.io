<?php
?>
<?php
require_once __DIR__."/../../autoload/autoload.php";
$category = $db->fetchAll("category");
?>
<?php
require_once __DIR__."/../../layouts/header.php"
?>
<main>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Danh Mục
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
                            <th>Images</th>
                            <th>Banner</th>
                            <th>Home</th>
                            <th>Staus</th>
                            <th>Created_at</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt=1; foreach ($category as $items): ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $items['name'] ?></td>
                            <td><?php echo $items['slug'] ?></td>
                            <td><?php echo $items['images'] ?></td>
                            <td><?php echo $items['banner'] ?></td>
                            <td>
                                <a href="home.php?id=<?php echo $items['id'] ?>" class= "btn btn-xs <?php echo $items['home'] == 1 ? 'btn-info':'btn-danger'?>">
                                    <?php echo $items['home']  == 1 ? 'Hiển thị' : 'Không hiển thị'?>
                                    
                                </a>
                                
                                
                            </td>
                            <td><?php echo $items['status'] ?></td>
                            <td><?php echo $items['created_at'] ?></td>
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