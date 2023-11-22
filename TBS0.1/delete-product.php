<?php


$db = new SQLite3('stock.db');
if (isset($_GET['name'])) {
    $name = $_GET['name'];
}
$query = $db->exec("DELETE from stock where name = '$name'");
$db->close();
header('location:product.php');
?>