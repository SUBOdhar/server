<?php class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('./login/database/login.db');
    }
}
$db = new MyDB();
$ret = $db->exec("INSERT INTO login (username, password) VALUES ('funcode', 'funcode123')");
if (!$ret) {
    echo $db->lastErrorMsg();
}
?>