<?php

$servername = "localhost";
$username = "svp";
$password = "Svp1234@";
$database = "svp";
$conn;

// Constructor to establish a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // echo "connected successful";
}
?>