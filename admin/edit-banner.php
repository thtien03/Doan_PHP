<?php require_once("../entities/banner.class.php"); 
if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $banner = Banner::findBanner($id);
}

if(isset($_POST["update"])){
    $id = $_GET["id"];
    $caption = $_POST["caption"];
    $content = $_POST["content"];
    
    // Handle photo upload
    if(isset($_FILES['banner_image']) && $_FILES['banner_image']['error'] === 0) {
        // New photo uploaded
        $target_dir = "../client/images/";
        $image_extension = pathinfo($_FILES["banner_image"]["name"], PATHINFO_EXTENSION);
        $photo = "slide" . time() . "." . $image_extension;
        $target_file = $target_dir . $photo;
        
        if(move_uploaded_file($_FILES["banner_image"]["tmp_name"], $target_file)) {
            // New photo uploaded successfully
        } else {
            // Upload failed, keep existing photo
            $photo = $banner['photo'];
        }
    } else {
        // No new photo uploaded, keep existing photo
        $photo = $banner['photo'];
    }

    $status = $banner['status']; // Keep existing status
    $create_at = $banner['create_at']; // Keep existing create_at

    $result = Banner::updateBanner($id, $caption, $content, $photo, $status, $create_at);
    if ($result) {
        echo "<script>alert('Update thành công');</script>";
        echo "<script>window.location.href='../admin/banner.php';</script>";
    } else {
        echo "<script>alert('Update thất bại');</script>";
        echo "<script>window.location.href='../admin/banner.php';</script>";
    }
}
?>


<!-- Header -->
<?php include_once("./inc/header-admin.php"); ?>
<!-- Navbar -->
<?php include_once("./inc/navbar-admin.php"); ?>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- body -->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title"></h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Cập nhật banner
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form action="edit-banner.php?id=<?php echo $_GET["id"]; ?>" method="post" enctype="multipart/form-data">
                <!-- <section class="textarea-select"> -->
                <div class="row match-height">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Cập nhật banner</h4>
                            </div>
                            <div class="card-block">
                                <div class="card-body">
                                    <h5 class="mt-2">Tiêu đề</h5>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" id="basicInput" name="caption"
                                        value="<?php if(isset($banner['caption'])) echo($banner['caption']);?>">
                                    </fieldset>
                                    <h5 class="mt-2">Nội dung</h5>
                                    <fieldset class="form-group">
                                        <input class="form-control" id="basicTextarea" rows="3"  type="text" name="content"
                                        value="<?php if(isset($banner['content'])) echo($banner['content']);?>"></input>
                                    </fieldset>      
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-block">
                                <div class="card-body">
                                    <h5 class="mt-2">Ảnh</h5>
                                    <fieldset class="form-group">
                                        <?php if(isset($banner['photo']) && !empty($banner['photo'])): ?>
                                            <img src="../client/images/<?php echo $banner['photo']; ?>" 
                                                 alt="Current banner"
                                                 style="max-width: 200px; margin-bottom: 10px;">
                                            <br>
                                        <?php endif; ?>
                                        <input type="file" class="form-control" name="banner_image" accept="image/*">
                                        <small class="text-muted">Để trống nếu muốn giữ ảnh hiện tại</small>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-min-width mr-0 mb-0" type="submit" name="update">Xác
                    nhận</button>
                <a href="#"> <button class="btn btn-secondary btn-min-width mr-0 mb-0">Hủy</button></a>
                <!-- </section> -->
            </form>
        </div>
    </div>
</div>
<!-- end body -->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include_once("./inc/footer-admin.php"); ?>