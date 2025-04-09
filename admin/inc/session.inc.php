<?php
session_start();
if (!isset($_SESSION["emp_login"])) {
    header("Location: login.php");
    exit();
}
?>
