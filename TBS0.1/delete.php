<?php

$db = new SQLite3('svp.db');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$query2 = $db->query("SELECT * from svp where id = '$id'");
$row = $query2->fetchArray(SQLITE3_ASSOC);
unlink($row['image']);
$query = $db->exec("DELETE from svp where id = '$id'");
$db->close();
header('location:dealer.php');
?>