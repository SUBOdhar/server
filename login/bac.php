<?php
$user = $_GET['username'];
$pass = $_GET['password'];

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
while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
    if ($pass == $row['password'] && $user == $row['username'] && $_COOKIE["token"] == "") {

        setcookie("token", $user, time() + 2 * 24 * 60 * 60); //set cookie
        header("location:./page/");

    } else {

        header('location:./login/');
    }
}


?>