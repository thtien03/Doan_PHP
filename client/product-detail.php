<?php require_once("../entities/product.class.php");
require_once("../entities/comment.class.php");
require_once("../entities/orderdetail.class.php");
session_start();

$canComment = false;

if (isset($_GET["product_id"])) {
    $product_id = $_GET['product_id'];

    $product = Product::findInfoProductToShowProductPage($product_id);
    
    // Get comments for this product
    $comments = Comment::getCommentsWithCustomerNames($product_id);
    
    // Check if user can comment (has purchased the product)
    if(isset($_SESSION["user_login"])) {
        $customer_id = $_SESSION["user_login"]["customer_id"];
        $canComment = Orderdetail::hasCustomerPurchasedProduct($customer_id, $product_id);
    }
}

// Handle comment submission
if(isset($_POST['btnComment'])) {
    if(!isset($_SESSION["user_login"])) {
        echo "<script>alert('Vui lòng đăng nhập để bình luận!')</script>";
    } else {
        $customer_id = $_SESSION["user_login"]["customer_id"];
        $product_id = $_GET['product_id'];
        
        // Check if user has purchased this product
        if(!Orderdetail::hasCustomerPurchasedProduct($customer_id, $product_id)) {
            echo "<script>alert('Bạn cần phải mua sản phẩm này trước khi bình luận!')</script>";
        } else {
            $content = $_POST['review'];
            
            $comment = new Comment($customer_id, $product_id, $content, null);
            $result = $comment->createComment();
            
            if($result) {
                echo "<script>alert('Bình luận thành công!')</script>";
                // Refresh comments
                $comments = Comment::getCommentsWithCustomerNames($product_id);
            } else {
                echo "<script>alert('Bình luận thất bại!')</script>";
            }
        }
    }
}
?>
<!-- Header -->
<?php include_once("include/header.php"); ?>

<!-- Cart -->



<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="product.php" class="stext-109 cl8 hov-cl1 trans-04">
            Sản phẩm
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            <?php echo $product["product_name"]; ?>
        </span>
    </div>
</div>

<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">


                        <div class="slick3 gallery-lb">
                            <div class="item-slick3" data-thumb="images/product/<?php echo $product["image"]; ?>">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="images/product/<?php echo $product["image"]; ?>" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                        href="images/product/<?php echo $product["image"]; ?>">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        <?php echo $product["product_name"]; ?>
                    </h4>
                    <span class="mtext-106 cl2">
                        <?php echo number_format($product["price"], 0, '', ','); ?> VNĐ
                    </span>

                    <p class="stext-102 cl3 p-t-23">
                        Thương hiệu: <?php echo $product["brand_name"]; ?>
                    </p>
                    <p class="stext-102 cl3 p-t-23">
                        Màu sắc: <?php echo $product["color_name"]; ?>
                    </p>

                    <!--  -->
                    <div class="p-t-33">
                        <form action="shopping-cart.php" method="post">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                            name="quantity" min='1' max='1000' value="1">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                    <?php 
                                    if(isset($_SESSION["user_login"]) == null){
                                        echo '<a href="login.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">Thêm vào giỏ</a>';
                                    }else{
                                        echo '<input
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail"
                                        type="submit" name="addcart" value="Thêm vào giỏ">';
                                        
                                    }
                                    ?>
                                    <input type="hidden" name="product_id" value=" <?php echo $_GET['product_id']; ?>">
                                    <input type="hidden" name="product_name"
                                        value=" <?php echo $product["product_name"]; ?>">
                                    <input type="hidden" name="price" value=" <?php echo $product["price"]; ?>">
                                    <input type="hidden" name="color_id" value=" <?php echo $product["color_id"]; ?>">
                                    <input type="hidden" name="color_name"
                                        value="<?php echo $product["color_name"]; ?>">
                                    <!-- <input type="hidden" name="quantity" value="<?php echo $_POST["quantity"]; ?>"> -->
                                </div>
                            </div>
                        </form>
                    </div>

                    <!--  -->
                    <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                        <div class="flex-m bor9 p-r-10 m-r-11">
                            <a href="#"
                                class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                data-tooltip="Add to Wishlist">
                                <i class="zmdi zmdi-favorite"></i>
                            </a>
                        </div>

                        <a href="https://www.facebook.com/quoctron209"
                            class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                            data-tooltip="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                            data-tooltip="Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                            data-tooltip="Google Plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Mô tả</a>
                    </li>
                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Đánh giá</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6" style="text-align: center;">
                                <?php echo $product["description"]; ?>
                            </p>
                        </div>
                    </div>

                    <!-- - -->


                    <!-- - -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm">
                                    <!-- Review -->
                                    <?php 
                                    if(isset($comments) && count($comments) > 0) {
                                        foreach($comments as $comment) { 
                                    ?>
                                    <div class="flex-w flex-t p-b-68">
                                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                            <img src="images/slide2.jpg" alt="AVATAR">
                                        </div>

                                        <div class="size-207">
                                            <div class="flex-w flex-sb-m p-b-17">
                                                <span class="mtext-107 cl2 p-r-20">
                                                    <?php echo $comment["name"]; ?>
                                                </span>

                                                <span class="fs-18 cl13">
                                                    <p><?php echo date('d/m/Y H:i', strtotime($comment["created_at"])); ?></p>
                                                </span>
                                            </div>

                                            <p class="stext-102 cl6">
                                                <?php echo $comment["content"]; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php 
                                        }
                                    } else { 
                                    ?>
                                    <p class="stext-102 cl6 text-center">Chưa có bình luận nào cho sản phẩm này</p>
                                    <?php } ?>

                                    <!-- Add review -->
                                    <form class="w-full" method="post">
                                        <h5 class="mtext-108 cl2 p-b-7">
                                            Thêm bình luận
                                        </h5>
                                        <?php if(!isset($_SESSION["user_login"])) { ?>
                                            <p class="stext-102 cl6 mb-3">Vui lòng <a href="login.php" class="text-primary">đăng nhập</a> để bình luận</p>
                                        <?php } elseif(!$canComment) { ?>
                                            <p class="stext-102 cl6 mb-3">Bạn cần phải mua sản phẩm này trước khi bình luận</p>
                                        <?php } ?>
                                        <div class="row p-b-25">
                                            <div class="col-12 p-b-5">
                                                <label class="stext-102 cl3" for="review">Bình luận của bạn</label>
                                                <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10"
                                                    id="review" name="review" <?php echo (!isset($_SESSION["user_login"]) || !$canComment) ? 'disabled' : ''; ?>></textarea>
                                            </div>
                                        </div>
                                        <button name="btnComment" type="submit" 
                                            class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10"
                                            <?php echo (!isset($_SESSION["user_login"]) || !$canComment) ? 'disabled' : ''; ?>>
                                            Gửi bình luận
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</section>





<!-- Footer -->
<?php include_once("include/footer.php"); ?>