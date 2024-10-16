<?php include_once('header.php'); ?>
<main class="main">
    <!--slider-two-->
    <div class="slider slider--two">
        <div class="slider slider--two">
            <div class="swiper slider__top">
                <div class="swiper-wrapper">
                    <!--slider1-->
                    <?php
                    $fetch_banner = mysqli_query($con, "SELECT * from banner_tbl order by banner_id DESC");
                    while ($show = mysqli_fetch_array($fetch_banner)) {
                    ?>
                        <div class="slider__item swiper-slide" style="background-image: url(adm/uploaded_img/<?php echo $show['banner_img']; ?>);">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xl-9 col-lg-9 col-md-12">
                                        <div class="slider__item-content">
                                            <h1 class="slider__title slider__title-link">
                                                <?php echo $show['banner_title']; ?>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!--blog-Home-2-->
    <section class="mt-90">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="slider__item-content blog-area">
                        <h1 class="slider__title slider__title-link">
                            Latest Blog
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $blog_fetch = mysqli_query($con, "SELECT * from add_blog where status=1 and blog_date <= CURDATE() order by blog_id DESC LIMIT 6");
                while ($show = mysqli_fetch_array($blog_fetch)) {
                    // $word_limit = 10;
                    // $words = explode(" ", $show['blog_short_desc'], $word_limit + 1); // Split with limit + 1
                    // $short_desc = implode(" ", array_slice($words, 0, $word_limit)); // Join limited words
                    // echo trim($short_desc); // Echo trimmed result
                ?>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                        <div class="post-card post-card--default">
                            <div class="post-card__image">
                                <a href="blog_detail.php?blg_id=<?php echo $show['blog_id']; ?>">
                                    <img src="adm/uploaded_img/<?php echo $show['blog_img']; ?>" alt="">
                                </a>
                            </div>
                            <div class="post-card__content">
                                <a href="blog-grid.html" class="category"><?php echo $show['blog_tag']; ?></a>
                                <h5 class="post-card__title">
                                    <a href="blog_detail.php?blg_id=<?php echo $show['blog_id']; ?>" class="post-card__title-link"><?php echo $show['blog_title']; ?></a>
                                </h5>
                                <p class="post-card__exerpt"><?php echo substr($show['blog_short_desc'], 0, 100); ?>...
                                </p>
                                <ul class="post-card__meta list-inline">
                                    <li class="post-card__meta-item">
                                        <a href="about.php" class="post-card__meta-link">
                                            <img src="adm/uploaded_img/<?php echo $show['author_img']; ?>" alt="" class="post-card__meta-img">
                                        </a>
                                    </li>
                                    <li class="post-card__meta-item ">
                                        <a href="about.php" class="post-card__meta-link"><?php echo $show['author_name']; ?></a>
                                    </li>
                                    <li class="post-card__meta-item">
                                        <span class="dot"></span> <?php echo $show['blog_date']; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <style>
                .explore-btn {
                    padding-bottom: 30px;
                }
            </style>
            <!--Explore more btn-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="explore-btn text-center">
                        <a href="blog.php" type="submit" class="btn-custom">Explore More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/-->
    <!--newslettre-->
    <section class="newslettre__section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-10 col-sm-11 m-auto">
                    <div class="newslettre">
                        <div class="newslettre__info ">
                            <h3 class="newslettre__title">Get The Best Blog Stories into Your inbox!</h3>
                            <p class="newslettre__desc"> Sign up for free and be the first to get notified about new posts. </p>
                        </div>

                        <form action="controller.php" method="post" class="newslettre__form">
                            <input type="email" name="newsletter_email" class="newslettre__form-input form-control" placeholder="Your email adress" required="required">
                            <button class="newslettre__form-submit" name="newletter_btn" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include_once('footer.php'); ?>

<?php
if (isset($_SESSION['sub_email_success'])) { ?>

    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "2000",
            "positionClass": "toast-bottom-right",
            "toastClass": "toast toast-pink"
        };
        toastr.success("Successfully SUBSCRIBED!");
    </script>

<?php
    unset($_SESSION['sub_email_success']);
}
?>

<?php
if (isset($_SESSION['sub_email_error'])) { ?>

    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "2000",
            "positionClass": "toast-bottom-right",
            "toastClass": "toast toast-red"
        };
        toastr.success("Email Already EXIST!");
    </script>

<?php
    unset($_SESSION['sub_email_error']);
}
?>