<?php
$servername = "localhost";
$username = "root";
$password = "Subodh4444@";
$dbname = "subodh"; // Replace with your actual database name
echo"a";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "Connected successfully";
?>