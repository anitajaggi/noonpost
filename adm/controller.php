
<?php

include_once('db-connection.php');
session_start();

// ~~~~~~~~~~LOGIN
// ---------------------

if (isset($_POST['login_btn'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $login_qry = mysqli_query($con, "select * from login_tbl where email='$email' and password='$password'");

    $count = mysqli_num_rows($login_qry);

    if ($count > 0) {
        $_SESSION['isacctive'] = $email;
        header('location:index.php');
    } else {
        $_SESSION['login_error'] = '1';
        header('location:login.php');
    }
}

// ~~~~~~~~~~CHANGE PASSWORD
// ---------------------

if (isset($_POST['change_pass_btn'])) {

    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    $select_pass = mysqli_query($con, "select * from login_tbl where password='$old_pass'");

    $check_old_pass = mysqli_num_rows($select_pass);

    if ($check_old_pass) {
        if ($new_pass == $confirm_pass) {
            $pass_update = mysqli_query($con, "update login_tbl set password='$new_pass'");
            if ($pass_update) {
                $_SESSION['pass_changed'] = '1';
                header('location:change_pass.php');
            }
        }
    }
}

// ~~~~~~~~~~BLOG INSERT
// ---------------------

if (isset($_POST['add_blog_btn'])) {

    $blog_title = $_POST['blog_title'];
    $blog_date = $_POST['blog_date'];
    $blog_short_desc = $_POST['blog_short_desc'];
    $blog_long_desc = $_POST['blog_long_desc'];

    $blog_img = $_FILES['blog_img']['name'];
    $tmpname = $_FILES['blog_img']['tmp_name'];
    move_uploaded_file($tmpname, "uploaded_img/$blog_img");

    $blog_tag = $_POST['blog_tag'];
    $author_name = $_POST['author_name'];

    $author_img = $_FILES['author_img']['name'];
    $author_tmp = $_FILES['blog_img']['tmp_name'];
    move_uploaded_file($author_tmp, "uploaded_img/$author_img");

    $slug = strToLower(str_replace(" ", "-", str_replace(str_split('\/:.()?"<>!=_|$%^&#{}[],+`~@'), '', $blog_title)));
    $slug = preg_replace('/-+/', '-', $slug);
    $slug = trim($slug, '-');

    $blog_insert = mysqli_query($con, "insert into add_blog(blog_title,blog_date,blog_short_desc,blog_long_desc,blog_img,blog_tag,author_name,author_img,slug) values('$blog_title','$blog_date','$blog_short_desc','$blog_long_desc','$blog_img','$blog_tag','$author_name','$author_img','$slug')");

    if ($blog_insert) {
        $_SESSION['data_inserted'] = '1';
        header('location:blog_add.php');
    }
}

// ~~~~~~~~~~BLOG DELETE
// ---------------------

if (isset($_GET['del_id'])) {
    $del_id = $_GET['del_id'];

    $del_blog = mysqli_query($con, "UPDATE `add_blog` SET `status`='0' where blog_id='$del_id'");

    if ($del_blog) {
        $_SESSION['data_deleted'] = '1';
        header('location:blog_list.php');
    }
}

// ~~~~~~~~~~BLOG UPDATE
// ---------------------

if (isset($_POST['update_blog_btn'])) {

    $edit_id = $_POST['edit_id'];
    $blog_title = $_POST['blog_title'];
    $blog_date = $_POST['blog_date'];
    $blog_short_desc = $_POST['blog_short_desc'];
    $blog_long_desc = $_POST['blog_long_desc'];
    $blog_tag = $_POST['blog_tag'];
    $author_name = $_POST['author_name'];
    $blog_img = $_FILES['blog_img']['name'];
    $author_img = $_FILES['author_img']['name'];

    if ($author_img == '') {
        $author_img = $_POST['author_old_img'];
    } else {
        $author_img = $_FILES['author_img']['name'];
        $author_tmp = $_FILES['author_img']['tmp_name'];
        move_uploaded_file($author_tmp, "uploaded_img/$author_img");
    }

    if ($blog_img == '') {
        $blog_img = $_POST['old_img'];
    } else {
        $blog_img = $_FILES['blog_img']['name'];
        $blog_tmp = $_FILES['blog_img']['tmp_name'];
        move_uploaded_file($blog_tmp, "uploaded_img/$blog_img");
    }

    $update_qry = mysqli_query($con, "update add_blog set blog_title='$blog_title',blog_date='$blog_date',blog_short_desc='$blog_short_desc',blog_long_desc='$blog_long_desc',blog_tag='$blog_tag',author_name='$author_name',author_img='$author_img', blog_img='$blog_img' where blog_id='$edit_id'");

    if ($update_qry) {
        $_SESSION['data_updated'] = '1';
        header('location:blog_list.php');
    }
}

// ~~~~~~~~~~BANNER INSERT
// ---------------------

if (isset($_POST['banner_add_btn'])) {
    $banner_title = $_POST['banner_title'];
    $banner_img = $_FILES['banner_img']['name'];
    $banner_tmp = $_FILES['banner_img']['tmp_name'];
    move_uploaded_file($banner_tmp, "uploaded_img/$banner_img");

    $banner_insert = mysqli_query($con, "INSERT INTO banner_tbl(banner_title, banner_img) VALUES ('$banner_title','$banner_img')");

    if ($banner_insert) {
        $_SESSION['banner_insert'] = '1';
        header('location:banner_add.php');
    }
}

// ~~~~~~~~~~BANNER DELETE
// ---------------------

if (isset($_GET['banner_del_id'])) {
    $banner_del_id = $_GET['banner_del_id'];

    $del_banner = mysqli_query($con, "delete from banner_tbl where banner_id='$banner_del_id'");

    if ($del_banner) {
        $_SESSION['banner_deleted'] = '1';
        header('location:banner_manage.php');
    };
};

// ~~~~~~~~~~BANNER UPDATE
// ---------------------

if (isset($_POST['banner_update_btn'])) {
    $banner_edit_id = $_POST['banner_edit_id'];
    $banner_title = $_POST['banner_title'];
    $banner_img = $_FILES['banner_img']['name'];

    if ($banner_img == '') {
        $banner_img = $_POST['banner_old_img'];
    } else {
        $banner_img = $_FILES['banner_img']['name'];
        $banner_tmp = $_FILES['banner_img']['tmp_name'];
        move_uploaded_file($banner_tmp, "uploaded_img/$banner_img");
    }

    $banner_update = mysqli_query($con, "UPDATE banner_tbl SET banner_title='$banner_title',banner_img='$banner_img' WHERE banner_id='$banner_edit_id'");

    if ($banner_update) {
        $_SESSION['banner_updated'] = '1';
        header('location:banner_manage.php');
    }
}

// ~~~~~~~~~~NEWSLETTER DELETE
// ---------------------

if (isset($_GET['newsletter_del_id'])) {
    $newsletter_del_id = $_GET['newsletter_del_id'];

    $newsletter_delete = mysqli_query($con, "UPDATE newsletter_tbl SET `status`='0' where newsletter_id =' $newsletter_del_id'");

    if ($newsletter_delete) {
        $_SESSION['newsletter_deleted'] = '1';
        header('location:news_letter_manage.php');
    }
}

// ~~~~~~~~~~CONTACT MESSAGE DELETE
// ----------------------

if (isset($_GET['msg_del_id'])) {
    $msg_del_id = $_GET['msg_del_id'];

    $msg_del = mysqli_query($con, "UPDATE contact_tbl SET `status`='0' where contact_id='$msg_del_id'");

    if ($msg_del) {
        $_SESSION['msg_delete'] = '1';
        header('location:contact_manage.php');
    }
}


// ~~~~~~~~~~ABOUT INSERT
// ---------------------

if (isset($_POST['about_add_btn'])) {
    $about_description = $_POST['about_description'];
    $about_img = $_FILES['about_img']['name'];
    $about_tmp = $_FILES['about_img']['tmp_name'];
    move_uploaded_file($about_tmp, "uploaded_img/$about_img");

    $about_insert = mysqli_query($con, "INSERT INTO about_tbl(about_img,about_description) VALUES ('$about_img','$about_description')");

    if ($about_insert) {
        $_SESSION['about_insert'] = '1';
        header('location:add_about.php');
    }
}

// ~~~~~~~~~~ABOUT UPDATE
// ---------------------

if (isset($_POST['about_update_btn'])) {
    $about_edit_id = $_POST['about_edit_id'];
    $about_description = $_POST['about_description'];
    $about_img = $_FILES['about_img']['name'];

    if ($about_img == '') {
        $about_img = $_POST['about_old_img'];
    } else {
        $about_img = $_FILES['about_img']['name'];
        $about_tmp = $_FILES['about_img']['tmp_name'];
        move_uploaded_file($about_tmp, "uploaded_img/$about_img");
    }

    $about_update = mysqli_query($con, "UPDATE about_tbl SET about_description='$about_description',about_img='$about_img' WHERE about_id='$about_edit_id'");

    if ($about_update) {
        $_SESSION['about_updated'] = '1';
        header('location:manage_about.php');
    }
}

// ~~~~~~~~~~ABOUT DELETE
// ----------------------

if (isset($_GET['about_del_id'])) {
    $about_del_id = $_GET['about_del_id'];

    $about_del = mysqli_query($con, "UPDATE about_tbl SET `status`='0' where about_id='$about_del_id'");

    if ($about_del) {
        $_SESSION['about_delete'] = '1';
        header('location:manage_about.php');
    }
}

?>