<?php
require_once("../entities/storehouse.class.php");

if (!isset($_GET['storehouse_id'])) {
    header("Location: storehouse.php");
    exit;
}

$storehouse_id = $_GET['storehouse_id'];
$storehouse = Storehouse::get_storehouse_by_id($storehouse_id);

if (!$storehouse) {
    header("Location: storehouse.php");
    exit;
}

if (isset($_POST['btnSubmit'])) {
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    
    $result = Storehouse::update_storehouse($storehouse_id, $price, $quantity, $description);
    if ($result) {
        header("Location: storehouse.php");
        exit;
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
                            <h4 class="card-title">Cập nhật thông tin kho</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form method="post">
                                    <div class="form-group">
                                        <label>Giá</label>
                                        <input type="number" name="price" class="form-control" value="<?php echo $storehouse['price']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Số lượng</label>
                                        <input type="number" name="quantity" class="form-control" value="<?php echo $storehouse['quantity']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea name="description" class="form-control"><?php echo $storehouse['description']; ?></textarea>
                                    </div>
                                    <button type="submit" name="btnSubmit" class="btn btn-primary">Cập nhật</button>
                                    <a href="storehouse.php" class="btn btn-secondary">Quay lại</a>
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