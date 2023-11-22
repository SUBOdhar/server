<?php
session_start();
$url = $_GET['url'];
if ((!empty($_SESSION['username'])) && (!empty($_SESSION['password']))) {
    header("location:$url");
} else {
    header('location:index.php');
}
?>