<?php
    
    ob_start();
    require_once '../config/connect.php';
    
    $food_id = $_POST["food_id"];
    $food_name = $_POST["food_name"];
    $foodtype_id = $_POST["foodtype_id"];
    $food_energy = $_POST["food_energy"];
    $food_price  = $_POST["food_price"];
    $food_howdo = $_POST['food_howdo'];
    $food_img   = $_FILES["food_img"]["name"];
    $food_rawmaterial = $_POST["food_rawmaterial"];
    $food_detail = $_POST["food_detail"];
    
        if($food_img ==""){
            
            $sql = "UPDATE food SET food_name = '$food_name',"
                    . "foodtype_id='$foodtype_id',"
                    . "food_energy='$food_energy',"
                    . "food_price='$food_price',"
                    . "food_howdo='$food_howdo',"
                    . "food_rawmaterial='$food_rawmaterial',"
                    . "food_detail='$food_detail' WHERE food_id = '$food_id'";
        } else {
            
            $sql = "UPDATE food SET "
                    . "food_name = '$food_name',"
                    . "foodtype_id='$foodtype_id',"
                    . "food_energy='$food_energy',"
                    . "food_price='$food_price',"
                    . "food_howdo='$food_howdo',"
                    . "food_rawmaterial='$food_rawmaterial',"
                    . "food_detail='$food_detail',"
                    . "food_img='$food_img' WHERE food_id = '$food_id'";
            
        $source = $_FILES['food_img']['tmp_name']; // ตัวแปรที่ถูกส่งมา tmp_name คือ ค่าคงที่ 
        $dest = "../fileupload/".$food_img; // บอกชื่อไฟล์และนามสกุลของไฟล์
    
        move_uploaded_file($source,$dest); // ย้ายรูปภาพมาแสดง
}

    $rs = mysql_query($sql);
    
    if($rs){
        
    header("Location:home.php?url=show_food"); 
    
    } else {
        
       echo mysql_error(); 
}
?>