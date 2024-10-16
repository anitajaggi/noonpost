
<?php include_once('db-connection.php');

session_start();
session_destroy();
header('location:login.php');
exit();
?>