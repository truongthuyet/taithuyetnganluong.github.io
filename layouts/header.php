<!DOCTYPE html>
<html>
    <head>
        <title>My Web</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/frontend/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <script  src="<?php echo base_url()?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url()?>public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/frontend/css/style.css">
        
    </head>
    <body>

        <div id="wrapper">
            <!---->
            <!--HEADER-->
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                <a>Welcome!</a><b> Bạn là khách hàng thông thái</b>
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                 <ul class="list-inline pull-right" id="headermenu">
                                         
                                           <?php if(isset($_SESSION['name_user'])): ?>
                                            <li>Xin chào: <?php echo $_SESSION['name_user'] ?></li>
                                            <li>
                                            <a href=""><i class="fa fa-user"></i>Tài khoản <i class="fa fa-caret-down"></i></a>
                                            <ul id="header-submenu">
                                                <li><a href="">Thông tin</a></li>
                                                <li><a href="">Giỏ hàng</a></li>
                                                <li><a href="thoat.php">Thoát</a></li>
                                            </ul>
                                        </li>
                                        <?php else: ?>
                                            <li>
                                            <a href="dang-nhap.php"><i class="fa fa-unlock"></i> Login</a>
                                        </li>
                                         <li>
                                            <a href="dang-ki.php"><i class="fa fa-home"></i> Sign in</a>
                                        </li>
                                        <?php endif; ?>
                                        
                                        
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                  
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label>
                                        <select name="category" class="form-control">
                                            <option> Danh Mục</option>
                                            <?php foreach ($category as $items):  ?>
                                            <option value="<?php echo $items['id'] ?> "><?php  echo $items['name'];?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </label>
                                    <input type="text" name="keywork" placeholder=" Tìm kiếm" class="form-control">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="<?php echo base_url()?>">
                                <img width = "300px" height = " 100px"src="<?php echo base_url()?>public/frontend/images/logo.png ">
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>0394856984</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END HEADER-->
            <!--MENUNAV-->
            <div id="menunav">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="<?php echo base_url() ?>">Trang chủ</a>
                        </div>
                        <!--menu main-->
                        <ul id="menu-main">
                            <li>
                                <a href="">Shop</a>
                            </li>
                            <li>
                                <a href="">Mobile</a>
                            </li>
                            <li>
                                <a href="">Contac</a>
                            </li>
                            <li>
                                <a href="">Blog</a>
                            </li>
                            <li>
                                <a href="">About</a>
                            </li>
                        </ul>
                        <!-- end menu main-->
                        <!--Shopping-->
                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href="../ProjectIT/danh-sach-cart.php"><i class="fa fa-shopping-basket"></i> Giỏ hàng </a>
                            </li>
                        </ul>
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>
            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                            <ul>
                                <li>
                                    
                                    <?php foreach ($category as $item ) : ?>
                                    <li><a href="danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></li>
                                    <?php endforeach;  ?>
                                    
                                </li>
                                
                            </li>
                        </ul>
                    </div>
                   <div class="box-left box-menu">
                    <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mới</h3>
                    <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                    <ul>
                    <?php foreach ($product_new as $item ) : ?>
                            <li class="clearfix">
                                <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                                    <img src="<?php echo uploads()?>product/<?php echo $item['thunbar']?> " class="img-responsive pull-left" width="80" height="80">
                                    <div class="info pull-right">
                                    <p class="name"> <?php echo $item['name']?></p >
                                    <b class="price"> </b><br>
                                    <b class="sale">Giá gốc: <?php echo $item['price']?> đ</b><br>
                                    <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                </div>
                            </a>
                        </li>
                        <?php endforeach;  ?>
        
    </ul>
    <!-- </marquee> -->
</div>
                <div class="box-left box-menu">
                    <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm Hot </h3>
                    <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                    <ul>
                    <?php foreach ($pro as $items ) : ?>
                            <li class="clearfix">
                                <a href="chi-tiet-san-pham.php?id=<?php echo$items['id'] ?>">
                                    <img src="<?php echo uploads()?>product/<?php echo $items['thunbar']?> " class="img-responsive pull-left" width="80" height="80">
                                    <div class="info pull-right">
                                    <p class="name"> <?php echo $items['name']?></p >
                                    <b class="price"> </b><br>
                                    <b class="sale">Giá gốc: <?php echo $items['price']?> đ</b><br>
                                    <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                </div>
                            </a>
                        </li>
                        <?php endforeach;  ?>
        
    </ul>
    <!-- </marquee> -->
</div>
</div>