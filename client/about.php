<?php
require_once("../entities/feedback.class.php");
require_once("../entities/comment.class.php");
require_once("../entities/customer.class.php");
require_once("../entities/employee.class.php");
require_once("../entities/liked.class.php");
session_start();
$feedbacks = Feedback::list_feedback();
//var_dump($feedbacks);
function checkLiked($feedback_id, $customer_id){
  $arrFeedbackLiked = Liked::findLiked($customer_id);
 //var_dump( $arrFeedbackLiked);
  foreach($arrFeedbackLiked as $item){
    if($item["feedback_id"] == $feedback_id){
      return true;
    return false;
  }
}
}

if (isset($_POST['btnCmtSubmit'])) {
  $feedback_id = $_POST['txtFeedback_id'];
  $content = $_POST['txtComment'];
  if (isset($_SESSION["user_login"])) {
    $customer_id = $_SESSION["user_login"]["customer_id"];

    $newComment = new Comment($customer_id, null, $feedback_id, $content, '');
    $result = $newComment->createComment();
    if (!$result) {
      echo "failed";
      header("Location: about.php");
    } else {
      echo "ok";
      header("Location: about.php");
    }
  } elseif (isset($_SESSION["emp_login"])) {
    $employee_id = $_SESSION["emp_login"]["employee_id"];
    $newComment = new Comment(null, $employee_id, $feedback_id, $content, '');
    $result = $newComment->createComment();
    if (!$result) {
      echo "failed";
      header("Location: about.php");
    } else {
      echo "ok";
      header("Location: about.php");
    }
  }
}

?>
<?php include_once("include/header.php"); ?>

<!-- Cart -->
<?php include_once("include/cart.php"); ?>


<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Về chúng tôi
    </h2>
</section>


<!-- Content page -->
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row p-b-148">
            <div class="col-md-7 col-lg-8">
                <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Giới thiệu
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        Công ty TNHH TechStore được thành lập vào năm 20.., là Công ty chuyên kinh doanh, phân phối Sỉ &
                        Lẻ ngành hàng Máy tính, dịch vụ công nghệ thông tin, cung cấp dịch vụ tư vấn giải pháp công nghệ
                        tối ưu và các dịch vụ khác liên quan đến máy tính trên toàn quốc.
                    </p>
                    <h3 class="mtext-111 cl2 p-b-16">
                        Lãnh vực kinh doanh
                    </h3>
                    <p class="stext-113 cl6 p-b-26">
                        Phân phối máy vi tính, thiết bị ngoại vi, phụ kiện, camera, viễn thông và phần mềm
                        <br>
                        Bán lẻ máy vi tính, thiết bị ngoại vi, viễn thông và phần mềm
                        <br>
                        Tư vấn máy vi tính và quản trị hệ thống máy vi tính;
                        <br>
                        Xử lý dữ liệu, hoạt động dịch vụ công nghệ thông tin và dịch vụ khác liên quan đến máy vi tính;
                        <br>
                        Sửa chữa máy vi tính và thiết bị ngoại vi;
                        <br>
                        Đa dạng các mặt hàng và phong phú về mẫu mã trong lĩnh vực Công nghệ thông tin từ các hãng nổi
                        tiếng trên thế giới, luôn bắt kịp xu hướng và đáp ứng kịp thời nhu cầu của khách hàng với chất
                        lượng và giá cả cạnh tranh nhất thị trường
                    </p>
                </div>
            </div>

            <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                <div class="how-bor1 ">
                    <div class="hov-img0">
                        <img src="images/about-01.jpg" alt="IMG">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Sản phẩm kinh doanh
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        ❖ Linh kiện mới
                        <br>
                        – Máy đào Bitcoin: VGA Bitcoin, Dàn máy đào Bitcoin, Phụ kiện Bitcoin,…
                        <br>
                        – Linh kiện máy tính: Mainboard, CPU, Ram, VGA – Card màn hình, Nguồn, Thùng PC, Laptop, Màn
                        hình LCD, Bàn phím, Chuột, Tai Nghe,… và nhiều thiết bị đi kèm linh kiện máy tính hiện nay
                        <br>
                        – Linh kiện Camera: Camera , Phụ kiện Camera các loại
                        <br>
                        – Linh kiện sử chữa máy tính và phụ kiện: Kiềm bấm, Máy thổi, Cáp mạng, Đầu chuyển, Adapter,
                        Thiết bị Mạng – Wifi, Phụ kiện Laptop & Điện thoại,…
                        <br>
                        ❖ Linh kiện đã qua sử dụng
                        <br>
                        – Linh kiện Máy tính: Màn hình LCD, VGA – Card màn hình, Ram, Nguồn, Mainboard, CPU, Ổ cứng,
                        Laptop và một số phụ kiện khác…
                    </p>
                    <h3 class="mtext-111 cl2 p-b-16">
                        Cam kết
                    </h3>
                    <div class="bor16 p-l-29 p-b-9 m-t-22">
                        <p class="stext-114 cl6 p-r-40 p-b-11">
                            ✔ Bán hàng online toàn quốc
                            <br>
                            ✔ Sản phẩm chính hãng 100%
                            <br>
                            ✔ Giao hàng trước trả tiền sau COD
                            <br>
                            ✔ Sản phẩm phong phú, đa dạng
                            <br>
                            ✔ Giá cạnh tranh nhất thị trường
                            <br>
                            ✔ Hệ thống showroom chuyên nghiệp
                            <br>
                            ✔ Hỗ trợ kỹ thuật tận tình
                            <br>
                            ✔ Bảo hành nhanh chóng
                        </p>
                    </div>
                </div>
            </div>

            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img src="images/about-02.jpg" alt="IMG">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                    <div class="p-b-30 m-lr-15-sm">
                        <?php foreach ($feedbacks as $item) : ?>
                        <!-- Review -->
                        <div class="flex-w flex-t p-b-68">
                            <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                <img src="images/1024px-User-avatar.svg.png" alt="AVATAR">
                            </div>
                            <div class="size-207">
                                <div class="flex-w flex-sb-m p-b-17">
                                    <span class="mtext-107 cl2 p-r-20">
                                        <?php echo $item["customer_name"] ?>
                                    </span>
                                    <span class="d-inline-flex">
                                        <p class="fs-18 cl13 d-block"><?php echo $item["caption"] ?></p>
                                    </span>

                                </div>
                                <p class="stext-102 cl6">
                                    <?php echo $item["content"] ?>
                                </p>
                                <div class="flex-r m-t-20 d-block">
                                    <?php if(checkLiked($item["feedback_id"],$_SESSION['user_login']["customer_id"]) == true) : ?>
                                    <a class=" reply-comment"
                                        style="color: #75BEFF; font-style:italic;margin-right: 10px;" id="liked"
                                        href="unlike.php?feedback_id=<?php echo $item["feedback_id"]; ?>">
                                        Đã thích
                                    </a>
                                    <?php  else: ?>
                                    <a class=" reply-comment"
                                        style="color: #75BEFF; font-style:italic;margin-right: 10px;" id="liked"
                                        href="like.php?feedback_id=<?php echo $item["feedback_id"]; ?> ">
                                        Thích
                                    </a>
                                    <?php endif ?>
                                    <button onclick="myFunction()" class=" reply-comment"
                                        style="color: #75BEFF; font-style:italic;">Bình
                                        luận</button>
                                    <!-- show comment -->
                                    <?php $comements = Comment::findComment($item["feedback_id"]);
                    // var_dump($comements);
                    foreach ($comements  as $itemCmt) :
                    ?>
                                    <div class="m-t-20">
                                        <div class="wrap-pic-s size-109 bor0 of-hidden " style="float:left">
                                            <img src="images/1024px-User-avatar.svg.png" alt="AVATAR">
                                        </div>
                                        <span class="mtext-107 cl2 ">
                                            <?php
                          if ($itemCmt["customer_id"] != 0) {
                            $customer = Customer::findCustomer($itemCmt["customer_id"]);
                            echo $customer["name"];
                          } elseif ($itemCmt["employee_id"] != 0) {
                            $employee = Employee::findEmployee($itemCmt["employee_id"]);
                            echo $employee["name"];
                          }
                          ?>
                                        </span>
                                        <span style="display: grid;margin-top:10px">
                                            <p>
                                                <?php echo $itemCmt["content"]; ?>
                                            </p>
                                        </span>
                                    </div>
                                    <?php endforeach; ?>
                                </div>

                                <!-- end show comment -->
                                <form style="display:none; margin-top: 30px" id="reply-form" class="w-500"
                                    method="post">
                                    <div class="row p-b-25">
                                        <div class="col-12 p-b-5">
                                            <label class="stext-102 cl3" for="review">Bình luận của bạn</label>
                                            <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review"
                                                name="txtComment"></textarea>
                                            <input name="txtFeedback_id" value="<?php echo $item["feedback_id"] ?>"
                                                hidden />
                                        </div>
                                    </div>
                                    <button name="btnCmtSubmit" type="submit"
                                        class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">Gửi</button>
                                </form>
                            </div>

                        </div>
                        <?php endforeach; ?>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
</section>



<!-- Footer -->
<?php include_once("include/footer.php"); ?>


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="zmdi zmdi-chevron-up"></i>
    </span>
</div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<script>
function change_text() {
    document.getElementById("liked").innerHTML = "Đã thích";
}

function myFunction() {
    var x = document.getElementById("reply-form");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>
<script>
$(".js-select2").each(function() {
    $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
    });
})
</script>
<!--===============================================================================================-->
<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
$('.js-pscroll').each(function() {
    $(this).css('position', 'relative');
    $(this).css('overflow', 'hidden');
    var ps = new PerfectScrollbar(this, {
        wheelSpeed: 1,
        scrollingThreshold: 1000,
        wheelPropagation: false,
    });

    $(window).on('resize', function() {
        ps.update();
    })
});
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>

</html>