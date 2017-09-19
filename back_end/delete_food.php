<?php
    
    ob_start();
    require_once '../config/connect.php';
    
    $food_id = $_GET["food_id"];
    $pic_del = $_GET["pic_del"];
    
    $sql = "DELETE FROM food WHERE food_id='$food_id'";
    
        $rs = mysql_query($sql);
        
        if($pic_del<>""){
            $pic_del="../fileupload/" .$pic_del;
            if(file_exists($pic_del)){
                unlink($pic_del);
            }
        }
        
        if($rs){
            
            header("location:home.php?url=show_food");
        } else {
        
            echo mysql_error();
}
?>