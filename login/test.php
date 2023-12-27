<?php
// Include the database connector file
include '../db/mysql.php';

$email = 'aryalsubodh4@gmail.com';
// SQL query to retrieve data from the "login" table where email matches
$sql = "SELECT * FROM login WHERE email = ?";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the parameter
$stmt->bind_param("s", $email);

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if the query was successful
if (!$stmt) {
    echo "Database error: " . $conn->error;
} else {
    // Check if the result set is not empty
    if ($result->num_rows > 0) {
        // Fetch the user data
        $row = $result->fetch_assoc();

        // Output or process the data as needed
        print_r($row);
    } else {
        echo "No results found for the given email.";
    }
}

// Close the database connection
?>
