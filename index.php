<?php

$user = $_COOKIE["token"];

// Database connection and query
try {
    $db = new SQLite3('./login/database/login.db');
    
    // TODO: Perform proper validation and sanitization of $user to prevent SQL injection
    
    $query = "SELECT * FROM login WHERE username = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $user, SQLITE3_TEXT);
    
    $result = $stmt->execute();

    if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        // User found in the database, redirect to the login page
        header("location:/login/page/");
        exit();
    } else {
        // User not found, redirect to the home page
        header("location:/home");
        exit();
    }
} catch (Exception $e) {
    // Handle database connection or query errors
    echo "Error: " . $e->getMessage();
}
?>
