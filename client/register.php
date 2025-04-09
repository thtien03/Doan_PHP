<?php 
require_once("../entities/customer.class.php"); 
require_once("../utils/generateId.php"); 
session_start();

function validatePhone($phone) {
    // Kiểm tra số điện thoại VN (10 số, bắt đầu bằng 0)
    return preg_match('/^(0)[0-9]{9}$/', $phone);
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if (isset($_POST["btnsubmit"])) {
    $errors = array();
    
    // Get form data
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];
    $name = $_POST["name"];
    $address = $_POST["address"];

    // Server-side validation
    if (!validatePhone($phone)) {
        $errors[] = "Số điện thoại không hợp lệ";
    }
    if (!validateEmail($email)) {
        $errors[] = "Email không hợp lệ";
    }
    if ($password !== $repassword) {
        $errors[] = "Mật khẩu nhập lại không khớp";
    }

    // Check existing user
    $check = Customer::checkRegister($email, $phone);
    if (count($check) > 0) {
        foreach($check as $item) {
            if($item["phone"] == $phone) {
                $errors[] = "Số điện thoại đã được đăng ký";
            }
            if($item["email"] == $email) {
                $errors[] = "Email đã được đăng ký";
            }
        }
    }

    // If no errors, proceed with registration
    if (empty($errors)) {
        $customer_id = GenerateId::generate();
        $birthday = date('Y-m-d H:i:s');
        $gender = 0;
        $hashed_str = md5($password);
        $status = 1;
        $created_at = date('Y-m-d H:i:s');

        $newCustomer = new Customer($customer_id, $name, $phone, $birthday, $gender, $email, $address, $hashed_str, $status, $created_at);
        $result = $newCustomer->createCustomer();
        
        if ($result) {
            $_SESSION["user_login"] = Customer::findCustomerByPhone($phone);
            header("Location:index.php");
            exit;
        } else {
            $errors[] = "Có lỗi xảy ra khi đăng ký!";
        }
    }
    
    if (!empty($errors)) {
        $_SESSION["notification"] = implode("<br>", $errors);
    }
}
?>
<?php include_once("include/header.php"); ?>

<!-- Cart -->
<?php include_once("include/cart.php"); ?>


<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor6 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">

                <div class="flex-w w-full">
                    <div class="size-212 p-t-2">
                        <h1 class="mtext-111 cl2 txt-center p-b-30" style="font-size: 38px;">
                            Đăng Ký
                        </h1>
                        <hr style="border: 2px solid #000">
                    </div>
                </div>
            </div>
            <div class="size-210 bor16 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form method="POST" id="registerForm" novalidate>
                    <?php if (isset($_SESSION["notification"])) : ?>
                        <div class="alert alert-danger">
                            <?php 
                                echo $_SESSION["notification"];
                                unset($_SESSION["notification"]);
                            ?>
                        </div>
                    <?php endif; ?>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name"
                            placeholder="Họ Tên" required>
                        <img class="how-pos4 pointer-none" src="images/icons/icon-user.png" alt="ICON">
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="phone"
                            placeholder="Số điện thoại (VD: 0912345678)" required>
                        <img class="how-pos4 pointer-none" src="images/icons/icon-user.png" alt="ICON">
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="address"
                            placeholder="Địa chỉ" required>
                        <img class="how-pos4 pointer-none" src="images/icons/icon-user.png" alt="ICON">
                    </div>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email"
                            placeholder="Email" required>
                        <img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" 
                               type="password" 
                               name="password"
                               id="password"
                               placeholder="Mật khẩu" 
                               required>
                        <img class="how-pos4 pointer-none" src="images/icons/icon-password.png" alt="ICON">
                    </div>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="repassword"
                            placeholder="Nhập lại mật khẩu" required>
                        <img class="how-pos4 pointer-none" src="images/icons/icon-password.png" alt="ICON">
                    </div>
                    <div class=" m-b-20 how-pos4-parent">
                        <p>Bạn đã có tài khoản? <a href="/techstorephp/client/login.php">Đăng nhập</a></p>
                    </div>
                    <input class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer"
                        type="submit" name="btnsubmit" value="Đăng ký">

                </form>
            </div>


        </div>
    </div>
</section>

<script>
async function validateForm() {
    var password = document.getElementsByName("password")[0].value;
    var repassword = document.getElementsByName("repassword")[0].value;
    var phone = document.getElementsByName("phone")[0].value;
    var email = document.getElementsByName("email")[0].value;

    // Validate phone format
    var phoneRegex = /^(0)[0-9]{9}$/;
    if (!phoneRegex.test(phone)) {
        alert("Số điện thoại không hợp lệ (phải có 10 số và bắt đầu bằng số 0)");
        return false;
    }

    // Validate email format 
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Email không hợp lệ");
        return false;
    }

    // Validate password match
    if (password !== repassword) {
        alert("Mật khẩu nhập lại không khớp!");
        return false;
    }

    // Check if phone/email exists
    try {
        const formData = new FormData();
        formData.append('phone', phone);
        formData.append('email', email);

        const response = await fetch('check_exists.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.text();
        
        if (result !== "OK") {
            alert(result);
            return false;
        }

        // If validation passes, allow browser to save password
        document.getElementById('registerForm').setAttribute('autocomplete', 'on');
        document.getElementById('password').setAttribute('autocomplete', 'new-password');
        return true;

    } catch (error) {
        console.error('Error:', error);
        return false;
    }
}

// Remove this to allow form resubmission when needed
// if (window.history.replaceState) {
//     window.history.replaceState(null, null, window.location.href);
// }

// Remove onsubmit="return validateForm()" from form tag
document.getElementById('registerForm').addEventListener('submit', function(e) {
    // Let the form submit normally - validation happens server-side
    return true;
});
</script>

<!-- Footer -->
<?php include_once("include/footer.php"); ?>