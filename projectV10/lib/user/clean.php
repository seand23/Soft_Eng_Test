<?php
require_once '../lib/config/db_connection.php';

function escape($data) {
$data = htmlspecialchars($data, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
$data = trim($data);
$data = stripslashes($data);
return ($data);

}
?>

<!--code used from Robert Smith (common.php) for assignment -->