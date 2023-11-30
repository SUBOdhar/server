<?php
$email = $_GET['email'];
$password = $_GET['password'];

// Debugging: Display the received email and password
echo "Debugging: Received Email - $email<br>";
echo "Debugging: Received Password - $password<br>";

class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('login.db');
    }
}

// Create an instance of the database
$db = new MyDB();

// Check if the database was opened successfully
if (!$db) {
    die("Database error: " . $db->lastErrorMsg());
} else {
    echo 'a';
}

// Debugging: Display a message if the database connection is successful
echo "Debugging: Database connection successful<br>";

// Define the SQL query to select user data using a prepared statement
$sql = "SELECT * FROM login WHERE email = :email";
$stmt = $db->prepare($sql);

// Bind the parameter
$stmt->bindParam(':email', $email, SQLITE3_TEXT);

// Execute the prepared statement
$result = $stmt->execute();

// Check if the query was successful
if (!$result) {
    echo "Database error: " . $db->lastErrorMsg();
} else {
    // Fetch the user data
    $row = $result->fetchArray(SQLITE3_ASSOC);

    // Debugging: Display the fetched user data
    echo "Debugging: Fetched User Data - " . print_r($row, true) . "<br>";
    $n = $row['password'];
    $u = $row['username'];
    // Check if the user exists and the password is correct
    if ($password == $n) {

        // Set a cookie with the username
        setcookie("token", $u, time() + 2 * 24 * 60 * 60, "/"); // Set cookie

        // Debugging: Display a message after setting the cookie
        echo "Debugging: Cookie set successfully<br>";

        header('location: /page/');

    } else {
        header('location: /login/');
    }
}

// Close the database connection
$db->close();
?>