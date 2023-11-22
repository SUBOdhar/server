<?php

$db2 = new SQLite3('stock.db');
$ret5 = $db2->query("SELECT * from stock");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Billing System | Funcode</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="svp.png" type="image/x-icon">
    <link rel="stylesheet" href="style-ing.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <div class="nav">
        <img src="./svp.png" alt="subodh vet pharma">


        <div class="mainn">
            <a href="dealer.php" style="color:black;">
                <div class="loan">
                    <ion-icon name="people-outline"></ion-icon>
                    Dealers
                </div>
            </a>
            <a href="pradd.php" style="color:black;">
                <div class="addproduct">
                    <button class="button">
                        <ion-icon name="add-outline"></ion-icon>
                        Add Product
                    </button>
                </div>
            </a>
            <!-- <div class="search">
        <input placeholder="Search.." id="searchbar" onkeyup="search()">
      </div> -->
        </div>
    </div>
    <ul class="sortable-product" id="sortable-product">
        <h1>Product</h1>
        <div class="a">Product name<div class="money">Price</div>
            <div class="pho">Available stock</div>
            <div class="money">update stock</div>
        </div>
        <?php
        while ($row5 = $ret5->fetchArray(SQLITE3_ASSOC)) {
            ?>
            <div class="st">
                <?php $nm = base64_decode($row5['name']);
                echo $nm; ?>
                <div class="price">Rs
                    <?php echo $row5['price']; ?>
                </div>
                <div class="avastock">
                    <?php echo $row5['number']; ?>
                </div>

                <form action="upproduct.php?name=<?php echo $row5['name']; ?>" method="post"><input type="number"
                        name="number">
                </form>
                <div>
                    <a href="delete-product.php?name=<?php echo $row5['name']; ?>">
                        <ion-icon name="trash-outline"></ion-icon>
                    </a>
                </div>

            </div>
        <?php }
        $db->close(); ?>
    </ul>

</body>

</html>