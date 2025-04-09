<?php
header('Content-type: text/html; charset=utf-8');
require_once("../entities/orders.class.php"); 



$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa'; //Put your secret key in there

if (!empty($_GET)) {
    $partnerCode = $_GET["partnerCode"];
    $orderId = $_GET["orderId"];
    $message = $_GET["message"];
    $transId = $_GET["transId"];
    $orderInfo = $_GET["orderInfo"];
    $amount = $_GET["amount"];
    $responseTime = $_GET["responseTime"];
    $requestId = $_GET["requestId"];
    $extraData = $_GET["extraData"];
    $payType = $_GET["payType"];
    $orderType = $_GET["orderType"];
    $extraData = $_GET["extraData"];
    $m2signature = $_GET["signature"]; //MoMo signature
    $result = Orders::paymentOrder($orderId,  0);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Payment Momo Success</title>
    <script type="text/javascript" src="./statics/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="./statics/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="./statics/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript"
        src="./statics/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="./statics/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="./css/momo.css">
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="left">
                <div class="left__content">
                    <div class="item supplier">
                        <p>Nhà cung cấp</p>
                        <span>TechStore</span>
                    </div>
                    <div class="item amount">
                        <p>Số tiền</p>
                        <span><?php echo $amount; ?></span>
                    </div>
                    <div class="item invoice">
                        <p>Đơn hàng</p>
                        <span><?php echo $orderId; ?></span>
                    </div>
                    <div class="item message">
                        <p>Tin nhắn</p>
                        <span><?php echo $message; ?></span>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="logos">
                    <div class="logo">
                        <svg viewBox="6.7169296377637995 5.309796557160162 81.4130703622362 74.62020344283985"
                            xmlns="http://www.w3.org/2000/svg" width="2500" height="2320">
                            <rect fill="#a50064" height="87" rx="12.06" width="96" />
                            <path
                                d="M71 7.07c-9.45 0-17.11 7.36-17.11 16.43S61.57 39.93 71 39.93s17.13-7.36 17.13-16.43S80.47 7.07 71 7.07zm0 23.44a7.14 7.14 0 0 1-7.27-7 7.28 7.28 0 0 1 14.54 0 7.14 7.14 0 0 1-7.27 7zm-22-11.1V40h-9.88V19.31a2.9 2.9 0 0 0-5.8 0V40h-9.84V19.31a2.9 2.9 0 0 0-5.8 0V40H7.87V19.41A12.62 12.62 0 0 1 20.72 7.07a13.11 13.11 0 0 1 7.7 2.48 13.14 13.14 0 0 1 7.69-2.48A12.63 12.63 0 0 1 49 19.41zM71 47c-9.45 0-17.11 7.35-17.11 16.43S61.57 79.89 71 79.89s17.11-7.35 17.11-16.42S80.47 47 71 47zm0 23.44a7 7 0 1 1 7.27-7A7.14 7.14 0 0 1 71 70.48zM49 59.38v20.55h-9.88V59.27a2.9 2.9 0 0 0-5.8 0v20.66h-9.84V59.27a2.9 2.9 0 0 0-5.8 0v20.66H7.87V59.38A12.61 12.61 0 0 1 20.72 47a13.17 13.17 0 0 1 7.7 2.47A13.11 13.11 0 0 1 36.11 47 12.62 12.62 0 0 1 49 59.38z"
                                fill="#fff" />
                        </svg>

                    </div>
                    <div class="logo">
                        <svg viewBox="6.7169296377637995 5.309796557160162 81.4130703622362 74.62020344283985"
                            xmlns="http://www.w3.org/2000/svg" width="2500" height="2320">
                            <rect fill="#a50064" height="87" rx="12.06" width="96" />
                            <path
                                d="M71 7.07c-9.45 0-17.11 7.36-17.11 16.43S61.57 39.93 71 39.93s17.13-7.36 17.13-16.43S80.47 7.07 71 7.07zm0 23.44a7.14 7.14 0 0 1-7.27-7 7.28 7.28 0 0 1 14.54 0 7.14 7.14 0 0 1-7.27 7zm-22-11.1V40h-9.88V19.31a2.9 2.9 0 0 0-5.8 0V40h-9.84V19.31a2.9 2.9 0 0 0-5.8 0V40H7.87V19.41A12.62 12.62 0 0 1 20.72 7.07a13.11 13.11 0 0 1 7.7 2.48 13.14 13.14 0 0 1 7.69-2.48A12.63 12.63 0 0 1 49 19.41zM71 47c-9.45 0-17.11 7.35-17.11 16.43S61.57 79.89 71 79.89s17.11-7.35 17.11-16.42S80.47 47 71 47zm0 23.44a7 7 0 1 1 7.27-7A7.14 7.14 0 0 1 71 70.48zM49 59.38v20.55h-9.88V59.27a2.9 2.9 0 0 0-5.8 0v20.66h-9.84V59.27a2.9 2.9 0 0 0-5.8 0v20.66H7.87V59.38A12.61 12.61 0 0 1 20.72 47a13.17 13.17 0 0 1 7.7 2.47A13.11 13.11 0 0 1 36.11 47 12.62 12.62 0 0 1 49 59.38z"
                                fill="#fff" />
                        </svg>

                    </div>

                </div>
                <div class="image-success">
                    <img src="https://tse1.mm.bing.net/th?id=OIP.c0fNDjlEjTOz22FQl4cfLwAAAA&pid=Api&P=0" alt="">
                </div>
                <div class="message-notify">
                    <span class="title">
                        Đơn hàng của bạn đã thanh toán thành công. </br> Vui lòng <b>KHÔNG</b> thoát khỏi trình duyệt.
                    </span>
                </div>
            </div>
        </div>

    </div>
</body>

</html>