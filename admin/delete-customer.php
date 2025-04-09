<?php require_once("../entities/customer.class.php"); ?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $customer = Customer::findCustomer($id);
        $result = Customer::deleteCustomer($id);
        if($result){
            echo "<script>alert('Xóa thành công');</script>";
            // echo "<script>window.location.href='/TechStorePHP/admin/customer.php';</script>";
            echo "<script>window.location.href='/admin/customer.php';</script>";
        }
        else{
            echo "<script>alert('Xóa thất bại');</script>";
            // echo "<script>window.location.href='/TechStorePHP/admin/customer.php';</script>";
            echo "<script>window.location.href='../admin/customer.php';</script>";
        }
    }