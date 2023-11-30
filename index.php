<?php
header("./db/database/login.db");
// Validate and sanitize the user input (token)
$user = $_COOKIE["token"];
// // Perform proper validation and sanitization
// if (!ctype_alnum($user)) {
//     // Handle invalid input
//     header("location:/error");
//     exit();
// }

// Database connection and query
try {
    if ($user == "") {
        header("location:/home/");
    }
    // Establish the database connection within the try block
    $db = new SQLite3('./db/database/login.db');

    // TODO: Perform proper validation and sanitization of $user to prevent SQL injection
    $query = "SELECT * FROM login WHERE username = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $user, SQLITE3_TEXT);

    $result = $stmt->execute();

    // Fetch the result
    $row = $result->fetchArray(SQLITE3_ASSOC);

    // Check if the user was found
    if ($row) {
        // User found in the database, redirect to the login page
        header("location:/page/");
        echo $user;
        exit();
    } else {
        // User not found, redirect to the home page
        header("location:/home/");
        exit();
    }
} catch (Exception $e) {
    // Handle database connection or query errors
    echo "Error: " . $e->getMessage();
} finally {
    // Close the database connection in the finally block
    if (isset($db)) {
        $db->close();
    }
}
?>