<?php
// if ($_COOKIE["token"]=="") {
//     $a = base64_encode(md5(uniqid(mt_rand(), true)));
//     $fingerp = $_SERVER['REMOTE_ADDR'] . $a . gethostname();
//     setcookie("token", $fingerp, time() + 2 * 24 * 60 * 60); //set cookie

//     echo $_COOKIE["token"]; //access cookie
// }else{
//     echo $_COOKIE["token"]; //access cookie
// }

// //setcookie("token", "", time() - 60);//delete cookie
$ver = $_GET['version'];
$dev = $_GET['device'];
if ($ver == "") {   
    header("location:./login/");
} else {

    echo '<button style="outline:none;"> Update </button>';
}

?>