<!DOCTYPE html>
<html lang="en">

<?php
$dec = $_GET['email'];
$email = hex2bin($dec);
$output = shell_exec("python3 email/e.py " . $email);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="svp.png" type="image/x-icon">
    <title>Subodh Vet Pharma | OTP-verification</title>
    <!-- Custom CSS File -->
    <link rel="stylesheet" href="style.css">
    <style>
        /* Remove up and down arrows in number input */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>
    <div class="container">
        <input type="checkbox" id="check">
        <div class="login form">
            <header>OTP-verification</header>
            <p>We have sent a verification code to your Email address:
                <mark>
                    <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>
                </mark>
            </p>
            <form action="check.php" method="post">
                <input name="Email" type="hidden" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">
                <input name="otp" type="hidden" value="<?php echo htmlspecialchars($output, ENT_QUOTES, 'UTF-8'); ?>">
                <div id='inputs' style="margin-top:20px;">
                    <input name="in1" id='input1' type='number'
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        maxlength="4" placeholder="Enter OTP" autocomplete="one-time-code">

                </div>
                <input type="submit" class="button" value="Submit">
            </form>
        </div>
    </div>
</body>

</html>