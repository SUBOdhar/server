<?php

function scanDirectory($directoryPath)
{
    $items = scandir($directoryPath);

    // Separate directories and files
    $directories = [];
    $files = [];

    foreach ($items as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        $itemPath = $directoryPath . '/' . $item;

        if (is_dir($itemPath)) {
            $directories[] = $item;
        } else {
            $files[] = $item;
        }
    }

    // Sort directories and files
    sort($directories);
    sort($files);

    // Display directories
    foreach ($directories as $dir) {
        echo '<div class="small-box directory-box" onclick="openDirectory(\'' . $directoryPath . '/' . $dir . '\')">';
        echo '<i class="icon directory-icon">📁</i>';
        echo '<span class="dirname">' . $dir . '</span>';
        echo '</div>';
    }

    // Display files
    foreach ($files as $file) {
        echo '<div class="small-box file-box" onclick="openFile(\'' . $directoryPath . '/' . $file . '\')">';
        echo '<i class="icon file-icon">📄</i>';
        echo '<span class="filename">' . $file . '</span>';
        echo '</div>';
    }
}

// Check if the item parameter is set
if (isset($_GET['item'])) {
    $item = $_GET['item'];

    // Ensure the item parameter is safe
    $item = realpath($item);

    // Check if the item exists
    if (file_exists($item)) {
        if (is_dir($item)) {
            scanDirectory($item);
        } else {
            // If it's a file, you can add custom logic here to open or display the file
            // For example, let's create a link to download the file
            echo '<a href="' . $item . '" class="small-box file-box">';
            echo '<i class="icon file-icon">📄</i>';
            echo '<span class="filename">' . basename($item) . '</span>';
            echo '</a>';
        }
    } else {
        echo 'Invalid item.';
    }
} else {
    echo 'Item parameter is missing.';
}
?>