<?php include_once('header.php'); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-lg-12 col-md-4 order-1">
      <div class="row">
        <div class="col-lg-4 col-6 mb-4">
          <div class="card">
            <?php $news_count = mysqli_num_rows(mysqli_query($con, "select * from newsletter_tbl")); ?>
            <div class="card-body">
              <span class="fw-semibold d-block mb-1">Neswletter Subscriber</span>
              <h3 class="card-title mb-2"><?php echo $news_count ?></h3>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-6 mb-4">
          <div class="card">
            <?php $msg_count = mysqli_num_rows(mysqli_query($con, "select * from contact_tbl")); ?>
            <div class="card-body">
              <span class="d-block mb-1">Messages</span>
              <h3 class="card-title text-nowrap mb-2"><?php echo $msg_count ?></h3>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-6 mb-4">
          <div class="card">
            <?php $blog_count = mysqli_num_rows(mysqli_query($con, "select * from add_blog")); ?>
            <div class="card-body">
              <span class="fw-semibold d-block mb-1">Blogs</span>
              <h3 class="card-title mb-2"><?php echo $blog_count ?></h3>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-3 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src=" assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                </div>
                <div class="dropdown">
                  <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="cardOpt1">
                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                  </div>
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Transactions</span>
              <h3 class="card-title mb-2">$14,857</h3>
              <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</div>
<!-- / Content -->
<?php include_once('footer.php'); ?>