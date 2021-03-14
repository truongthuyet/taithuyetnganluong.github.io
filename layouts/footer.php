<div class="container">
    <div class="col-md-4 bottom-content">
        <a href=""><img src="<?php echo base_url()?>public/frontend/images/free-shipping.png"></a>
    </div>
    <div class="col-md-4 bottom-content">
        <a href=""><img src="<?php echo base_url()?>public/frontend/images/guaranteed.png"></a>
    </div>
    <div class="col-md-4 bottom-content">
        <a href=""><img src="<?php echo base_url()?>public/frontend/images/deal.png"></a>
    </div>
</div>
<div class="container-pluid">
    <section id="footer">
        <div class="container">
            <div class="col-md-3" id="shareicon">
                <ul>
                    <li>
                        <a href="https://facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="https://google.com" target="_blank"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li>
                        <a href="https://youtube.com" target="_blank"><i class="fa fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8" id="title-block">
                <div class="pull-left">
                    
                </div>
                <div class="pull-right">
                    
                </div>
            </div>
            
        </div>
    </section>
    <section id="footer-button">
        <div class="container-pluid">
            <div class="container">
                <div class="col-md-6" id="ft-about">
                    <h3 class="tittle-footer">TIỆN ÍCH</h3>
                    
                    <p> 
                        Mua hàng thanh toán Online. 
                        Mua hàng trả góp Online. 
                        Huỷ giao dịch và đổi trả. 
                        Tra thông tin đơn hàng. 
                        Tra điểm Smember. 
                        Tra thông tin bảo hành. 
                        Trung tâm bảo hành chính hãng. 
                        Quy định về việc sao lưu dữ liệu. 
                        Chính sách Bảo hành. 
                        Chính sách sử dụng. 
                        Chính sách bảo mật. 
                        Liên hệ hợp tác kinh doanh. 
                        Đơn Doanh nghiệp. 
                        Ưu đãi từ đối tác. 
                        Tuyển dụng. 
                        Tin công nghệ Sforum. 
                    </p>
                </div>
                <div class="col-md-3 box-footer">
                    <h3 class="tittle-footer">my accout</h3>
                    <ul>
                        <li>
                            <i class="fa fa-angle-double-right"></i>
                            <a href="<?php echo base_url()?>gioi-thieu.php" target="_blank"><i></i> Giới thiệu</a>
                        </li>
                        <li>
                            <i class="fa fa-angle-double-right"></i>
                            <a href=""><i></i> Liên hệ </a>
                        </li>
                        <li>
                            <i class="fa fa-angle-double-right"></i>
                            <a href=""><i></i>  Contact </a>
                        </li>
                        <li>
                            <i class="fa fa-angle-double-right"></i>
                            <a href=""><i></i> My Account</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3" id="footer-support">
                    <h3 class="tittle-footer"> Liên hệ</h3>
                    <ul>
                        <li>
                            
                            <p><i class="fa fa-home" style="font-size: 16px;padding-right: 5px;"></i> Thanh Tâm - Thanh Liêm - Hà Nam </p>
                            <p><i class="sp-ic fa fa-mobile" style="font-size: 22px;padding-right: 5px;"></i>0336376262</p>
                            <p><i class="sp-ic fa fa-envelope" style="font-size: 13px;padding-right: 5px;"></i>truongtaithuyet99@gmail.com</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="ft-bottom">
        <p class="text-center">Copyright © 2021 . Design by Trương Tài Thuyết</p>
    </section>
</div>
</div>
</div>
</div>
</div>
<script  src="<?php echo base_url()?>public/frontend/js/slick.min.js"></script>
</body>

</html>
<script type="text/javascript">
$(function() {
$hidenitem = $(".hidenitem");
$itemproduct = $(".item-product");
$itemproduct.hover(function(){
$(this).children(".hidenitem").show(100);
},function(){
$hidenitem.hide(500);
})
})

$(function(){
    $updatecart = $(".updatecart");
    $updatecart.click(function(e)
    {
        e.prevenDefault();
        $qty = $(this).parents("#tbody").find("#qty").val();
        $key  = $(this).attr("data-key");
        $.ajax({
            url : 'cap-nhat-gio-hang.php',
            type: 'GET',
            data: {'qty':$qty,'key':key},
            success:function(data)
            {
                if(data == 1)
                {
                    alert("Cập nhật giỏ hàng thành công");
                    location.href="danh-sach-cart.php";
                }
            }   

        });
    })
})
</script>