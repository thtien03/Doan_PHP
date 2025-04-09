<?php
session_start(); // Add this at the top
header('Content-type: text/html; charset=utf-8');
require_once("../entities/orders.class.php");

$vnp_HashSecret = "TT7ON25SM95X9QHCYU586GCQZ5Q0HD81";

if (!empty($_GET)) {
    $vnp_SecureHash = $_GET["vnp_SecureHash"];
    $inputData = array();
    foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
            $inputData[$key] = $value;
        }
    }
    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    
    $hashData = "";
    foreach ($inputData as $key => $value) {
        if (!empty($value)) {
            $hashData .= $key . "=" . urlencode($value) . "&";
        }
    }
    $hashData = rtrim($hashData, "&");
    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

    if ($secureHash === $vnp_SecureHash) {
        if ($_GET['vnp_ResponseCode'] == '00' && $_GET['vnp_TransactionStatus'] == '00') {
            $orderId = explode('_', $_GET['vnp_TxnRef'])[0];
            $amount = $_GET['vnp_Amount'] / 100;
            $result = Orders::paymentOrder($orderId, $amount);
            
            // Clear cart only after successful payment
            if (isset($_SESSION['cart'])) {
                unset($_SESSION['cart']);
            }
            if (isset($_SESSION['total_bill'])) {
                unset($_SESSION['total_bill']);
            }
            if (isset($_SESSION['temp_cart'])) {
                unset($_SESSION['temp_cart']);
            }
            
            $message = "Giao dịch thành công!";
            $status = "success";
        } else {
            // If payment failed, restore cart
            if (isset($_SESSION['temp_cart'])) {
                $_SESSION['cart'] = $_SESSION['temp_cart'];
                unset($_SESSION['temp_cart']);
            }
            $message = "Giao dịch không thành công!";
            $status = "error";
        }
    } else {
        // If verification failed, restore cart
        if (isset($_SESSION['temp_cart'])) {
            $_SESSION['cart'] = $_SESSION['temp_cart'];
            unset($_SESSION['temp_cart']);
        }
        $message = "Chữ ký không hợp lệ!";
        $status = "error";
    }
} else {
    $message = "Không có dữ liệu phản hồi từ VNPay.";
    $status = "error";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment VNPay Status</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" />
    <style>
        .container { padding-top: 50px; }
        .content { 
            display: flex;
            justify-content: space-between;
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .success-ticket {
            text-align: center;
            margin: 20px auto;
        }
        .success-ticket img {
            width: 100px;
            height: 100px;
        }
        .success { color: #28a745; }
        .error { color: #dc3545; }
        .back-button {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .back-button:hover {
            background-color: #0056b3;
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="col-md-12 text-center">
                <?php if ($status == "success"): ?>
                    <div class="success-ticket">
                        <img src="https://cdn-icons-png.flaticon.com/512/7518/7518748.png" alt="Success">
                    </div>
                <?php endif; ?>
                
                <div class="transaction-details">
                    <h3>Thông tin giao dịch</h3>
                    <p>Mã giao dịch: <strong><?php echo isset($_GET['vnp_TransactionNo']) ? $_GET['vnp_TransactionNo'] : ''; ?></strong></p>
                    <p>Số tiền: <strong><?php echo isset($_GET['vnp_Amount']) ? number_format($_GET['vnp_Amount']/100, 0, ',', '.') . ' VNĐ' : ''; ?></strong></p>
                    <p>Nội dung: <strong><?php echo isset($_GET['vnp_OrderInfo']) ? $_GET['vnp_OrderInfo'] : ''; ?></strong></p>
                </div>

                <div class="message-notify <?php echo $status; ?>">
                    <h2><?php echo $message; ?></h2>
                    <?php if ($status == "success"): ?>
                        <p>Đơn hàng của bạn đã thanh toán thành công.</p>
                    <?php endif; ?>
                </div>

                <a href="index.php" class="back-button">
                    <i class="fa fa-home"></i> Về trang chủ
                </a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php if ($status == "success"): ?>
    <script>
        // Auto redirect after 5 seconds
        setTimeout(function() {
            window.location.href = "index.php";
        }, 5000);
    </script>
    <?php endif; ?>
</body>
</html>
