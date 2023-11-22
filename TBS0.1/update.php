<?php

if (isset($_GET['id'])) {
    $i = $_GET['id'];
}
$db2 = new SQLite3('svp.db');
$query2 = $db2->query("SELECT * from svp WHERE id='$i'");
$row = $query2->fetchArray(SQLITE3_ASSOC);
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form-update</title>
    <link rel="stylesheet" href="style-form.css">
</head>

<body>
    <div class="out">

        <form method="post" action="updater.php?id=<?php echo $i; ?>" class="form" enctype="multipart/form-data">
            <h1>Update data</h1>
            <div class="namebox">
                <label for="name">Name:</label><br>
                <input type="text" name="name" class="name" id="name" placeholder="Enter name" autocomplete="off"
                    value="<?php echo $row['name']; ?>">
            </div>
            <div class="phonebox">
                <label for="phone">Phone no:</label><br>
                <input type="number" name="phone" class="phone" id="phone" placeholder="Enter phone no"
                    autocomplete="off" value="<?php echo $row['phoneno']; ?>">
            </div>
            <div class="moneybox">
                <label for="money">Money:</label><br>
                <input type="text" name="money" class="money" id="money" placeholder="Enter money" autocomplete="off"
                    value="<?php echo $row['money']; ?>">
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</body>

</html>