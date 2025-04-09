<?php
require_once("../entities/customer.class.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    
    $check = Customer::checkRegister($email, $phone);
    
    if (count($check) > 0) {
        foreach($check as $item) {
            if($item["phone"] == $phone) {
                die("Số điện thoại đã được đăng ký");
            }
            if($item["email"] == $email) {
                die("Email đã được đăng ký");
            }
        }
    }
    
    echo "OK";
}
?>

<form method="POST" onsubmit="return validateForm()" autocomplete="off">
</form>