<html lang="en">
<?php if ($_COOKIE["token"]) {
    header('location:./chat/');
}?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./funcode.png" type="image/x-icon">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Funcode-TBS</title>
</head>

<body>
    <section class='login' id='login'>
        <div class='head'>
            <h1 class='company'>Welcome back</h1>
        </div>
        <div class='form' action="bac.php" method="post">
            <form enctype="multipart/form-data" action="bac.php" method="post">
                <input type="text" name="username" placeholder='Username' class='text' id='username' autocomplete="off" required tabindex="1" autocomplete="username"><br>
                <input type="password"  name="password" placeholder="Password" class="password" id="password" autocomplete="current-password" tabindex="2">
                <ion-icon class="toggle" id="toggle" name="eye-outline" onclick="togglePasswordVisibility()" tabindex="3"></ion-icon>
                <br>
                <button class='btn-login' id='do-login' tabindex="4">Login</button>
            </form>
            <a href="signup.php"style="text-decoration: none;color:white;">Sign up here if you don't have an account</a>
        </div>
    </section>
    <script src="script.js"></script>
</body>

</html>