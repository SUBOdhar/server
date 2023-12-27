<?php session_start();
include 'connect.php';

$db3 = new SQLite3('svp.db');
$sql = <<<EOF

SELECT * from svp;
EOF;
$ret = $db->query($sql);

while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
  $i = $row['id'];
}

$_SESSION['id'] = $i;
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="svp.png" type="image/x-icon">
  <link rel="stylesheet" href="style-ing.css">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <title>The Billing System | Funcode</title>
</head>

<body>
  <div class="nav">
    <img src="./svp.png" alt="subodh vet pharma">



    <div class="mainn">
      <div class="recipt">
        <ion-icon name="document-outline"></ion-icon>
        <a href="ac.php" style="color:black;"> Recipt create</a>
      </div>
      <div class="product">
        <ion-icon name="medkit-outline"></ion-icon>
        <a href="product.php" style="color:black;"> Medicine</a>
      </div>
      <a href="form.php" style="color:black;">
        <div class="adddealer">
          <button class="button">
            <ion-icon name="add-outline"></ion-icon>
            Add Dealer
          </button>
        </div>
      </a>

      <!-- <div class="search">
        <input placeholder="Search.." id="searchbar" onkeyup="search()">
      </div> -->
    </div>
  </div>

  <ul class="sortable-product" id="sortable-product">
    <h1>Dealer </h1>
    <button class="a">Name <div class="pho">phone number</div>
      <div class="money">money</div>
    </button>
    <?php
    while ($row = $ret->fetchArray(SQLITE3_ASSOC)) { ?>
      <div class="box">
        <button class="accordion">
          <?php echo $row['name'];
          $nm = $row['name']; ?>
          <div class="pho"> <a href="tel:<?php echo $row['phoneno']; ?>">call <?php echo $row['phoneno']; ?></a> </div>
          <div class="money">Rs
            <?php echo $row['money']; ?>
          </div>
        </button>
        <div class="panel">
          <p><img src="<?php echo $row['image']; ?>" class="image" height="227" width="226"></p>

          <div>
            <div class="head">
              <div> Bill info <ion-icon name="add-outline"
                  onclick="location.href='billadd.php?name=<?php echo $row['name']; ?>'"></ion-icon> </div>
              <div class="head2">
                <table>
                  <tr>
                    <th>
                      <div id="myBtnContainer">
                        <button class="btn active" onclick="filterSelection('all')"> Show all</button>
                        <button class="btn" onclick="filterSelection('credit')"> Credit</button>
                        <button class="btn" onclick="filterSelection('Debit')"> Debit</button>
                      </div>
                    </th>
                  </tr>
                  <tr>
                    <td>
                      <div class="container">
                        <div class="filterDiv credit">
                          <?php $query3 = $db3->query("SELECT * from bill");
                          $cerdit = "Credit";
                          while ($row2 = $query3->fetchArray(SQLITE3_ASSOC)) {
                            if ((!empty($row2['bill'])) && ($row['name'] == $row2['name']) && ($row2['info'] == $cerdit)) {
                              if ($row2['choose'] == "no") {

                                ?>
                                <div> <a href="#">
                                    <?php echo $row2['product']; ?>
                                  </a>
                                  <a
                                    href="delete-bill.php?bill=<?php echo $row2['bill']; ?>&product=<?php echo $row2['product']; ?>">
                                    <ion-icon name="trash-outline"></ion-icon>
                                  </a>
                                </div>
                                <?php
                              } else { ?>
                                <div> <a href="<?php echo $row2['billimg']; ?>"><?php echo $row2['bill']; ?> </a>
                                  <a href="delete-bill.php?bill=<?php echo $row2['bill']; ?>">
                                    <ion-icon name="trash-outline"></ion-icon>
                                  </a>
                                </div>
                                <?php
                              }
                            }
                          } ?>
                        </div>
                        <div class="filterDiv Debit">
                          <?php
                          $debit = "Debit";
                          while ($row2 = $query3->fetchArray(SQLITE3_ASSOC)) {
                            if ((!empty($row2['bill'])) && ($row['name'] == $row2['name']) && ($row2['info'] == $debit)) {
                              if ($row2['choose'] == "no") { ?>
                                <div> <a href="#">
                                    <?php echo $row2['product']; ?>
                                  </a>
                                  <a
                                    href="delete-bill.php?bill=<?php echo $row2['bill']; ?>&product=<?php echo $row2['product']; ?>">
                                    <ion-icon name="trash-outline"></ion-icon>
                                  </a>
                                </div>
                                <?php
                              } else { ?>
                                <div> <a href="<?php echo $row2['billimg']; ?>"><?php echo $row2['bill']; ?> </a>
                                  <a href="delete-bill.php?bill=<?php echo $row2['bill']; ?>">
                                    <ion-icon name="trash-outline"></ion-icon>
                                  </a>
                                </div>
                                <?php
                              }
                            }
                          } ?>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>

            </div>
          </div>
          </span>
          <div class="menu">
            <a href="delete-form.php?id=<?php echo $row['id']; ?>"> <ion-icon name="trash-outline"></ion-icon></a>
            <a href="update.php?id=<?php echo $row['id']; ?>"> <ion-icon name="create-outline"></ion-icon>
            </a>
          </div>
        </div>
      </div>
    <?php }
    ?>
  </ul>

  <script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        }
      });
    }

  </script>

  <script src="script.js"></script>

</body>

</html>