<?php
$name = $_POST['name'];
$db = new SQLite3('svp.db');
$db4 = new SQLite3('svp.db');
$db2 = new SQLite3('stock.db');
$db3 = new SQLite3('invoice.db');
$query = $db->query("SELECT * from bill where name ='$name'");
$query3 = $db4->query("SELECT * from bill where name ='$name'");
$query3 = $db4->query("SELECT * from bill where name ='$name'");

$date = date('Y/m/d');

function getRandomUniqueNumber($min, $max, &$usedNumbers)
{
    $number = rand($min, $max);
    while (in_array($number, $usedNumbers)) {
        $number = rand($min, $max);
    }
    $usedNumbers[] = $number;
    return str_pad($number, 4, '0', STR_PAD_LEFT);
}

$minNumber = 1;
$maxNumber = 1000;
$usedNumbers = array();

// Generate 1000 unique random numbers
for ($i = 0; $i < 1000; $i++) {
    $randomNumber = getRandomUniqueNumber($minNumber, $maxNumber, $usedNumbers);

}
$html = "<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
  font-family: 'Poppins';
}
.invoice-container {
  margin: 15px auto;
  padding: 50px;
  max-width: 850px;
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 6px;
}


.row {
  display: flex;
  justify-content: space-between;
}
.row1 {
  display: flex;
  justify-content: space-between;
  font-size: 40px;
  align-items: center;
}
.table {
  width: 100%;
  text-align: center;
    border-collapse: collapse;
    margin-top: 20px;
}

.table tr {
  height: 50px;
}
.table th {
border-top: 2px solid black;
border-bottom: 2px solid black;
}
.tablefoot {
  float: right;
  text-align: right;
  border-collapse: collapse;
  width: 100%;
  
}
.tablefoot tr{
  height: 50px;
}

.tablefoot td {
  text-align: center;
  width: 70px;
}

    </style>
    <div class='invoice-container'>
        <header>
            <div class='row1'>
                    <div class='logo'><img src='svp.png' height='80px'>  <p style='font-size: 20px;'>
                Subodh Vet Pharma <br>
                Balaju,Kathmandu /Nepal
            </p></div>
                    <div class='invoice'> Invoice</div>
            </div>
          
            <hr>
        </header>
        <main>
            <div class='row'>
                <div >Date: $date</div>
                <div> Invoice No: SVP-$randomNumber</div>

            </div>
            <hr>
            <div class='row'>
                <div > Invoiced To:
                    <address>
                        $name
                    </address>
                </div>
            </div>
         
<table class='table'>
    <tr>
        <th>Item</th>
        <th>Quantity</th>
        <th>Rate</th>
        <th>Amount</th>
    </tr>";
// Initialize an associative array to keep track of product quantities
$productQuantities = array();

// Iterate through the first query result to fetch product information
while ($row = $query->fetchArray(SQLITE3_ASSOC)) {
    $p = $row['product'];

    // Check if the product is already in the associative array
    if (isset($productQuantities[$p])) {
        // If the product is repeated, increment its quantity
        $productQuantities[$p]++;
    } else {
        // If it's the first occurrence, set the quantity to 1
        $productQuantities[$p] = 1;
    }
}

// Initialize the subtotal for the invoice
$subtotal = 0;

// Build the invoice table using the collected product quantities
foreach ($productQuantities as $product => $quantity) {
    // Fetch the stock information for the product from the 'stock' table
    $s = base64_encode($product);
    $query2 = $db2->query("SELECT * from stock WHERE name = '$s'");
    $row2 = $query2->fetchArray(SQLITE3_ASSOC);

    // Assuming 'price' is the column that holds the product price in the 'stock' table
    $m = $row2['price'];

    // Calculate the total amount for the current product
    $amt = $quantity * $m;

    // Add the current product's amount to the subtotal
    $subtotal += $amt;

    // Update the invoice table with the product information
    $html .= "
    <tr>
        <td>$product</td>
        <td>$quantity</td>
        <td>$m</td>
        <td>$amt</td>
    </tr>";
}

// Calculate VAT and total (Assuming 13% VAT)
$vat = 0.13 * $subtotal;
$total = $subtotal + $vat;

// ... (Rest of the code remains unchanged)

$html .= "
    <table class='tablefoot'>
        <tr>
            <th>Sub Total:</th>
            <td>$subtotal</td>
        </tr>
        <tr>
            <th>VAT(13%):</th>
            <td>$vat</td>
        </tr>
        <tr style='font-size: 20px;'>
            <th>Total:</th>
            <td>$total</td>
        </tr>
    </table>
    </table>


        </main>
        <!-- Footer -->
        <footer style='text-align: center;'>
            <p >NOTE : This is computer generated receipt and does not require physical
                signature.</p>
                <a href='javascript:window.print()'' style='text-decoration: none;color:red;'>Click to print</a>
        </footer>
    </div>
    ";
echo $html;
?>