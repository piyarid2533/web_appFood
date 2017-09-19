<?php

ob_start();
session_start();

require_once '../config/connect.php';

$mem_id = $_SESSION["mem_id"];

// insert into orders table
$sql = "INSERT INTO orderfood
	VALUES(null,'$mem_id','$psn_id',NOW(),'wait','')";

$rs = mysql_query($sql);

if (!$rs) {
    echo mysql_error();
}

$rs_order = mysql_query("SELECT MAX(order_id) AS o_id FROM orderfood");
if (!$rs_order) {
    echo mysql_error();
}

$r_order = mysql_fetch_array($rs_order);
$order_id = $r_order["o_id"];

$my_order_food = $_SESSION["my_order_food"];

for ($i = 0; $i < count($my_order_food); $i++) {

    $food_id        = $my_order_food[$i][0];
    $f_qty          = $my_order_food[$i][2];
    $food_price     = $my_order_food[$i][3];
    $food_energy    = $my_order_food[$i][4];

    $sql_de = "INSERT INTO orderdetail
                    VALUES('$order_id','$food_id','$f_qty','$food_price','$food_energy')";
    @mysql_query($sql_de);
}

unset($my_order_food);
unset($_SESSION["my_order_food"]);

header("location: index.php?url=order_save_result");
?>