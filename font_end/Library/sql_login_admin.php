<?php

require '../config/connect.php';

$sql = "SELECT * FROM personnel ";

$result = mysql_query($sql);

if ($result) {

    $r = mysql_fetch_array($result);
} else {

    echo mysql_error();
}
?>