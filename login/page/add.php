<?php
$name = $_POST['nname'];
$qty = $_POST['qty'];
$batch = $_POST['batch-no'];
$mfd = $_POST['mfd'];
$exd = $_POST['EXD'];
$mrp = $_POST['MRP'];

if (!empty($name) && !empty($qty) && !empty($mfd) && !empty($exd) && !empty($mrp)) {
    class MyDB extends SQLite3
    {
        function __construct()
        {
            $this->open('prd.db');
        }
    }
    echo 'a';
    // Attempt to create a database connection
    $db = new MyDB();
    if (!$db) {
        echo "Error connecting to the database: " . $db->lastErrorMsg();
    } else {
        echo 'Database opened<br>';

        $sql = "INSERT INTO inf (name, qty, batch, mfd, exd, mrp) VALUES ('$name', '$qty', '$batch', '$mfd', '$exd', '$mrp')";

        // Execute the INSERT statement
        $ret = $db->exec($sql);

        if (!$ret) {
            echo "Error inserting data: " . $db->lastErrorMsg();
        } else {
            echo "Data added successfully";
        }

        // Close the database connection
        $db->close();
        header("location:/login/page/?success");
    }
} else {
    echo "One or more required fields are empty.";
    header("location:/login/page/?error");
}
