<?php
// Database connection details
$servername = "localhost";
$username = "svp";
$password = "Svp1234@";
$dbname = "your_database_name";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

// Get data from the POST request
$publicIp = $_POST['publicIp'];
$country = $_POST['country'];
$city = $_POST['city'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Insert data into the database
$sql = "INSERT INTO your_table_name (public_ip, country, city, latitude, longitude) VALUES ('$publicIp', '$country', '$city', '$latitude', '$longitude')";

if($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: ".$sql."<br>".$conn->error;
}

// Close the connection
$conn->close();

?>