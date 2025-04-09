<?php 
require_once("./inc/session.inc.php");
require_once("../entities/product.class.php");
require_once("../entities/customer.class.php");
require_once("../entities/orders.class.php");
$count_product = Product::countProduct();
$count_order = Orders::countOrder();
$count_customer = Customer::countCustomer();

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
    </div>
    <div class="content-body">
      <!-- Chart -->
      <div class="row match-height">
        <div class="col-12">
          <div class="">
            <div id="gradient-line-chart1" class="height-250 GradientlineShadow1"></div>
          </div>
        </div>
      </div>
      <!-- Chart -->
      <!-- eCommerce statistic -->
      <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-12">
          <div class="card pull-up ecom-card-1 bg-white">
            <div class="card-content ecom-card2 height-180">
              <h5 class="text-muted danger position-absolute p-1"><?php echo $count_customer["total"] ?> Khách hàng</h5>
              <div>
                <i class="ft-pie-chart danger font-large-1 float-right p-1"></i>
              </div>
              <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                <div id="progress-stats-bar-chart"></div>
                <div id="progress-stats-line-chart" class="progress-stats-shadow"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12">
          <div class="card pull-up ecom-card-1 bg-white">
            <div class="card-content ecom-card2 height-180">
              <h5 class="text-muted info position-absolute p-1"><?php echo $count_product["total"] ?> Sản phẩm</h5>
              <div>
                <i class="ft-activity info font-large-1 float-right p-1"></i>
              </div>
              <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                <div id="progress-stats-bar-chart1"></div>
                <div id="progress-stats-line-chart1" class="progress-stats-shadow"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-12">
          <div class="card pull-up ecom-card-1 bg-white">
            <div class="card-content ecom-card2 height-180">
              <h5 class="text-muted warning position-absolute p-1"><?php echo $count_order["total"] ?> Đơn hàng mới</h5>
              <div>
                <i class="ft-shopping-cart warning font-large-1 float-right p-1"></i>
              </div>
              <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                <div id="progress-stats-bar-chart2"></div>
                <div id="progress-stats-line-chart2" class="progress-stats-shadow"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/ eCommerce statistic -->

    </div>
  </div>
</div>
<!-- end body -->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include_once("./inc/footer-admin.php"); ?>