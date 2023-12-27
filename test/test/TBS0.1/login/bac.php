<?php
$user = $_POST['username'];
$pass = $_POST['password'];

class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('./database/login.db');
    }
}
$db = new MyDB();
$ret = $db->exec($sql);
if (!$ret) {
    echo $db->lastErrorMsg();
}
$ret = $db->query("SELECT * from login");
$row = $ret->fetchArray(SQLITE3_ASSOC);

if ($pass == $row['password'] && $user == $row['username'] && $_COOKIE["token"] == "") {
    $a = base64_encode(md5(uniqid(mt_rand(), true)));
    $fingerp = $_SERVER['REMOTE_ADDR'] . $a . gethostname();
    setcookie("token", $fingerp, time() + 2 * 24 * 60 * 60); //set cookie
    header('location:./chat/');
}else{
    header('location:./index.php');
}

?>