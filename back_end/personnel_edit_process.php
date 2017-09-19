<?php
        
        ob_start();
        require_once '../config/connect.php';
        
            $psn_id = $_POST[psn_id];
            $username = $_POST[username];
            $password = $_POST[password];
            $psn_name = $_POST[psn_name];
            $psn_position = $_POST[psn_position];
            $psn_sex = $_POST[psn_sex];
            $psn_address = $_POST[psn_address];
            $psn_mobile = $_POST[psn_mobile];
            
            if(!empty($psn_id)){
                
                // update
                $sql = "UPDATE personnel SET "
                        . "username='$username',"
                        . "password='$password',"
                        . "psn_name='$psn_name',"
                        . "psn_position='$psn_position',"
                        . "psn_sex='$psn_sex',"
                        . "psn_address='$psn_address',"
                        . "psn_mobile='$psn_mobile' WHERE psn_id='$psn_id'"
                        . "";
                
                if(mysql_query($sql)){
                    
                    header("location:home.php?url=personnel_add");
                    
                } else {
                    
                    echo mysql_error();
                }
            }
?>