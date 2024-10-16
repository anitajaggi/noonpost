<?php include_once('header.php') ?>

<style>
  .ellipsis {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    width: 200px;
  }
</style>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <!-- Hoverable Table rows -->
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Blog List</h5>
        <a href="blog_add.php" class="btn btn-primary">Add Blog</a>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Sr.No</th>
              <th>title</th>
              <th>date</th>
              <th>blog image</th>
              <th>tags</th>
              <th>author name</th>
              <th>author image</th>
              <th>action</th>
            </tr>
          </thead>

          <?php

          $fetch_data = mysqli_query($con, "select * from add_blog where status=1 order by blog_id DESC");
          $x = 1;
          while ($res = mysqli_fetch_array($fetch_data)) {

          ?>

            <tbody class="table-border-bottom-0">
              <tr>
                <td><?php echo $x; ?></td>
                <td>
                  <p class="ellipsis"><?php echo $res['blog_title']; ?></p>
                </td>
                <td><?php echo $res['blog_date']; ?></td>
                <td><img src="uploaded_img/<?php echo $res['blog_img']; ?>" style="width:100px;height:70px;object-fit:cover;border-radius:5px;" alt=""></td>
                <td><?php echo $res['blog_tag']; ?></td>
                <td><?php echo $res['author_name']; ?></td>
                <td><img src="uploaded_img/<?php echo $res['author_img']; ?>" style="width:100px;height:70px;object-fit:cover;border-radius:5px;" alt=""></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="blog_add.php?edit_id=<?php echo $res['blog_id']; ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                      <a class="dropdown-item" href="controller.php?del_id=<?php echo $res['blog_id']; ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          <?php
            $x++;
          }
          ?>
        </table>
      </div>
    </div>
  </div>
</div>
<!--/ Hoverable Table rows -->

<?php include_once('footer.php'); ?>

<?php
if (isset($_SESSION['data_deleted'])) { ?>

  <script type="text/javascript">
    toastr.options = {
      "closeButton": true,
      "progressBar": true,
      "timeOut": "2000",
      "positionClass": "toast-bottom-right",
      "toastClass": "toast toast-red"
    };
    toastr.success("Blog DELETED!");
  </script>

<?php
  unset($_SESSION['data_deleted']);
}
?>

<?php
if (isset($_SESSION['data_updated'])) { ?>

  <script type="text/javascript">
    toastr.options = {
      "closeButton": true,
      "progressBar": true,
      "timeOut": "2000",
      "positionClass": "toast-bottom-right",
      "toastClass": "toast toast-pink"
    };
    toastr.success("Blog UPDATED!");
  </script>

<?php
  unset($_SESSION['data_updated']);
}
?>