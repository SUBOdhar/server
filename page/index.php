<!DOCTYPE html>
<html>

<?php

if (!isset($_COOKIE["token"])) {
    // Redirect to login/page if the user is not logged in
    header('location: /login/');
}


function calculateDaysRemaining($mfd, $exd)
{
    $mfdDate = new DateTime($mfd);
    $exdDate = new DateTime($exd);

    if ($mfdDate > $exdDate) {
        return "Invalid date range";
    }

    $currentDate = new DateTime();
    $interval = $currentDate->diff($exdDate);

    return $interval->days;
}

try {
    $db = new SQLite3('prd.db');
    $sql = "SELECT * FROM inf";
    $ret = $db->query($sql);
} catch (Exception $e) {
    // Handle database connection or query errors
    echo "Error: " . $e->getMessage();
}
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- Add this to the head of your HTML -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="shortcut icon" href="/login/login/svp.png" type="image/x-icon">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-form.css">
    <title>SVP | Pages</title>
    <style>
        .icon-red:hover {
            color: red;
        }
    </style>
</head>

<body>
    <nav class="topnav">
        <ion-icon name="menu-outline" onclick="openNav()"></ion-icon>
        <p class="welcome">
            Welcome
            <?php echo $_COOKIE['token']; ?>
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
                <input type="submit" onclick="save()" id="btn">
                <ion-icon name="save-outline" style="font-size: 15px;"></ion-icon>
                </input>
            </div>
        </form>
    </ul>
    <?php
    while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
        ?>
        <ul class="product" id="product">

            <li class="box">
                <div class="name">
                    <div class="inname">
                        <i class="fas fa-cube"></i> Name:
                    </div>
                    <?php echo $row['name']; ?>
                </div>
                <div class="qty">
                    <div class="inname">
                        <i class="fas fa-shopping-cart"></i> Quantity:
                    </div>
                    <?php echo $row['qty']; ?>
                </div>
                <div class="batchno">
                    <div class="inname">
                        <i class="fas fa-barcode"></i> Batch no:
                    </div>
                    <?php echo $row['batch']; ?>
                </div>
                <div class="mfd">
                    <div class="inname">
                        <i class="fas fa-calendar-alt"></i> Manufacture date:
                    </div>
                    <?php echo $row['mfd']; ?>
                </div>
                <div class="expir">
                    <div class="inname">
                        <i class="fas fa-calendar-times"></i> Expiry date:
                    </div>
                    <?php echo $row['exd']; ?>
                </div>
                <div class="mrp">
                    <div class="inname">
                        <ion-icon name="cash-outline"></ion-icon> MRP:
                    </div>
                    <?php echo $row['mrp']; ?>

                </div>
                <?php
                // Calculate days remaining
                $daysRemaining = calculateDaysRemaining($row['mfd'], $row['exd']);

                // Display toast notification if days remaining is less than 60
                if ($daysRemaining < 60) {
                    ?>
                    <script>
                        Toastify({
                            text: 'Product <?php echo $row['name']; ?> has less than 60 days remaining!',
                            duration: 5000, // 5 seconds
                            gravity: 'top',
                            position: 'right',
                            backgroundColor: '#ff6347', // Tomato color
                        }).showToast();
                    </script>
                <?php } ?>
                <div class="delete">
                    <a href="delet.php?name=<?php echo $row['name']; ?>"> <i class="fas fa-trash-alt icon-red"></i></a>

                </div>
            </li>

        </ul>
    <?php } ?>

    <div class="add" onclick="add()">
        <ion-icon name="add-outline" style="font-size: 40px;color: white;"></ion-icon>
    </div>

    <script src="script.js">



    </script>
</body>

</html>