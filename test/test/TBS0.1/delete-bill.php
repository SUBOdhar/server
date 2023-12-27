
<?php
$db = new SQLite3('svp.db');
if (isset($_GET['bill'])) {
    $bill = $_GET['bill'];
    $product= $_GET['product'];
}
if (!empty($product)) {
    $query = $db->exec("DELETE from bill where product = '$product'");
    $db->close();
    header('location:dealer.php');
}else {
$query2 = $db->query("SELECT * from bill where bill = '$bill'");
$row = $query2->fetchArray(SQLITE3_ASSOC);
unlink($row['billimg']);
$query = $db->exec("DELETE from bill where bill = '$bill'");
$db->close();
header('location:dealer.php');}
?>










