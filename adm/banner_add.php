<?php include_once('header.php');
error_reporting(0);
?>

<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <?php
        if (isset($_GET['banner_edit_id'])) {

            $banner_edit_id = $_GET['banner_edit_id'];

            $fetch_data = mysqli_query($con, "select * from banner_tbl where banner_id='$banner_edit_id'");

            $show = mysqli_fetch_array($fetch_data);
        }
        ?>
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add Banner</h5>
                        <a href="banner_manage.php" class="btn btn-primary">Manage Banner</a>
                    </div>
                    <div class="card-body">
                        <form action="controller.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="banner_edit_id" value="<?php echo $show['banner_id'] ?>">
                            <div class="mb-3">
                                <label class="form-label">Banner title</label>
                                <input type="text" class="form-control" name="banner_title" value="<?php echo $show['banner_title']; ?>" required="requird" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Banner image</label>
                                <input type="file" name="banner_img" class="form-control" />
                            </div>
                            <?php
                            if (isset($_GET['banner_edit_id'])) {
                                if ($banner_edit_id) {

                            ?>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-company">Banner image </label>
                                        <img src="uploaded_img/<?php echo $show['banner_img'] ?>" width="100px" alt="">
                                        <input type="hidden" name="banner_old_img" value="<?php echo $show['banner_img'] ?>">
                                    </div>
                            <?php
                                }
                            }
                            ?>
                            <?php
                            if (isset($_GET['banner_edit_id'])) { ?>
                                <button type="submit" name="banner_update_btn" class="btn btn-primary">Update Bannner</button>
                            <?php  } else {
                            ?>
                                <button type="submit" name="banner_add_btn" class="btn btn-primary">Add Bannner</button>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer.php') ?>

<?php
if (isset($_SESSION['banner_insert'])) { ?>

    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "2000",
            "positionClass": "toast-bottom-right",
            "toastClass": "toast toast-pink"
        };
        toastr.success("Banner INSERTED!");
    </script>

<?php
    unset($_SESSION['banner_insert']);
}
?>