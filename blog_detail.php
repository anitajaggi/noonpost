<?php include_once('header.php'); ?>

<main class="main">
    <!--post-default-->
    <section class="mt-130 mb-30">
        <div class="container-fluid">
            <div class="row">
                <?php
                if (isset($_GET['blg_id'])) {
                    $blg_id = $_GET['blg_id'];
                    $blog_fetch = mysqli_query($con, "select * from add_blog where blog_id='$blg_id'");
                    $show = mysqli_fetch_array($blog_fetch);
                }
                ?>
                <div class="col-xl-10 col-lg-11 side-content m-auto">
                    <div class="theiaStickySidebar">
                        <!--Post-single-->
                        <div class="post-single">
                            <div class="post-single__image">
                                <img src="adm/uploaded_img/<?php echo $show['blog_img']; ?>" alt="" class="post-single__image-img">
                            </div>

                            <div class="post-single__content">
                                <a href="blog-grid.html" class="category"><?php echo $show['blog_tag']; ?></a>
                                <h2 class="post-single__title"><?php echo $show['blog_title']; ?></h2>
                                <ul class="post-single__meta list-inline">
                                    <li class="post-single__meta-item">
                                        <a href="author.html">
                                            <img src="assets/img/author/1.jpg" alt="" class="post-single__meta-img">
                                        </a>
                                    </li>
                                    <li class="post-single__meta-item ">
                                        <a href="author.html" class="post-single__meta-link"><?php echo $show['author_name']; ?></a>
                                    </li>
                                    <li class="post-single__meta-item "> <span class="dot"></span> </span> <?php echo $show['blog_date']; ?></li>
                                    <!-- <li class="post-single__meta-item "> <span class="dot"></span> 15 min Read</li>
                                    <li class="post-single__meta-item "> <span class="dot"></span> 2 comments</li> -->
                                </ul>
                            </div>

                            <div class="post-single__body">
                                <p>
                                    <?php echo $show['blog_long_desc']; ?>
                                </p>
                            </div>

                            <div class="post-single__footer">
                                <ul class="list-inline widget__tags">
                                    <li class="widget__tags-item">
                                        <a href="blog-grid.html" class="widget__tags-link"><?php echo $show['blog_tag']; ?></a>
                                    </li>
                                </ul>

                                <!-- <ul class="list-inline social-media social-media--layout-two">
                                    <li class="social-media__item">
                                        <a href="#" class="social-media__link color-facebook"><i class="bi bi-facebook"></i></a>
                                    </li>

                                    <li class="social-media__item">
                                        <a href="#" class="social-media__link color-instagram"><i class="bi bi-instagram"></i></a>
                                    </li>
                                    <li class="social-media__item">
                                        <a href="#" class="social-media__link color-twitter"><i class="bi bi-twitter-x"></i></a>
                                    </li>
                                    <li class="social-media__item">
                                        <a href="#" class="social-media__link color-youtube"><i class="bi bi-youtube"></i></a>
                                    </li>
                                </ul> -->
                                <div id="shareBlock"></div>
                            </div>
                        </div>
                        <!--widget-comments-->
                        <div class="widget mb-50">
                            <!--Leave-comments-->
                            <?php

                            if (isset($_POST['comment_submit'])) {
                                $person_comment = $_POST['person_comment'];
                                $person_name = $_POST['person_name'];
                                $person_email = $_POST['person_email'];

                                $comment_insert = mysqli_query($con, "insert into comments_tbl(blog_id,person_comment,person_name,person_email)values('$blg_id ','$person_comment','$person_name','$person_email')");
                            }

                            ?>
                            <form class="widget__form" action="" method="POST" id="main_contact_form">
                                <h5 class="widget__form-title">Leave a Reply</h5>
                                <p class="widget__form-desc">Your email adress will not be published ,Requied fileds are marked*.</p>
                                <div class="alert alert-success " style="display: none" role="alert">
                                    Your message was sent successfully.
                                </div>
                                <!-- <input type="hidden" name="blog_id" value="<?php echo $show['blog_id'] ?>"> -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="person_comment" id="message" cols="30" rows="5" class="form-control widget__form-input" placeholder="Message*" required="required"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="person_name" id="name" class="form-control widget__form-input" placeholder="Name*" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="person_email" id="email" class="form-control widget__form-input" placeholder="Email*" required="required">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" name="comment_submit" class="btn-custom">
                                            Send Comment
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="widget__comments mt-5">
                                <h5 class="widget__comments-title">Comments</h5>
                                <ul class="widget__comments-items">
                                    <?php
                                    if (isset($_GET['blg_id'])) {
                                        $comment_fetch = mysqli_query($con, "select * from comments_tbl where blog_id='$blg_id' and status=1 order by comment_id DESC");
                                        while ($comment_show = mysqli_fetch_array($comment_fetch)) {
                                            $created_at_date = date('Y-m-d', strtotime($comment_show['created_at']));
                                    ?>
                                            <li class="widget__comments-item">
                                                <img src="assets/img/dummy-person.jpg" alt="" class="widget__comments-img">
                                                <div class="widget__comments-content">
                                                    <ul class="widget__comments-info list-inline">
                                                        <li class="widget__comments-info__item"><?php echo $comment_show['person_name']; ?></li>
                                                        <li class="dot"></li>
                                                        <li class="widget__comments-info__item"> <?php echo $created_at_date ?></li>
                                                    </ul>
                                                    <p class="widget__comments-text"><?php echo $comment_show['person_comment']; ?>
                                                    </p>
                                                    <!-- <a href="#" class="btn-link">
                                                <i class="bi bi-reply-fill"></i> Reply
                                            </a> -->
                                                </div>
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/-->
</main>

<?php include_once('footer.php'); ?>

<script src="assets/js/jquery.c-share.min.js"></script>

<script>
    $('#shareBlock').cShare({
        showButtons: ['fb', 'twitter', 'email']
    });
</script>