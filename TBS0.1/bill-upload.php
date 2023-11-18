<?php $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']
  === 'on' ? "https" : "http") .
  "://" . $_SERVER['HTTP_HOST'] .
  $_SERVER['REQUEST_URI'];
if ((empty($_SESSION['username'])) && (empty($_SESSION['password']))) {
  header("location:security.php?url=$link");
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form" enctype="multipart/form-data">
    <div class="namebox">
      <label for="name">Bill-name:</label>
      <input type="text" name="billname" class="name" id="name" autocomplete="off">
    </div>
    <div class="imagebox">
      <label for="image">Bill-image</label>
      <input type="file" name="image" class="image" id="image">
    </div>
    <button type="submit">Add</button>
  </form>
  <a href="dealer.php" style="float:right;color:black;" class="cancel">cancel </a>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "upload/";
    $target_path = $target_dir . basename($_FILES['image']['name']);
    echo $target_path;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
    }
    $billname = $_POST['billname'];
    $name = $row['name'];
    $bill = $_POST['image'];
    $sql = <<<EOF
      INSERT INTO svp (name, billname, bill)
      VALUES ("$name", "$billname", "$bill");
EOF;
    $ret = $db->exec($sql);
    if (!$ret) {
      echo $db->lastErrorMsg();
    }
  }
  ?>
</body>

</html>