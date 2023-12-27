<!DOCTYPE html>
<html>

<body>

    <?php

    include '../db/mysql.php';
    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        print_r($row);
    }
    ?>

</body>

</html>