<?php
$email = $_POST['email'];
$passd = $_POST['password'];

// Include the file containing database connection logic
include '../db/mysql.php';

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
        echo "" . $passd . "" . $row["password"];
        // Verify the entered password against the hashed password in the database
        if (($passd == $row["password"])) {
            $endcmail = bin2hex($email);  // Use bin2hex for encoding
            header("Location: otp.php?email=$endcmail");
        } else {
            header("location: /login/");
        }
    } else {
        echo "No results found for the given email.";
    }
}

// Close the database connection (if needed)
$stmt->close();
$conn->close();
?>