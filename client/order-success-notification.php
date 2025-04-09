<?php require_once("../entities/brand.class.php"); ?>
<?php
   echo "<script>alert('Cảm ơn bạn đã đặt hàng, chúng tôi sẽ liên hệ xác nhận trong vài ngày tới!');</script>";
   echo "<script>window.location.href='index.php';</script>";

   function totalBill()
{
    $total_bill = 0;
    if (isset($_SESSION['cart']) && (is_array($_SESSION['cart']))) {

        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            $total = $_SESSION['cart'][$i][2] * $_SESSION['cart'][$i][3];
            $total_bill += $total;
        }

    }

}





//

// <?php include_once("include/cart.php"); ?>
<?php include_once("include/header.php"); ?>
// ?>