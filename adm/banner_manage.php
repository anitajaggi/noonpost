<?php include_once('header.php') ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Banner List</h5>
                <a href="banner_add.php" class="btn btn-primary">Add Banner</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Banner title</th>
                            <th>banner image</th>
                            <th>action</th>
                        </tr>
                    </thead>

                    <?php

                    $fetch_data = mysqli_query($con, "select * from banner_tbl");
                    $x = 1;
                    while ($res = mysqli_fetch_array($fetch_data)) {
                    ?>

                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td><?php echo $x; ?></td>
                                <td><?php echo $res['banner_title']; ?></td>
                                <td><img src="uploaded_img/<?php echo $res['banner_img']; ?>" width="100px" alt=""></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="banner_add.php?banner_edit_id=<?php echo $res['banner_id']; ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="controller.php?banner_del_id=<?php echo $res['banner_id']; ?>"><i class="bx bx-trash me-1"></i> Delete</a>
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
if (isset($_SESSION['banner_deleted'])) {
?>

    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "2000",
            "positionClass": "toast-bottom-right",
            "toastClass": "toast toast-red"
        };
        toastr.success("Banner DELETED!");
    </script>

<?php
    unset($_SESSION['banner_deleted']);
}
?>

<?php
if (isset($_SESSION['banner_updated'])) {
?>

    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "2000",
            "positionClass": "toast-bottom-right",
            "toastClass": "toast toast-pink"
        };
        toastr.success("Banner UPDATED!");
    </script>

<?php
    unset($_SESSION['banner_updated']);
}
?>