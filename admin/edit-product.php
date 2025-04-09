<?php
require_once("../entities/brand.class.php");
require_once("../entities/category.class.php");
require_once("../entities/product.class.php");
require_once("../config/db.class.php");

if (isset($_GET["product_id"])) {
    $product_id = $_GET['product_id'];
    $product = Product::findProduct($product_id);
    $brand = Brand::list_brand();
    $category = Category::list_category();
    
    // Get current image from storehouse
    $db = new Db();
    $sql = "SELECT image FROM storehouse WHERE product_id = '$product_id'";
    $result = $db->select_to_array($sql);
    $current_image = !empty($result) ? $result[0]['image'] : '';
}

if(isset($_POST["update"])){
    $product_id = $_GET["product_id"];
    $category_id = $_POST["category_id"];
    $brand_id = $_POST["brand_id"];
    $name = $_POST["name"];
    
    // Handle image update
    if(isset($_FILES['product_image']) && $_FILES['product_image']['error'] === 0) {
        // New image uploaded
        $target_dir = "../client/images/product/";
        $image_extension = pathinfo($_FILES["product_image"]["name"], PATHINFO_EXTENSION);
        $image = "product_" . time() . "." . $image_extension;
        $target_file = $target_dir . $image;
        
        if(move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            // Update image in storehouse
            $sql = "UPDATE storehouse SET image = ? WHERE product_id = ?";
            $db = new Db();
            $params = array($image, $product_id);
            $db->execute($sql, $params);
        }
    }

    // Update product information
    $result = Product::updateProduct($product_id, $category_id, $brand_id, $name);
    if ($result) {
        echo "<script>alert('Update thành công');</script>";
        echo "<script>window.location.href='../admin/product.php';</script>";
    } else {
        echo "<script>alert('Update thất bại');</script>";
        echo "<script>window.location.href='../admin/product.php';</script>";
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
                            <li class="breadcrumb-item active">Cập nhật sản phẩm
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form action="edit-product.php?product_id=<?php echo $_GET["product_id"]; ?>" method="post" enctype="multipart/form-data">
                <!-- <section class="textarea-select"> -->
                <div class="row match-height">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Cập nhật sản phấm</h4>
                            </div>
                            <div class="card-block">
                                <div class="card-body">
                                <h5 class="mt-2">Thương hiệu</h5>
                                    <fieldset class="form-group" class="form-control" id="basicInput">
                                        <select class="custom-select" id="customSelect" name="brand_id" required>
                                            <?php foreach ($brand as $item): ?>
                                                <option value="<?php echo $item["brand_id"]; ?>" 
                                                    <?php echo ($item["brand_id"] == $product["brand_id"]) ? "selected" : ""; ?>>
                                                    <?php echo $item["name"]; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </fieldset>
                                <h5 class="mt-2">Loại sản phẩm</h5>
                                    <fieldset class="form-group" class="form-control" id="basicInput">
                                        <select class="custom-select" id="customSelect" name="category_id" required>
                                            <?php foreach ($category as $item): ?>
                                                <option value="<?php echo $item["category_id"]; ?>" 
                                                    <?php echo ($item["category_id"] == $product["category_id"]) ? "selected" : ""; ?>>
                                                    <?php echo $item["name"]; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </fieldset>
                                    <h5 class="mt-2">Tên</h5>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" id="basicInput" name="name"
                                        value="<?php if(isset($product['name'])) echo($product['name']);?>">
                                    </fieldset>
                                    <h5 class="mt-2">Hình ảnh sản phẩm</h5>
                                    <fieldset class="form-group">
                                        <?php 
                                        if(!empty($current_image)) {
                                            $imagePath = "../client/images/product/" . $current_image;
                                            if(file_exists($imagePath)): ?>
                                                <img src="<?php echo $imagePath; ?>" 
                                                     alt="Current product image" 
                                                     style="max-width: 200px; margin-bottom: 10px;">
                                                <br>
                                                <small class="text-muted">Hình ảnh hiện tại</small>
                                                <br>
                                            <?php endif;
                                        } ?>
                                        <input type="file" class="form-control" name="product_image" accept="image/*">
                                        <small class="text-muted">Để trống nếu muốn giữ ảnh hiện tại</small>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                <button class="btn btn-primary btn-min-width mr-0 mb-0" type="submit" name="update">Xác
                        nhận</button>
                <a href="/TechStorePHP/admin/product.php" class="btn btn-secondary btn-min-width mr-0 mb-0">Hủy</a>
                <!-- </section> -->
            </form>
        </div>
    </div>
</div>
<!-- end body -->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include_once("./inc/footer-admin.php"); ?>