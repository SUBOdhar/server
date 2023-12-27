<?php
function ce()
{
    class MyDB extends SQLite3
    {
        function __construct()
        {
            $this->open('token.db');
        }
    }

    $token = new MyDB();

    // Generate a random token
    $tokenValue = bin2hex(random_bytes(16));

    // Calculate the expiration date (5 days from now)
    $date = time() + (5 * 24 * 60 * 60);

    // Prepare and execute the SQL query to insert the token into the database
    $sql = <<<EOF
      INSERT INTO tokens(token, date)
      VALUES ('$tokenValue', '$date');
EOF;

    $ret = $token->exec($sql);

    if (!$ret) {
        echo $token->lastErrorMsg();
    }

    // Set a cookie with the token
    setcookie("token", $tokenValue, $date, "/");

    // Retrieve and display the cookie value
    if (isset($_COOKIE["token"])) {
        $cookieValue = $_COOKIE["token"];
    
    } else {
        echo "Cookie not found!";
    }
}
?>