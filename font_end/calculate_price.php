<?php
ob_start();
session_start();

$f_qty = $_POST["f_qty"];

$my_order_food = $_SESSION["my_order_food"];

for($i = 0; $i < count($my_order_food); $i++) {
	$my_order_food[$i][2] = $f_qty[$i];
      
}

$_SESSION["my_order_food"] = $my_order_food;

if(!empty($_POST["cal_price"])) {
	header("location: index.php?url=show_order");
} else {
	header("location: index.php?url=show_order_confirm");
}
?>