<?php
?>
<?php
require_once __DIR__."/../../autoload/autoload.php";
$admin = $db->fetchAll("admin");
?>
<?php
require_once __DIR__."/../../layouts/header.php"
?>
<main>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Admin
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
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Level</th>
                            <th>Avatar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt=1; foreach ($admin as $items): ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $items['name'] ?></td>
                            <td><?php echo $items['address'] ?></td>
                            <td><?php echo $items['email'] ?></td>
                            <td><?php echo $items['phone'] ?></td>
                            <td><?php echo $items['status'] ?></td>
                            <td><?php echo $items['level'] ?></td>
                            <td>
                                <img src="<?php echo uploads()?>admin/<?php echo $items['avatar'] ?>" width = "80px" height = "80px">
                                
                            </td>
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