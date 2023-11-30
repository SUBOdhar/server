<?php
$name = $_GET['name'];
try {
    $db = new SQLite3('prd.db');

    // Use prepared statements to prevent SQL injection
    $stmt = $db->prepare("DELETE FROM inf WHERE name = :name");
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);

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