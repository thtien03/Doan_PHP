<?php
require_once('../utils/generateId.php');
header('Content-type: text/html; charset=utf-8');
session_start();

function sanitizeAmount($amount) {
    // Remove any non-numeric characters (commas, periods, spaces, etc.)
    return (int)preg_replace('/[^0-9]/', '', $amount);
}

function createVNPayUrl($orderId, $amount, $orderInfo) {
    $vnp_TmnCode = "RLQNXVXR";
    $vnp_HashSecret = "TT7ON25SM95X9QHCYU586GCQZ5Q0HD81";
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    // Make sure this path exactly matches your server configuration
    $vnp_Returnurl = "http://" . $_SERVER['HTTP_HOST'] . "/php_store/client/payment_vnpay_success.php";
    
    // Clean amount - must be integer
    $vnp_Amount = intval(preg_replace('/[^0-9]/', '', $amount)) * 100;
    
    // Create unique transaction reference
    $vnp_TxnRef = $orderId . "_" . time();
    
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $_SERVER['REMOTE_ADDR'],
        "vnp_Locale" => "vn",
        "vnp_OrderInfo" => $orderInfo,
        "vnp_OrderType" => "other", // Fixed value as per VNPay docs
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef
    );

    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_SecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
    $vnpUrl = $vnp_Url . "?" . $query . 'vnp_SecureHash=' . $vnp_SecureHash;

    error_log("Hash Data: " . $hashdata);
    error_log("Secure Hash: " . $vnp_SecureHash);
    
    return $vnpUrl;
}

if (isset($_SESSION["order_id"]) && isset($_SESSION["total_bill"])) {
    $orderId = $_SESSION["order_id"];
    $amount = $_SESSION["total_bill"];
    $orderInfo = "Thanh toan don hang " . $orderId;

    // Store cart data temporarily
    $_SESSION['temp_cart'] = $_SESSION['cart'];
    
    $vnpUrl = createVNPayUrl($orderId, $amount, $orderInfo);
    header('Location: ' . $vnpUrl);
    exit();
} else {
    echo "Thông tin thanh toán không hợp lệ.";
    error_log("Missing order_id or total_bill in session");
    // Output session data for debugging
    error_log("Session data: " . print_r($_SESSION, true));
}
?>
