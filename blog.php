<?php include_once('header.php'); ?>

<!--main-->
<main class="main pt-5">
    <!--blog-grid-->
    <section class="blog-grid ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 mt-30 side-content">
                    <div class="theiaStickySidebar">
                        <div class="row">
                            <div class="slider__item-content blog-area">
                                <h1 class="slider__title slider__title-link">
                                    Blog's
                                </h1>
                            </div>
                            <?php

                            $blog_fetch = mysqli_query($con, "SELECT * from add_blog where blog_date <= CURDATE() and status=1 order by blog_id DESC");

                            $total_records = mysqli_num_rows($blog_fetch);

                            if ($total_records == 0) {
                                echo "<h3>No Records Found!</h3>";
                                exit;
                            }

                            $limit = 6;
                            $page = 1;

                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            }

                            $start = ($page - 1) * $limit;

                            $limited_result = mysqli_query($con,  "SELECT * from add_blog where blog_date <= CURDATE() and status=1 order by blog_id DESC LIMIT $start,$limit");

                            while ($show = mysqli_fetch_array($limited_result)) {
                            ?>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="post-card post-card--default">
                                        <div class="post-card__image">
                                            <a href="blog_detail.php?blg_id=<?php echo $show['blog_id']; ?>">
                                                <img src="adm/uploaded_img/<?php echo $show['blog_img']; ?>" alt="">
                                            </a>
                                        </div>

                                        <div class="post-card__content">
                                            <a href="blog-grid.html" class="category">lifestyle</a>
                                            <h4 class="post-card__title">
                                                <a href="blog_detail.php?blg_id=<?php echo $show['blog_id']; ?>" class="post-card__title-link"><?php echo $show['blog_title']; ?></a>
                                            </h4>
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
                            <?php } ?>
                        </div>
                        <!--pagination-->

                        <?php

                        $total_pages = ceil($total_records / $limit);
                        echo "<p class='text-center'> Pages: $page / $total_pages </p>";

                        $pagination = "<div class='row'><div class='col-lg-12'><ul class='pagination list-inline'>";

                        $prev_disabled = ($page == 1) ? "disabled" : "";
                        $prev = $page - 1;

                        $pagination .= "<li class='page-item $prev_disabled'><a href='?page=1' class='page-link'><i class='bi bi-arrow-bar-left'></i></a></li>";

                        $pagination .= "<li class='page-item $prev_disabled'><a href='?page=$prev' class='page-link'><i class='bi bi-arrow-left pagination__icon'></i></a></li>";

                        $pagination .= "<li class='pagination__item pagination__item--active'><p class='pagination__link'>$page</p></li>";

                        $next_disabled = ($page == $total_pages) ? "disabled" : "";
                        $next = $page + 1;

                        $pagination .= "<li class='page-item $next_disabled'><a href='?page=$next' class='page-link'><i class='bi bi-arrow-right pagination__icon'></i></a></li>";

                        $pagination .= "<li class='page-item $next_disabled'><a href='?page=$total_pages' class='page-link'><i class='bi bi-arrow-bar-right'></i></a></li>";

                        $pagination .= "</ul></div></div>";

                        echo $pagination;

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once('footer.php'); ?>