<?php include_once('header.php') ?>


<style>
    .about-description p {
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
                <h5 class="mb-0">Banner List</h5>
                <a href="add_about.php" class="btn btn-primary">Add About</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>About</th>
                            <th>Image</th>
                            <th>action</th>
                        </tr>
                    </thead>

                    <?php

                    $fetch_data = mysqli_query($con, "select * from about_tbl where status=1 order by about_id DESC");
                    $x = 1;
                    while ($res = mysqli_fetch_array($fetch_data)) {
                    ?>

                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td><?php echo $x; ?></td>
                                <td class="about-description"><?php echo $res['about_description']; ?></td>
                                <td><img src="uploaded_img/<?php echo $res['about_img']; ?>" width="100px" alt=""></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="add_about.php?about_edit_id=<?php echo $res['about_id']; ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="controller.php?about_del_id=<?php echo $res['about_id']; ?>"><i class="bx bx-trash me-1"></i> Delete</a>
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
if (isset($_SESSION['about_delete'])) {
?>

    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "2000",
            "positionClass": "toast-bottom-right",
            "toastClass": "toast toast-red"
        };
        toastr.success("About DELETED!");
    </script>

<?php
    unset($_SESSION['about_delete']);
}
?>

<?php
if (isset($_SESSION['about_updated'])) {
?>

    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "2000",
            "positionClass": "toast-bottom-right",
            "toastClass": "toast toast-pink"
        };
        toastr.success("About UPDATED!");
    </script>

<?php
    unset($_SESSION['about_updated']);
}
?>