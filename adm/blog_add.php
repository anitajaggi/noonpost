<?php include_once('header.php');
error_reporting(0); ?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <?php

  if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $fetch_up_data = mysqli_query($con, "select * from add_blog where blog_id='$edit_id'");
    $show = mysqli_fetch_array($fetch_up_data);
  }
  ?>
  <div class="container-xxl flex-grow-1 container-p-y">
    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Add Blog</h5>
            <a href="blog_list.php" class="btn btn-primary"> Manage Blog</a>
          </div>
          <div class="card-body">
            <form action="controller.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="edit_id" value="<?php echo $edit_id ?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="blog_title" value="<?php echo $show['blog_title'] ?>" required="requird" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control" name="blog_date" min="<?php echo date("Y-m-d"); ?>" value="<?php echo $show['blog_date'] ?>" required="requird" />
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label">Short Description</label>
                <textarea id="summernote1" class="form-control" name="blog_short_desc" required="requird"><?php echo $show['blog_short_desc'] ?></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">Long Description</label>
                <textarea id="summernote" class="form-control" name="blog_long_desc" value="" required="requird"><?php echo $show['blog_long_desc'] ?></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">Blog Picture/Image</label>
                <input type="file" class="form-control" name="blog_img" id="fileInput">

                <!-- <div class="image-preview-container" id="imagePreviewContainer">
                  <span class="form-label new-image-label">New Image</span>
                  <img class="image-preview" id="imagePreview" alt="Image Preview">
                </div> -->

              </div>
              <?php
              if (isset($_GET['edit_id'])) {
                if ($_GET['edit_id']) { ?>
                  <label class="form-label">Current Image</label>
                  <img class="current_img" src="uploaded_img/<?php echo $show['blog_img'] ?>" alt="" width="100px">
                  <input type="hidden" name="old_img" value="<?php echo $show['blog_img'] ?>">
              <?php   }
              }
              ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Author Name</label>
                    <input type="text" class="form-control" name="author_name" value="<?php echo $show['author_name'] ?>" required="requird" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Author Picture/Image</label>
                    <input type="file" class="form-control" name="author_img" id="fileInput">
                    <div class="image-preview-container" id="imagePreviewContainer">
                      <span class="form-label new-image-label">
                        Author Image</span>
                      <img class="image-preview" id="imagePreview" alt="Image Preview">
                    </div>
                  </div>
                </div>
              </div>
              <?php
              if (isset($_GET['edit_id'])) {
                if ($_GET['edit_id']) { ?>
                  <label class="form-label">Current Image</label>
                  <img class="current_img" src="uploaded_img/<?php echo $show['author_img'] ?>" alt="" width="100px">
                  <input type="hidden" name="author_old_img" value="<?php echo $show['author_img'] ?>">
              <?php   }
              }
              ?>
              <div class="mb-3">
                <label class="form-label">Tag</label>
                <input type="text" class="form-control" name="blog_tag" value="<?php echo $show['blog_tag'] ?>" required="requird" />
              </div>
              <?php
              if (isset($_GET['edit_id'])) {
              ?>
                <button type="submit" name="update_blog_btn" class="btn btn-primary">Update Blog</button>
              <?php
              } else {
              ?>
                <button type="submit" name="add_blog_btn" class="btn btn-primary">Add Blog</button>
              <?php
              }
              ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->
<?php include_once('footer.php'); ?>
<script>
  $(document).ready(function() {
    $('#summernote1').summernote({
      placeholder: 'Short Description',
      height: 100
    });
    $('#summernote').summernote({
      placeholder: 'Long Description',
      height: 250
    });
  })
</script>
<script>
  // document.getElementById('fileInput').addEventListener('change', function(event) {
  //   const input = event.target;
  //   const file = input.files[0];
  //   const imagePreview = document.getElementById('imagePreview');
  //   const imagePreviewContainer = document.getElementById('imagePreviewContainer');

  //   if (file) {
  //     const reader = new FileReader();
  //     reader.onload = function(e) {
  //       imagePreview.src = e.target.result;
  //       imagePreviewContainer.style.display = 'flex'; // Show the image preview container
  //     }
  //     reader.readAsDataURL(file);
  //   } else {
  //     imagePreviewContainer.style.display = 'none'; // Hide the image preview container
  //     imagePreview.src = '#';
  //   }
  // });
</script>

<?php
if (isset($_SESSION['data_inserted'])) { ?>

  <script type="text/javascript">
    toastr.options = {
      "closeButton": true,
      "progressBar": true,
      "timeOut": "2000",
      "positionClass": "toast-bottom-right",
      "toastClass": "toast toast-pink"
    };
    toastr.success("Blog INSERTED!");
  </script>

<?php
  unset($_SESSION['data_inserted']);
}
?>