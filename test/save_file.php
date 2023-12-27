<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['fileContent'])) {
        $fileContent = $_POST['fileContent'];

        // Specify the path to the file you want to save
        $filePath = 'path/to/your/file.txt';

        // Save the content to the file
        file_put_contents($filePath, $fileContent);
        echo 'File saved successfully.';
    } else {
        echo 'File content parameter is missing.';
    }
} else {
    echo 'Invalid request method.';
}
?>