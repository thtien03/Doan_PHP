<?php
require_once("../entities/orders.class.php"); 
require_once("../entities/orderdetail.class.php"); 
require_once("../entities/storehouse.class.php"); 
require_once('../utils/generateId.php');
// tong tien

session_start();
unset($_SESSION['cart']);
unset($_SESSION['total_bill']);
unset($_SESSION['order_id']);

?>



<?php include_once("include/header.php"); ?>

<!-- Cart -->
<?php include_once("include/cart.php"); ?>


<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Thanh toán thành công
        </span>
    </div>
</div>


<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85" method="post">
    <div class="container">

        <div class="row" style="width: 85%;margin-left: 7%;">
            <div class="bill"
                style=" border-radius: 8px;padding: 5px; box-shadow: 5px 10px 8px #888888;background: linear-gradient(90deg, rgba(36,0,0,1) 0%, rgba(121,9,42,1) 32%, rgba(255,74,0,1) 100%);">

                <h1 style="padding: 20px; color: #FFF"> Bạn đã đặt hàng thành công !!!</h1>
                <h3 style="padding: 10px; color: #FFF"> Cảm ơn bạn đã đặt hàng, chúng tôi sẽ liên hệ xác nhận trong vài
                    ngày tới! !!!</h3>


            </div>
        </div>

    </div>
    </div>
</form>

<?php 
 echo '<form method="POST" action="index.php">
    <div class="btnDone" style="width:60%;padding-left: 40%;padding-bottom: 2%;">
        <input class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit" value="Quay về trang chủ"/>
    </div>
  </form>';
?>



<!-- Footer -->
<?php include_once("include/footer.php"); ?>