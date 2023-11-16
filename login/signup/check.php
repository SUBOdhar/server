<?php
$output = $_POST['otp'];
$pass = $_POST['password'];
$user = $_POST['username'];
$email = $_POST['Email'];
$i1 = $_POST['in1'];
$i2 = $_POST['in2'];
$i3 = $_POST['in3'];
$i4 = $_POST['in4'];
$otp = $i1 . $i2 . $i3 . $i4;
if ($output == $otp) {
    class MyDB extends SQLite3
    {
        function __construct()
        {
            $this->open('/login/database/login.db');
        }
    }
    $db = new MyDB();
    $sql = "INSERT INTO login (username, password, email) VALUES ('$user', '$pass', '$email')";

    // Execute the INSERT statement
    $ret = $db->exec($sql);
    if (!$ret) {
        echo $db->lastErrorMsg();
    }

    $a = base64_encode(md5(uniqid(mt_rand(), true)));
    $fingerp = $_SERVER['REMOTE_ADDR'] . $a . gethostname();
    setcookie("token", $fingerp, time() + 2 * 24 * 60 * 60); //set cookie
    header('location:/login/page/');
} else {
    header('location:/login/signup/');
}



?>