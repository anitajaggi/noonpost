<!--footer-->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <p class="footer__copyright-text">© Copyright 2024
                        <a href="#" class="footer__copyright-link"></a>, All rights reserved.
                    </p>
                </div>
                <div class="btn-back-top">
                    <a href="#" class="btn-back-top__link">
                        <i class="bi bi-arrow-up btn-back-top__icon"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center pb-3">
                <ul class="list-inline social-media social-media--layout-three">
                    <li class="social-media__item">
                        <a href="#" class="social-media__link"><i class="bi bi-facebook"></i>Facebook</a>
                    </li>

                    <li class="social-media__item">
                        <a href="#" class="social-media__link"><i class="bi bi-instagram"></i>Instagram</a>
                    </li>
                    <li class="social-media__item">
                        <a href="#" class="social-media__link"><i class="bi bi-twitter-x"></i>Twitter</a>
                    </li>
                    <li class="social-media__item">
                        <a href="#" class="social-media__link"><i class="bi bi-youtube"></i>Youtube</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!--Search-form-->
<!-- <div class="search__box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 m-auto col-md-8 col-sm-11">
                <div class="search__content ">
                    <button type="button" class="search__box-btn-close">
                        <i class="bi bi-x-lg"></i>
                    </button>
                    <form class="search__form" action="search.php" method="post">
                        <input type="search" name="search_blog" class="search__form-input" value="" placeholder="What are you looking for?">
                        <button type="submit" name="search" class="search__form-btn-search">search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!--plugins -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/swiper-bundle.min.js"></script>
<script src="assets/js/masonry.min.js"></script>
<script src="assets/js/theia-sticky-sidebar.min.js"></script>
<script src="assets/js/ajax-contact.js"></script>
<script src="assets/js/switch.js"></script>
<!-- toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<!-- JS main  -->
<script src="assets/js/main.js"></script>

<script>
    // sider banner
    var swiper = new Swiper('.swiper', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
    });
</script>

</body>

</html>