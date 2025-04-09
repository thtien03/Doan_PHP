<?php
require_once("../entities/orders.class.php"); 
require_once("../entities/orderdetail.class.php"); 
require_once("../entities/storehouse.class.php"); 
require_once('../utils/generateId.php');

session_start();

function totalBill() {
    $total_bill = 0;
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            $total = $_SESSION['cart'][$i][2] * $_SESSION['cart'][$i][3];
            $total_bill += $total;
        }
    }
}

function showCart() {
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        $total_bill = 0;
        $_SESSION["total_bill"] = 0;
        
        // Output and calculate for each item
        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            // Ensure price is a clean number without formatting
            $price = (int)preg_replace('/[^0-9]/', '', $_SESSION['cart'][$i][2]);
            $quantity = (int)$_SESSION['cart'][$i][3];
            $total = $price * $quantity;
            $total_bill += $total;
            $_SESSION["total_bill"] = $total_bill; // Store raw number

            // Debugging: Log each item's details
            error_log("Cart Item $i: Price = " . $_SESSION['cart'][$i][2] . ", Quantity = " . $_SESSION['cart'][$i][3] . ", Total = $total");
            
            echo '
            <tr class="table-product" style="padding: 10px;height: 60px;">
                <td class="column-1" style="color:#fff;">'.($i+1).'</td> 
                <td class="column-2">'.$_SESSION['cart'][$i][1].' '.$_SESSION['cart'][$i][5].'</td>
                <td class="column-3">'.$_SESSION['cart'][$i][3].'</td> 
                <td class="column-4" style="width: 200px;">'.number_format($_SESSION['cart'][$i][2], 0, '', ',').' VNĐ'.'</td>
                <td class="column-5" style="width: 200px;">'.number_format($total, 0, '', ',').' VNĐ'.'</td>
                <td class="column-6"></td>
            </tr>';
        }

        // Debugging: Log the total bill
        error_log("Total Bill: " . $_SESSION["total_bill"]);

        echo '
        <tr class="table_head">
            <th class="column-1"> </th>
            <th class="column-2"> </th>
            <th class="column-3"> </th>
            <th class="column-4">Tổng tiền </th>
            <th class="column-5" style="width: 200px;">'.number_format($total_bill, 0, '', ',').' VNĐ'.'</th>
        </tr>';
    } else {
        echo '
        <div>
            <h3>Giỏ hàng trống</h3>
        </div>';
    }
}

if (isset($_POST['accept']) && $_POST['accept']) {
    echo '<div>
        <h1>Thông tin hoá đơn</h1>
        <h4></h4>
    </div>';

    $id = $_POST['id'];
    // ...existing code...
}
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
            VAT Invoice
        </span>
    </div>
</div>

<!-- Shoping Cart -->
<form class="bg0 p-t-75 " method="post">
    <div class="container">
        <div class="row" style="width: 85%;margin-left: 7%;">
            <div class="bill" style="border: 2px solid #ebedef; border-radius: 8px; padding: 5px; box-shadow: 5px 10px 8px #888888; margin-bottom: 30px; width: 100%;">
                <div class="VAT" style="display: block; text-align: center; padding-left: 5%; padding-top: 30px; padding-bottom: 40px;">
                    <h2>Thông tin sản phẩm</h2>
                </div>
                <div class="wrap-table-shopping-cart">
                    <table class="table-shopping-cart" style="color: #fff; margin-bottom: 50px;">
                        <tr class="table_head">
                            <th class="column-1">STT</th>
                            <th class="column-2">Sản phẩm</th>
                            <th class="column-3">Số lượng</th>
                            <th class="column-4">Giá</th>
                            <th class="column-5">Thành tiền</th>
                        </tr>
                        <?php showCart(); ?>
                    </table>
                </div>
            </div>
            <div class="bill" style="border: 2px solid #ebedef; border-radius: 8px; padding: 5px; box-shadow: 5px 10px 8px #888888; width: 100%;">
                <div class="col-lg-10 m-lr-auto m-b-50">
                    <div class="VAT" style="display: block; text-align: center; padding-left: 5%; padding-top: 30px; padding-bottom: 40px;">
                        <h2>Thông tin khách hàng</h2>
                    </div>
                    <div class="InfoCustomer" style="display: block; padding-left: 25%; color: black;">
                        <h6 style="display: flex; padding: 3px;">Họ tên khách hàng: <input style="margin-left: 20px" value="<?php if (isset($_SESSION["user_login"])) echo $_SESSION["user_login"]["name"]; ?>"></h6>
                        <h6 style="display: flex; padding: 3px;">Địa chỉ: <input style="margin-left: 20px" value="<?php if (isset($_SESSION["user_login"])) echo $_SESSION["user_login"]["address"]; ?>"></h6>
                        <h6 style="display: flex; padding: 3px;">Sđt liên hệ: <input style="margin-left: 20px" value="<?php if (isset($_SESSION["user_login"])) echo $_SESSION["user_login"]["phone"]; ?>"></h6>
                        <h6 style="display: flex; padding: 3px;">Email: <input style="margin-left: 20px" value="<?php if (isset($_SESSION["user_login"])) echo $_SESSION["user_login"]["email"]; ?>"></h6>
                        <h6 style="display: flex; padding: 3px;">Ngày xác nhận đơn hàng:
                            <p style="margin-left: 20px">
                                <script>
                                    var today = new Date();
                                    var dd = String(today.getDate()).padStart(2, '0');
                                    var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
                                    var yyyy = today.getFullYear();
                                    today = ' ' + dd + '/' + mm + '/' + yyyy;
                                    document.write(today);
                                </script>
                            </p>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="btn-bottom" style="display: flex; margin-left: 25%; margin-top: 30px; margin-bottom: 40px;">
    <?php 
    echo '<form method="POST" action="order_done.php">
        <div class="btnDone" style="width:300px; padding-left: 40%; padding-bottom: 2%;">
            <input class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit" value="Xác nhận"/>
        </div>
    </form>';
    ?>
    <?php 
    echo '<form method="POST" action="thanhtoan_momo.php" method="POST" target="_blank" enctype="application/x-www-form-urlencoded">
        <div class="btnDone" style="width:300px; padding-left: 10px; padding-bottom: 2%;">
            <input class="flex-c-m stext-101 cl0 size-116 bg2 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit" name="payUrl" value="Thanh Toán VNPay"/>
        </div>
    </form>';
    ?>
</div>

<!-- Footer -->
<?php include_once("include/footer.php"); ?>