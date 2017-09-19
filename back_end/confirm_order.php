<?php

ob_start();
session_start();

require_once '../config/connect.php';

$ord_id = $_GET["ord_id"];
$psn_id = $_SESSION["psn_id"];
// update orders
$sql = "UPDATE orderfood SET 
    
        psn_id = '$psn_id',
        order_status = 'confirm'
        
	WHERE 
        order_id = '$ord_id'";

if (mysql_query($sql)) {
    header("location:home.php?url=order");
} else {
    echo mysql_error();
}
?>