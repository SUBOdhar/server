<?php
if (isset($_GET['name'])) {
    $name = $_GET['name'];
}
$db2 = new SQLite3('stock.db');
$ret5 = $db2->query("SELECT * from stock"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form-upload</title>
    <link rel="stylesheet" href="style-form.css">
</head>

<body>
    <div class="out">

        <form autocomplete="off" method="post" action="billadder.php?name=<?php echo $name; ?>" class="form"
            enctype="multipart/form-data">
            <h1>Insert Bill Data</h1>
            <div class="namebox">
                <label for="name">Bill name:</label><br>
                <input type="text" name="name2" class="name" id="name" placeholder="Enter Bill Name" autocomplete="off">
            </div>
            <div class="datebox">
                <label for="date">Date</label><br>
                <input type="date" name="date" class="name" id="name" placeholder="Enter Bill Name" autocomplete="off">
            </div>
            <div>
                <label for="info">Information:</label><br>
                <select id="info" name="info">
                    <option value="">Click to select</option>
                    <option value="Credit">Credit</option>
                    <option value="Debit">Debit</option>
                </select>
            </div>
            <div>
                <label for="choose">Do you have bill image or not?</label><br>
                <select id="choose" name="choose" onchange="toggleUploadButton()">
                    <option value="">Click to select</option>
                    <option value="no">no</option>
                    <option value="yes">yes</option>
                </select>
            </div>
            <div id="productbox" style="display: none;">
                <label for="product">choose product(press Ctrl and click to select multiple)</label><br>
                <select id="product" name="product[]" multiple>
                    <?php
                    while ($row5 = $ret5->fetchArray(SQLITE3_ASSOC)) {
                        ?>
                        <option value="<?php $nm = base64_decode($row5['name']);
                        echo $nm; ?>"><?php $nm = base64_decode($row5['name']);
                          echo $nm; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="imagebox" id="imgbox" style="display: none;">
                <label for="image">Add bill image:</label><br>
                <input type="file" name="image" class="image" id="image">
            </div>
            <div><button type="submit" class="add">Add</button> <button style="float:right;" class="cancel">cancel
                </button> </div>
        </form>
    </div>
    <script>
        function toggleUploadButton() {
            const fileOption = document.getElementById("choose").value;
            const uploadButton = document.getElementById("imgbox");
            const product = document.getElementById("productbox");

            if (fileOption === "yes") {
                uploadButton.style.display = "";
                product.style.display = "none";
            } else {
                uploadButton.style.display = "none";
                product.style.display = "";
            }
        }
    </script>
</body>
<html>