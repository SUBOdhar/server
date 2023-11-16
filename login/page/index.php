<!DOCTYPE html>
<html>
<?php if (!$_COOKIE["token"]) {
    header('location:/login/login/');
}

$db3 = new SQLite3('prd.db');
$sql = <<<EOF

SELECT * from inf;
EOF;
$ret = $db->query($sql);

 ?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-form.css">

</head>

<body>
    <nav class="topnav">
        <ion-icon name="menu-outline" onclick="openNav()"></ion-icon>
        <p class="welcome">
            Welcome
            <?php echo $_COOKIE["token"] ?>
        </p>
    </nav>
    <div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><ion-icon
                name="close-outline"></ion-icon></a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div>

    <ul class="product-form" id="product-form">
        <form action="add.php" method="post">
            <li class="box-form">
                <div class="name-form">
                    <div class="inname-form" id="inname-form">
                        <i class="fas fa-cube"></i> Name:
                    </div><input class="input" id="input" type="text" name="nname" placeholder="Enter product name">
                </div>
                <div class="qty-form">
                    <div class="inname-form" id="inname-form">
                        <i class="fas fa-shopping-cart"></i> Quantity:
                    </div> <input class="input" id="input" placeholder="Enter Qty" type="number" name="qty">
                </div>
                <div class="batchno-form">
                    <div class="inname-form" id="inname-form">
                        <i class="fas fa-barcode"></i> Batch no:
                    </div> <input class="input" id="input" placeholder="Enter batch no" type="text" name="batch-no">
                </div>
                <div class="mfd-form">
                    <div class="inname-form" id="inname-form">
                        <i class="fas fa-calendar-alt"></i> Manufacture date:
                    </div><input class="input" id="input" type="date" name="mfd">
                </div>
                <div class="expir-form">
                    <div class="inname-form" id="inname-form">
                        <i class="fas fa-calendar-times"></i> Expiry date:
                    </div> <input class="input" id="input" type="date" name="EXD">
                </div>
                <div class="mrp-form">
                    <div class="inname-form" id="inname-form">
                        <ion-icon name="cash-outline"></ion-icon> MRP:
                    </div> <input class="input" id="input" type="number" name="MRP" placeholder="Enter mrp">
                </div>
            </li>
            <div class="tick">
                <button onclick="save()" id="btn">
                    <ion-icon name="save-outline" style="font-size: 15px;"></ion-icon>
                </button>
            </div>
        </form>
    </ul>
    <ul class="product" id="product">
        
    while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
    $i = $row['id'];
}<li class="box">
            <div id="name" class="name">
                <div class="inname">
                    <i class="fas fa-cube"></i> Name:
                </div>SUbod
            </div>
            <div id="qty" class="qty">
                <div class="inname">
                    <i class="fas fa-shopping-cart"></i> Quantity:
                </div> 10
            </div>
            <div id="batchno" class="batchno">
                <div class="inname">
                    <i class="fas fa-barcode"></i> Batch no:
                </div> BADSA1
            </div>
            <div id="mfd" class="mfd">
                <div class="inname">
                    <i class="fas fa-calendar-alt"></i> MFD:
                </div> 2323
            </div>
            <div id="expir" class="expir">
                <div class="inname">
                    <i class="fas fa-calendar-times"></i> EXD:
                </div> 3242
            </div>
        </li>
    </ul>
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">

            <div class="ring">Loading
                <span></span>
            </div>
        </div>

    </div>

    <div class="add" onclick="add()">
        <ion-icon name="add-outline" style="font-size: 40px;color: white;"></ion-icon>
    </div>

    <script src="script.js"></script>

</body>

</html>