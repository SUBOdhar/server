<?php
$name = $_GET['name'];
try {
    include '../db/mysql.php';

    $stmt = $conn->prepare("DELETE FROM product WHERE name = ?");
    $stmt->bind_param('s', $name); // 's' indicates a string parameter

    $result = $stmt->execute();

    if ($result) {
        header('Location: /page/?success');
    } else {
        header('Location: /page/?failure');
    }

    $db->close();
} catch (Exception $e) {
    // Handle database connection or query errors
    echo "Error: " . $e->getMessage();
}
?>