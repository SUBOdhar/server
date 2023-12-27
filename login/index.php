<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_COOKIE["token"])) {
  // Redirect to /page if the user is  logged in
  header('location:/page/');
  exit();
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="svp.png" type="image/x-icon">
  <title>Subodh Vet Pharma</title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form action="/login/bac.php" autocomplete="off" method="post">
        <input type="email" placeholder="Enter your email" name="email" autocomplete="off">
        <input type="password" placeholder="Enter your password" name="password" autocomplete="off">
        <input type="submit" class="button" value="Login">
      </form>
      <!-- <div class="signup">
        <span class="signup">Don't have an account?
          <label for="check">Signup</label>
        </span>
      </div> -->
    </div>
    <!-- <div class="registration form">
      <header>Signup</header>
      <form action="" autocomplete="off">
        <input type="text" placeholder="Enter your Username" name="Username">
        <input type="email" placeholder="Enter your email" name="email">
        <input type="password" placeholder="Create a password" name="password">
        <input type="submit" class="button" value="Signup">
      </form>
      <div class="signup">
        <span class="signup">Already have an account?
          <label for="check">Login</label>
        </span>
      </div>
    </div> -->
  </div>
</body>

</html>