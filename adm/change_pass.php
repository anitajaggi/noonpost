<?php include_once('header.php') ?>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Change Password</h5>
                    </div>
                    <div class="card-body">
                        <form action="controller.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Old Password</label>
                                <input type="password" name="old_pass" class="form-control" required="requird" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" name="new_pass" class="form-control" required="requird" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_pass" class="form-control" required="requird" />
                            </div>
                            <button type="submit" name="change_pass_btn" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
<!-- Content wrapper -->

<?php include_once('footer.php') ?>

<?php
if (isset($_SESSION['pass_changed'])) { ?>

    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "2000",
            "positionClass": "toast-bottom-right",
            "toastClass": "toast toast-pink"
        };
        toastr.success("Password CHANGED!");
    </script>

<?php
    unset($_SESSION['pass_changed']);
}
?>