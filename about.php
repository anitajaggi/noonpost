<?php include_once('header.php'); ?>

<main class="main ">
    <!--about-us-->
    <section class="m-top mb-10">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-xl-9 m-auto">
                    <div class="about-us">
                        <?php
                        $data = mysqli_query($con, "select * from about_tbl where status=1");
                        $show_data = mysqli_fetch_array($data);
                        ?>
                        <div class="about-us__image">
                            <img src="adm/uploaded_img/<?php echo $show_data['about_img']; ?>" alt="" class="about-us__img">
                        </div>
                        <div class="about-us__description">
                            <p class="about-us__description-text">
                                <?php echo $show_data['about_description']; ?>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
<?php include_once('footer.php'); ?>