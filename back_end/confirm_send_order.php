<?php
ob_start();
require_once '../config/connect.php';

$ord_id = $_GET["ord_id"];

$sql = "UPDATE orderfood SET
        order_status = 'send',
        order_send_date = NOW()
        WHERE order_id = '$ord_id'";
			
if(mysql_query($sql)) {
	header("location: home.php?url=order");
} else {	
	echo mysql_error();
}
?>