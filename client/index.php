<?php 
require_once("../entities/banner.class.php");
$banner = Banner::list_banner();
session_start();
?>

<?php include_once("include/header.php"); ?>
<?php include_once("include/cart.php"); ?>

<section class="section-slide">
  <div class="wrap-slick1">
    <div class="slick1">
      <?php foreach ($banner as $item) : ?>
        <?php 
        $textColor = ($item["id"] == 3) ? "white" : "black";
        // Fix banner image path
        $bannerImage = "images/" . $item["photo"];
        ?>
        <div class="item-slick1" style="background-image: url(<?php echo $bannerImage; ?>);">
          <div class="container h-full">
            <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
              <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                <span class="ltext-101 cl2 respon2" style="color: <?php echo $textColor; ?>;">
                  <?php echo $item["content"]; ?>
                </span>
              </div>
              
              <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1" style="color: <?php echo $textColor; ?>;">
                  <?php echo $item["caption"]; ?>
                </h2>
              </div>

              <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                <a href="product.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                  Xem thêm
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Footer -->
<?php include_once("include/footer.php"); ?>