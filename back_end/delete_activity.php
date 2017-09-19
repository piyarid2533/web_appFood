<?php

    ob_start();
    require_once '../config/connect.php';
    
        $activityid = $_GET['activityid'];
        
        $sql = "DELETE FROM activity WHERE activityid ='$activityid'";
        
            if(mysql_query($sql)){
                
                header("location:home.php?url=activity");
            } else {
            
                echo mysql_error();
}
?>