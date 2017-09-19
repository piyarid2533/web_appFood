<?php

ob_start();
session_start();

require_once '../config/connect.php';

$ord_id         = $_GET["ord_id"];
$order_status   = $_GET["order_status"];

if($order_status =="confirm" or $order_status =="wait"){
    ?>
    <script type="text/javascript">
        alert('มีข้อมูลกำลังดำเนินการอยู่');
        history.back();
    </script>
        <?php
}else{
// update orders
$sql = "UPDATE orderfood SET order_status = 'pay'
	WHERE order_id = '$ord_id'";

if (mysql_query($sql)) {
    header("location:home.php?url=order");
} else {
    echo mysql_error();
}
}
?>