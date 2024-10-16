<?php include_once('header.php');
error_reporting(0);
?>

<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <?php
        if (isset($_GET['about_edit_id'])) {

            $about_edit_id = $_GET['about_edit_id'];

            $fetch_data = mysqli_query($con, "select * from about_tbl where about_id='$about_edit_id'");

            $show = mysqli_fetch_array($fetch_data);
        }
        ?>
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">About</h5>
                        <a href="manage_about.php" class="btn btn-primary">Manage About</a>
                    </div>
                    <div class="card-body">
                        <form action="controller.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="about_edit_id" value="<?php echo $show['about_id'] ?>">


                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">About image</label>
                                <input type="file" name="about_img" class="form-control" />
                            </div>
                            <?php
                            if (isset($_GET['about_edit_id'])) {
                                if ($about_edit_id) {
                            ?>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-company">About image </label>
                                        <img src="uploaded_img/<?php echo $show['about_img'] ?>" width="100px" alt="">
                                        <input type="hidden" name="about_old_img" value="<?php echo $show['about_img'] ?>">
                                    </div>
                            <?php
                                }
                            }
                            ?>

                            <div class="mb-3">
                                <label class="form-label">About Description</label>
                                <textarea id="summernote" type="text" class="form-control" name="about_description" required="requird"><?php echo $show['about_description']; ?></textarea>
                            </div>
                            <?php
                            if (isset($_GET['about_edit_id'])) { ?>
                                <button type="submit" name="about_update_btn" class="btn btn-primary">Update About</button>
                            <?php  } else {
                            ?>
                                <button type="submit" name="about_add_btn" class="btn btn-primary">Add About</button>
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
if (isset($_SESSION['about_insert'])) { ?>

    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "2000",
            "positionClass": "toast-bottom-right",
            "toastClass": "toast toast-pink"
        };
        toastr.success("About INSERTED!");
    </script>

<?php
    unset($_SESSION['about_insert']);
}
?>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'About Description',
            height: 250
        });
    })
</script>