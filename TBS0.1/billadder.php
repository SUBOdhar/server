<?php
if (isset($_GET['name'])) {
    $name = $_GET['name'];
}
$target_dir = "upload/";
$target_path = $target_dir . basename($_FILES['image']['name']);
if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
}
$db = new SQLite3('svp.db');
$info = $_POST['info'];
$billname = $_POST['name2'];
$image = $target_path;
$date = $_POST['date'];
$choose = $_POST['choose'];
$product = $_POST['product'];
foreach ($product as $values) {
    $query = $db->exec("INSERT INTO bill (name, bill, info, billimg, choose, product, time) VALUES ('$name', '$billname', '$info', '$image', '$choose', '$values', '$date')");
    $ret = $db->exec($sql);
}
if (!$query) {
    echo $db->lastErrorMsg();
}
header('location:dealer.php');
$db->close();
?>