<?php 
require_once __DIR__."/../autoload/autoload.php";
$data = [
    "email" => postInput("email"),
    "password" => postInput("password"),
];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($data['email'] == '')
    {
        $error['email'] = "Mời bạn nhập email";
    }
    if($data['password'] == '')
    {
        $error['password'] = "Mời bạn nhập password";
    }
    if(empty($error))
    {
        $is_check = $db->fetchOne("admin","email = '".$data['email']."' AND password = '".md5($data['password'])."'");
        if($is_check != NULL )
        {
            $_SESSION['admin_name'] = $is_check['name'];
            $_SESSION['admin_id'] = $is_check['id'];
            echo "<script>alert('Đăng nhập thành công');location.href='/ProjectIT/admin/modules/admin'</script>";

        }
        else
        {
            $_SESSION['error'] = "Đăng nhập thất bại";
        }
    }
}

 ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
    body,html {
    background-image: url('https://i.imgur.com/xhiRfL6.jpg');
    height: 100%;
}

#profile-img {
    height:180px;
}
.h-80 {
    height: 80% !important;
}
    
</style>
<div class="container h-80">
<div class="row align-items-center h-100">
    <div class="col-3 mx-auto">
        <div class="text-center">
            <img id="profile-img" class="rounded-circle profile-img-card" src="https://i.imgur.com/6b6psnA.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form  class="form-signin" method="POST" action="">
                
                <input type="email" name="email" id="email" class="form-control form-group" placeholder="Nhập tên đăng nhập" required autofocus>
                <input type="password" name="password" id="password" class="form-control form-group" placeholder="password" required autofocus>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">enter</button>
            </form><!-- /form -->
        </div>
    </div>
</div>
</div>