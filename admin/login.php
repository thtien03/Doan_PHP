<?php
require_once("../entities/employee.class.php");
session_start();
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $encryptPassword = md5($password);
    $emp = Employee::checkAccount($email, $encryptPassword);
    if ($emp > 0) {
        $_SESSION["emp_login"] = $emp;
        header("location:dashboard.php");
    } else {
        $_SESSION["notification"] = "Tài khoản hoặc mật khẩu không đúng!";
        header("location:login.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            background: linear-gradient(45deg, #1a2980, #26d0ce);
        }
        .wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }
        #formContent {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .logo-head {
            max-width: 120px;
            margin-bottom: 25px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            height: 45px;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px 15px;
        }
        .btn-login {
            background: #1a2980;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            width: 100%;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background: #26d0ce;
            transform: translateY(-2px);
        }
        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div id="formContent">
            <div class="text-center">
                <img class="logo-head" src="theme-assets/images/logo/image.png" alt="Logo">
                <h4 class="mb-4">Admin Login</h4>
            </div>

            <?php if(isset($_SESSION["notification"])): ?>
                <div class="alert alert-danger">
                    <?php 
                        echo $_SESSION["notification"];
                        unset($_SESSION["notification"]);
                    ?>
                </div>
            <?php endif; ?>

            <form method="post">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" 
                           placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" 
                           placeholder="Password" required>
                </div>
                <button type="submit" name="submit" class="btn btn-login">
                    Đăng nhập
                </button>
            </form>
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>