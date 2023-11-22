<?php


$db = new SQLite3('svp.db');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$name=$_POST['name'];
$phone=$_POST['phone'];
$money=$_POST['money'];
$query = $db->exec("  UPDATE svp set name ='$name', phoneno='$phone', money='$money' WHERE id='$id'");
$db->close();
header('location:dealer.php');

?>