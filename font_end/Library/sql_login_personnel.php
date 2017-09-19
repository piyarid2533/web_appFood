<?php

        require '../config/connect.php';
        
             $psn_id  = $_GET['psn_id'];
        
            $sql = "SELECT * FROM personnel WHERE psn_id='$psn_id'";
            
            if($result){
                
                $r = mysql_fetch_array($result);
            } else {
            
                echo mysql_error();
}
?>