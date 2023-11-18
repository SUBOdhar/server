<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form-upload</title>
  <link rel="stylesheet" href="style-form.css">
</head>

<body>
  <div class="out">

    <form method="post" autocomplete="off" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form"
      enctype="multipart/form-data">
      <h1>Insert data</h1>
      <div class="namebox">
        <label for="name">Name:</label><br>
        <input type="text" name="name" class="name" id="name" placeholder="Enter name" autocomplete="off">
      </div>
      <div class="phonebox">
        <label for="phone">Phone no:</label><br>
        <input type="number" name="phone" class="phone" id="phone" placeholder="Enter phone no" autocomplete="off">
      </div>
      <div class="moneybox">
        <label for="money">Money:</label><br>
        <input type="number" name="money" class="money" id="money" placeholder="Enter money" autocomplete="off">
      </div>
      <div class="imagebox">
        <label for="image">Person image:</label><br>
        <input type="file" name="image" class="image" id="image">
      </div>
      <div><button type="submit" class="add">Add</button>
    </form>
    <a href="dealer.php" style="float:right;color:black;" class="cancel">cancel </a>
  </div>
  </div>
  <?php
  session_start();


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "upload/";
    $target_path = $target_dir . basename($_FILES['image']['name']);
    echo $target_path;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
    }
    class MyDB extends SQLite3
    {
      function __construct()
      {
        $this->open('svp.db');
      }
    }

    $db = new MyDB();
    if (!$db) {
      echo $db->lastErrorMsg();
    } else {

    }
    $id = $_SESSION['id'] + 1;
    $name = $_POST['name'];
    $phomeno = $_POST['phone'];
    $money = $_POST['money'];
    $image = $target_path;
    $sql = <<<EOF
      INSERT INTO svp ( id, name, phoneno, money, image)
      VALUES ( $id, "$name", $phomeno, $money, "$image");
EOF;

    $ret = $db->exec($sql);
    if (!$ret) {
      echo $db->lastErrorMsg();
    }
    $db->close();
    header('location:dealer.php');
  }
  $db->close();
  ?>
</body>

</html>