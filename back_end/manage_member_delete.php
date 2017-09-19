<?php
ob_start();
require '../config/connect.php';

$mem_id = $_GET["member_id"];

$sql = "DELETE FROM member WHERE member_id=$mem_id";

if(mysql_query($sql)) {
	header("location: home.php?url=member");
} else {
	echo mysql_error();
}
?>