<?php
// hello.php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo "Hello, World";
}

// post_handler.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true); // Assuming JSON is sent
    $message = $data['message']; // Accessing the data sent
    echo "Received: " . $message;
}
?>