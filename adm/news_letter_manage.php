<?php include_once('header.php') ?>


<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Hoverable Table rows -->
        <div class="card">
            <h5 class="card-header">Subscriber List</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Email</th>
                            <th>action</th>
                        </tr>
                    </thead>

                    <?php

                    $fetch_data = mysqli_query($con, "select * from newsletter_tbl where status=1 order by newsletter_id DESC");
                    $x = 1;
                    while ($res = mysqli_fetch_array($fetch_data)) {

                    ?>

                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td><?php echo $x; ?></td>
                                <td><?php echo $res['newsletter_email']; ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="controller.php?newsletter_del_id=<?php echo $res['newsletter_id']; ?>"><i class="bx bx-trash me-1"></i> Delete</a>
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
if (isset($_SESSION['newsletter_deleted'])) {
?>

    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "2000",
            "positionClass": "toast-bottom-right",
            "toastClass": "toast toast-red"
        };
        toastr.success("Email DELETED!");
    </script>

<?php
    unset($_SESSION['newsletter_deleted']);
}
?>