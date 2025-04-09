<?php require_once("../entities/banner.class.php"); ?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $banner = Banner::findBanner($id);
        $result = Banner::deleteBanner($id);
        if($result){
            echo "<script>alert('Xóa thành công');</script>";
            echo "<script>window.location.href='banner.php';</script>";
        }
        else{
            echo "<script>alert('Xóa thất bại');</script>";
            echo "<script>window.location.href='banner.php';</script>";
        }
    }