<?php

    ob_start();
    require_once '../config/connect.php';
    
        $activityid = $_POST[activityid ];
        $activity_name = $_POST[activity_name];
        $detail       = $_POST[detail];
        $number_week  = $_POST[number_week];
        $energy       = $_POST[energy];
        
        
            $sql = "UPDATE activity SET "
                    . "activity_name='$activity_name',"
                    . "detail='$detail',"
                    . "number_week='$number_week',"
                    . "energy='$energy' WHERE activityid = '$activityid'";
            
            $rs = mysql_query($sql);
            
            if($rs){
                
                header("location:home.php?url=activity");
            }else{
                echo mysql_error();
            }
?>