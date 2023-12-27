<html lang="en">


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
            <h1 class='company'>Sign in</h1>
        </div>
        <div class='form' >
            <form enctype="multipart/form-data" action="otp.php" method="post">
                <input type="text" name="username" placeholder='Username' class='text' id='username' autocomplete="off"
                    required tabindex="1" autocomplete="username"><br>
                    <input type="email" name="Email" placeholder='Email' class='email' id='Email' autocomplete="off"
                    required tabindex="2" autocomplete="Email"><br>
                <input type="password" name="password" placeholder="Password" class="password" id="password"autocomplete="current-password" tabindex="3">
                <ion-icon class="toggle" id="toggle" name="eye-outline" onclick="togglePasswordVisibility()"
                    tabindex="4"></ion-icon>
                <br>
                <button class='btn-login' id='do-login' tabindex="5">Sign in</button>
            </form>
            <a href="index.php" style="text-decoration: none;color:white;">Already signed in?</a>
        </div>
    </section>
    <script src="script.js"></script>
</body>

</html>