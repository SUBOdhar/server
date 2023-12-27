<?php
// Enable error reporting and display errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$output = $_POST['otp'];
$email = $_POST['Email'];
$i1 = $_POST['in1'];

if ($output == $i1) {
    // Make a secure request to ipinfo.io to get user's IP and location information
    $ipinfo_url = 'https://ipinfo.io';
    $ipinfo_data = file_get_contents($ipinfo_url);

    if ($ipinfo_data !== false) {
        $ipinfo_details = json_decode($ipinfo_data, true);

        // Extract relevant information
        $userIp = $ipinfo_details['ip'];
        $city = $ipinfo_details['city'];

        // Combine IP and city information
        $combine = $userIp . '' . $city;

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
        if (!$result) {
            echo "Database error: " . $conn->error;
        } else {
            // Check if the result set is not empty
            if ($result->num_rows > 0) {
                // Fetch the user data
                $row = $result->fetch_assoc();

                // Set a cookie with the combined information
                setcookie("net", $combine, time() + 2 * 24 * 60 * 60, "/", "", true, true);
                setcookie("token", $row['name'], time() + 2 * 24 * 60 * 60, "/", "", true, true);
                header("location: /page/");
            } else {
                echo "No results found for the given email.";
                header("location: /login/");
            }
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    } else {
        header("location: /login/");

        echo "Error fetching IP and location information.";
    }
}
?>