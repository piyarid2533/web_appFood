<?php

    ob_start();
    
    session_start();

    $food_id = $_GET["food_id"];

    $my_order_food = $_SESSION["my_order_food"];

    for ($i = 0; $i < count($my_order_food); $i++) {
        if ($my_order_food[$i][0] == $food_id) {
            $my_order_food[$i] = NULL;
            break;
        }
    }

    // sort 
    $new_my_order_food = array();
    for ($i = 0; $i < count($my_order_food); $i++) {
        if ($my_order_food[$i] != NULL) {
            $new_my_order_food[] = $my_order_food[$i];
        }
    }

    $_SESSION["my_order_food"] = $new_my_order_food;

    // redirect
    header("location: index.php?url=show_order");
?>

