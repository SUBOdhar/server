<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form-upload</title>
    <link rel="stylesheet" href="style-form.css">
</head>

<body>
    <div class="out">

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form" enctype="multipart/form-data">
            <h1>Insert data</h1>
            <div class="namebox">
                <label for="name">Product name:</label><br>
                <input type="text" name="name" class="name" id="name" placeholder="Enter product name"
                    autocomplete="off">
            </div>
            <div class="phonebox">
                <label for="phone">Product price:</label><br>
                <input type="number" name="price" class="phone" id="phone" placeholder="Enter product price"
                    autocomplete="off">
            </div>
            <div class="moneybox">
                <label for="money">Available stock:</label><br>
                <input type="number" name="number" class="money" id="money" placeholder="Enter available stock"
                    autocomplete="off">
            </div>

            <div><button type="submit" class="add">Add</button> </div>
        </form>
        <a href="dealer.php" style="float:right;color:black;" class="cancel">cancel </a>
    </div>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $db = new SQLite3('stock.db');
        $name = $_POST['name'];
        $nwe = base64_encode($name);
        $price = $_POST['price'];
        $number = $_POST['number'];

        $sql = <<<EOF
      INSERT INTO stock (name, price, number)
      VALUES ("$nwe", $price, $number)
EOF;

        $ret = $db->exec($sql);
        if (!$ret) {
            echo $db->lastErrorMsg();
        }
        $db->close();
        header('Location: product.php');
        exit();
    }
    ?>
</body>

</html>