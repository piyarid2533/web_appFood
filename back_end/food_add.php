<?php

    ob_start();
    require_once '../config/connect.php';
    
    $food_name = $_POST["food_name"];
    $foodtype_id = $_POST["foodtype_id"];
    $food_energy = $_POST["food_energy"];
    $food_price  = $_POST["food_price"];
    $food_howdo  = $_POST["food_howdo"];
    $food_img = $_FILES["food_img"]["name"];
    $food_rawmaterial = $_POST["food_rawmaterial"];
    $food_detail = $_POST["food_detail"];
    
    $sql = "INSERT INTO food ("
            . "food_name,"
            . "foodtype_id,"
            . "food_energy,"
            . "food_price,"
            . "food_howdo,"
            . "food_img,"
            . "food_rawmaterial,"
            . "food_detail"
            
            . ")VALUES("
            
            . "'$food_name'"
            . ",'$foodtype_id',"
            . "'$food_energy',"
            . "'$food_price',"
            . "'$food_howdo',"
            . "'$food_img',"
            . "'$food_rawmaterial',"
            . "'$food_detail'"
            . ")";
    
    $rs = mysql_query($sql);
    
        if($rs){
            
        $source = $_FILES['food_img']['tmp_name']; // ตัวแปรที่ถูกส่งมา tmp_name คือ ค่าคงที่ 
        $dest = "../fileupload/".$food_img; // บอกชื่อไฟล์และนามสกุลของไฟล์
    
        move_uploaded_file($source,$dest); // ย้ายรูปภาพมาแสดง
        
        header("Location:home.php?url=food_complete");
        
        } else {
            
            echo mysql_error();
        }
?>