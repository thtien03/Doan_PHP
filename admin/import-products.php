<?php require_once("../entities/storehouse.class.php"); 
    require_once("../entities/color.class.php"); 
    require_once('../utils/generateId.php');
    $colors = Color::list_color();
    $id =  GenerateId::generate();
    // if($_GET["product_id"]==null){
    //     header("Location: storehouses.php");
    // }
    if (isset($_POST["btnsubmitaddproduct"])) {
    $product_id = $_GET["product_id"];
        $color_id = $_POST["color_id"];
        $quantity = $_POST["quantity"];
        $price = (int)$_POST["price"];
        $image = $_FILES["image"];
        $description = $_POST["description"];
        $create_at = '';
    //image san pham
        $pname = rand(1000, 10000)."_".$_FILES["image"]["name"];
        $tname = $_FILES["image"]["tmp_name"];

        $uploads_dir = '../client/images/product';
        move_uploaded_file($tname, $uploads_dir.'/'.$pname);
       $storehouse_exist= Storehouse::get_storehouse_exits($product_id,$color_id);
       if($storehouse_exist){
        $result=Storehouse::update_storehouse($storehouse_exist["storehouse_id"],$price,$quantity,$description);
      }else{
        $storehouse = new Storehouse($id, $product_id , $color_id, $price, $quantity, $pname, $description, $create_at);

        $result = $storehouse->import_stohouse();
       
      }
      if (!$result) {
        header("Location: import-products.php?failure");
    } else {
        header("Location: import-products.php?imported");
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
                <?php
                if (isset($_GET["inserted"])) {
                    echo "<h2>Nhập kho thành công</h2>";
                } else if (isset($_GET["failure"])) {
                echo "<h2>Nhập kho thất bại</h2>";
                }
            ?>
                <h3 class="content-header-title"></h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Nhập kho
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form method="post" enctype="multipart/form-data">
                <!-- <section class="textarea-select"> -->
                <div class="row match-height">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Nhập kho</h4>
                            </div>
                            <div class="card-block">
                                <div class="card-body">

                                    <h5 class="mt-2">Màu</h5>
                                    <fieldset class="form-group">
                                        <select class="custom-select" id="customSelect" name="color_id">
                                            <?php 
                                                foreach ( $colors as $item){
                                                echo "<option  value=".$item["color_id"].">".$item["name"]."</option>";
                                                 }
                                            ?>
                                        </select>
                                    </fieldset>
                                    <h5 class="mt-2">Số lượng</h5>
                                    <fieldset class="form-group">
                                        <input type="number" class="form-control" id="basicInput" name="quantity"
                                            value="<?php echo isset($_POST["quantity"]) ? $_POST["quantity"] : "0"; ?>">
                                    </fieldset>
                                    <h5 class="mt-2">Giá</h5>
                                    <fieldset class="form-group">
                                        <input type="number" class="form-control" id="basicInput" name="price"
                                            value="<?php echo isset($_POST["quantity"]) ? $_POST["quantity"] : "0"; ?>">
                                    </fieldset>
                                    <h5 class="mt-2">Mô tả</h5>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" id="basicInput" name="description"
                                            value="<?php echo isset($_POST["description"]) ? $_POST["description"] : ""; ?>">
                                    </fieldset>
                                    <h5 class="mt-2">Ảnh</h5>
                                    <fieldset class="form-group">
                                        <input type="File" name="image">
                                    </fieldset>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="btn btn-primary btn-min-width mr-0 mb-0" type="submit" name="btnsubmitaddproduct">Xác
                    nhận</button>
                <a href="storehouse.php" class="btn btn-secondary btn-min-width mr-0 mb-0"> Hủy</a>
                <!-- </section> -->
            </form>
        </div>
    </div>
</div>


<script>
var customSelect = document.querySelector("#customSelect");
console.log({
    customSelect
})
customSelect.onchange = (e) => {
    console.log(e.target.value);

}

// Match the second div
</script>
<!-- end body -->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include_once("./inc/footer-admin.php"); ?>