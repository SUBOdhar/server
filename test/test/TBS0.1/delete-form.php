<?php

if (isset($_GET['id'])) {
$id=$_GET['id'];
} ?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style-ing.css" />
  </head>
  <body>
    <div class="ag">
      <div class="f">
        <div class="delete">
          <ion-icon name="trash-outline"></ion-icon>
          <div class="n">
            <h1>Do you want <br />to delete data ?</h1>
            <div>
              <button class="yes" onclick="location.href='delete.php?id=<?php echo $id;?>'">Yes</button>
              <button class="no" onclick="location.href='dealer.php'">No</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
