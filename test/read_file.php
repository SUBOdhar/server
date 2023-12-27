<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['file'])) {
        $filePath = $_GET['file'];
        $fileContent = file_get_contents($filePath);
        echo $fileContent;
    } else {
        echo 'File parameter is missing.';
    }
} else {
    echo 'Invalid request method.';
}
?>