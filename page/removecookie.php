<?php
setcookie("token", "", time() - 2 * 24 * 60 * 60, "/"); // Set cookie with expiration time in the past
header("location: /login/");
?>