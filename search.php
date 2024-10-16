<?php
include_once('header.php');

if (isset($_GET['search'])) {
    $search_qry = trim($_GET['search_blog']);

    $search_show = mysqli_query($con, "SELECT * FROM add_blog WHERE blog_title LIKE '%$search_qry%' AND status=1 ORDER BY blog_title ASC");
    $row = mysqli_num_rows($search_show);
}
?>

<section class="blog-grid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 side-content">
                <div class="theiaStickySidebar">
                    <div class="row">
                        <div class="container" style="margin-top:100px;">
                            <div class="row">
                                <div class="slider__item-content blog-area">
                                    <h1 class="slider__title slider__title-link">
                                        Searched Blog
                                    </h1>
                                </div>
                                <?php
                                if ($row > 0) {
                                    while ($search_fetch = mysqli_fetch_array($search_show)) {
                                ?>
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                            <div class="post-card post-card--default">
                                                <div class="post-card__image">
                                                    <a href="blog_detail.php?blg_id=<?php echo $search_fetch['blog_id']; ?>">
                                                        <img src="adm/uploaded_img/<?php echo $search_fetch['blog_img']; ?>" alt="">
                                                    </a>
                                                </div>

                                                <div class="post-card__content">
                                                    <a href="blog-grid.html" class="category">lifestyle</a>
                                                    <h4 class="post-card__title">
                                                        <a href="blog_detail.php?blg_id=<?php echo $search_fetch['blog_id']; ?>" class="post-card__title-link"><?php echo $search_fetch['blog_title']; ?></a>
                                                    </h4>
                                                    <p class="post-card__exerpt"><?php echo substr($search_fetch['blog_short_desc'], 0, 100); ?>...
                                                    </p>

                                                    <ul class="post-card__meta list-inline">
                                                        <li class="post-card__meta-item">
                                                            <a href="about.php" class="post-card__meta-link">
                                                                <img src="adm/uploaded_img/<?php echo $search_fetch['author_img']; ?>" alt="" class="post-card__meta-img">
                                                            </a>
                                                        </li>
                                                        <li class="post-card__meta-item ">
                                                            <a href="about.php" class="post-card__meta-link"><?php echo $search_fetch['author_name']; ?></a>
                                                        </li>
                                                        <li class="post-card__meta-item">
                                                            <span class="dot"></span> <?php echo $search_fetch['blog_date']; ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                } else {
                                    echo "<div style='height: 60vh; text-align:center; align-content:center;'>
                                    <h2>Result Not Found!</h2>
                                </div>";
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once('footer.php');
?>