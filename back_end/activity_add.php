<?php

        ob_start();
        
        require_once '../config/connect.php';
        
            $activity_name = $_POST["activity_name"];
            $detail        = $_POST["detail"];   
            $number_week   = $_POST["number_week"];
            $energy        = $_POST["energy"];
            
            //sql
            $sql = "INSERT INTO activity("
                    . "activity_name,"
                    . "detail,"
                    . "number_week,"
                    . "energy"
                    
                    . ")VALUES("
                    
                    . "'$activity_name',"
                    . "'$detail',"
                    . "'$number_week',"
                    . "'$energy'"
                    . ")";
            
                    $rs = mysql_query($sql);
                    
                        if($rs){
                            
                            header("location:home.php?url=activity");
                        } else {
                            echo mysql_error();
                        }
            
?>