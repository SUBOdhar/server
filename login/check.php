<?php
$output = $_POST['otp'];
$pass = $_POST['password'];
$user = $_POST['username'];
$email = $_POST['Email'];
$i1 = $_POST['in1'];
$i2 = $_POST['in2'];
$i3 = $_POST['in3'];
$i4 = $_POST['in4'];
$otp = $i1 . $i2 . $i3 . $i4;
if ($output == $otp) {
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
}



?>