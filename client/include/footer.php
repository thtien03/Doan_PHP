<footer class="bg3 p-t-75 p-b-32">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Trang
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Sản phẩm
                        </a>
                    </li>
                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Giới thiệu
                        </a>
                    </li>
                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Liên hệ
                        </a>
                    </li>
                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Đăng nhập
                        </a>
                    </li>
                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Đăng ký
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Giúp đở
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Theo dõi đơn hàng
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Đổi trả
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Giao hàng
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            FAQs
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Liên lạc
                </h4>

                <p class="stext-107 cl7 size-201">
                    +84 793 960 152
                </p>

                <div class="p-t-27">
                    <a href="https://www.facebook.com/quoctron209" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="https://www.instagram.com/nquoctron/" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-instagram"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-pinterest-p"></i>
                    </a>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Bản tin
                </h4>

                <form>
                    <div class="wrap-input1 w-full p-b-4">
                        <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email"
                            placeholder="email@example.com">
                        <div class="focus-input1 trans-04"></div>
                    </div>

                    <div class="p-t-18">
                        <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                            Đăng ký
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="p-t-40">
            <p class="stext-107 cl6 txt-center">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                document.write(new Date().getFullYear());
                </script> TechStore Co.op
            </p>
        </div>
    </div>
</footer>
</body>
</php>


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
$(".js-select2").each(function() {
    $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
    });
})
</script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/slick/slick.min.js"></script>
<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
<script src="vendor/parallax100/parallax100.js"></script>
<script>
$('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
$('.gallery-lb').each(function() { // the containers for all your galleries
    $(this).magnificPopup({
        delegate: 'a', // the selector for gallery item
        type: 'image',
        gallery: {
            enabled: true
        },
        mainClass: 'mfp-fade'
    });
});
</script>
<!--===============================================================================================-->
<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/sweetalert/sweetalert.min.js"></script>
<script>
$('.js-addwish-b2, .js-addwish-detail').on('click', function(e) {
    e.preventDefault();
});

$('.js-addwish-b2').each(function() {
    var nameProduct = $(this).parent().parent().find('.js-name-b2').php();
    $(this).on('click', function() {
        swal(nameProduct, "is added to wishlist !", "success");

        $(this).addClass('js-addedwish-b2');
        $(this).off('click');
    });
});

$('.js-addwish-detail').each(function() {
    var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').php();

    $(this).on('click', function() {
        swal(nameProduct, "is added to wishlist !", "success");

        $(this).addClass('js-addedwish-detail');
        $(this).off('click');
    });
});

/*---------------------------------------------*/

$('.js-addcart-detail').each(function() {
    var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').php();
    $(this).on('click', function() {
        swal(nameProduct, "is added to cart !", "success");
    });
});
</script>
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