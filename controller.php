
<?php
include_once('adm/db-connection.php');
session_start();

if (isset($_POST['newletter_btn'])) {
    $newsletter_email = $_POST['newsletter_email'];

    $check_email = mysqli_query($con, "select * from newsletter_tbl where newsletter_email='$newsletter_email'");

    $count = mysqli_num_rows($check_email);

    if ($count > 0) {
        $_SESSION['sub_email_error'] = '1';
        header('location:index.php');
    } else {
        $insert_newsletter = mysqli_query($con, "insert into newsletter_tbl(newsletter_email)values('$newsletter_email');");
        $_SESSION['sub_email_success'] = '1';
        header('location:index.php');
    }
}

if (isset($_POST['send_msg_btn'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if (!preg_match("/^\d{10}$/", $contact)) {
        $_SESSION['contact_error'] = '1';
        header('location:contact.php');
    } else {
        $insert_contact = mysqli_query($con, "INSERT INTO contact_tbl (name, contact, email, subject, message) VALUES ('$name','$contact', '$email', '$subject', '$message')");

        if ($insert_contact) {
            $_SESSION['msg_send'] = '1';
            header('location:contact.php');
        } else {
            $_SESSION['msg_error'] = '1';
            header('location:contact.php');
        }
    }
}

// if (isset($_POST['comment_submit'])) {
//     $blog_id = $_POST['blog_id'];
//     $person_comment = $_POST['person_comment'];
//     $person_name = $_POST['person_name'];
//     $person_email = $_POST['person_email'];

//     $comment_insert = mysqli_query($con, "insert into comments_tbl(blog_id,person_comment,person_name,person_email)values('$blog_id','$person_comment','$person_name','$person_email')");

//     if ($comment_insert) {
//         $_SESSION['comment_insert'] = '1';
//         header('location:blog_detail.php');
//     }
// }

?>