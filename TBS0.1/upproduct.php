<?php


$db = new SQLite3('stock.db');

if (isset($_GET['name'])) {
    $name = $_GET['name'];
}
$new = base64_encode($name);
$number = $_POST['number'];

// Use a prepared statement to prevent SQL injection
$stmt = $db->prepare("UPDATE stock SET number = :number WHERE name = :name");
$stmt->bindValue(':number', $number, SQLITE3_INTEGER);
$stmt->bindValue(':name', $name, SQLITE3_TEXT);

$result = $stmt->execute();

if ($result) {
    header('location:product.php');

} else {
    // Handle error if the update fails
    // You can customize the error handling as per your needs
    echo "Error updating record: " . $db->lastErrorMsg();
}
$db->close();
?>