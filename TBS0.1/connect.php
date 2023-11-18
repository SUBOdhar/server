<?php
class MyDB extends SQLite3
{
   function __construct()
   {
      $this->open('svp.db');
   }
}
$db = new MyDB();
$ret = $db->exec($sql);
if (!$ret) {
   echo $db->lastErrorMsg();
}
?>
