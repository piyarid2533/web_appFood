<?php

        ob_start();
        session_start();
        
        require_once '../config/connect.php';
        
        $food_id = $_GET["food_id"];
        
        $my_order_food = $_SESSION["my_order_food"];
        
        $sql = "SELECT * FROM food WHERE food_id='$food_id'";
        
        if($my_order_food == NULL) {
            
            // รายการแรก
            $rs = mysql_query($sql);
            $r = mysql_fetch_array($rs);

            $order = array();
            $order[0] = $food_id;           // เก็บรหัสอาหาร
            $order[1] = $r["food_name"];    // ชื่ออาหาร
            $order[2] = 1;                  // จำนวนรายการอาหาร
            $order[3] = $r["food_price"];   //ราคาอาหาร
            $order[4] = $r["food_energy"]; //พลังงาน
   

            // keep value into my_cart
            $my_order_food[0] = $order;
            
        }else{
            
            // รายการถัดๆ ไป
	$total_items = count($my_order_food);
        
        
        // check duplicate product id
	for($i = 0; $i < $total_items; $i++) {
            if ($my_order_food[$i][0] == $food_id) {
                $my_order_food[$i][2] += 1;
                $check_f = "duplicate";
            break;
        }
        }
        
        if(empty($check_f)) {
		
		$rs = mysql_query($sql);
		$r = mysql_fetch_array($rs);
		
		$order = array();
                $order[0] = $food_id;                
                $order[1] = $r["food_name"];    
                $order[2] = 1;                     
                $order[3] = $r["food_price"];
                $order[4] = $r["food_energy"];
                
                // keep value into my_cart
		$my_order_food[$total_items] = $order;
        }
        }
        
        // add to cart
        $_SESSION["my_order_food"] = $my_order_food;

header("location: index.php?url=show_order");

?>