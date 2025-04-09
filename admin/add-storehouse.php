<?php
require_once("../entities/storehouse.class.php");
require_once("../entities/color.class.php");

$colors = Color::list_color();
$product_id = $_GET["product_id"] ?? null;

if (!$product_id) {
    header("Location: product.php");
    exit;
}

if (isset($_POST["btnsubmit"])) {
    $storehouse_id = "";
    $color_id = $_POST["color_id"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $description = $_POST["description"];
    
    // Handle image upload
    $image = $_FILES["image"]["name"];
    $target_dir = "../client/images/product/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $newStorehouse = new Storehouse($storehouse_id, $product_id, $color_id, $price, $quantity, $image, $description, null);
    $result = $newStorehouse->import_stohouse();
    
    if (!$result) {
        header("Location: add-storehouse.php?product_id=$product_id&failure");
    } else {
        header("Location: storehouse.php?inserted");
    }
}
?>

<?php include_once("./inc/header-admin.php"); ?>
<?php include_once("./inc/navbar-admin.php"); ?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thêm thông tin kho</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Màu sắc</label>
                                        <select class="form-control" name="color_id" required>
                                            <?php foreach($colors as $color): ?>
                                                <option value="<?php echo $color['color_id']; ?>">
                                                    <?php echo $color['name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Giá</label>
                                        <input type="number" name="price" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Số lượng</label>
                                        <input type="number" name="quantity" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" name="image" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>
                                    <button type="submit" name="btnsubmit" class="btn btn-primary">Thêm mới</button>
                                    <a href="product.php" class="btn btn-secondary">Quay lại</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("./inc/footer-admin.php"); ?>
