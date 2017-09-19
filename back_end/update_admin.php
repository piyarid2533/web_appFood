<?php
        
        ob_start();
        
        require '../config/connect.php';
        
            
            $admin_id       = $_POST["admin_id"];
            $admin_username = $_POST["admin_username"];
            $admin_password = $_POST["admin_password"];
            $name           = $_POST["name"];
            
            if(
                 empty($admin_id)       ||
                 empty($admin_username) || 
                 empty($admin_password) || 
                 empty($name)){
                ?>
                <script type="text/javascript">
                    alert("ท่านใส่ข้อมูลไม่ครบ");
                    history.back();
                </script>
                <?php
            } else {
                
                // update
                
                $sql = ""
                        . "UPDATE tb_admin SET "
                        . "admin_username = '$admin_username',"
                        . "admin_password = '$admin_password',"
                        . "name = '$name'"
                        . " WHERE admin_id ='$admin_id'"
                        . "";
                        
                        if(mysql_query($sql)){
                            
                            header("location:home.php?url=show_dataadmin");
                        } else {
                            echo mysql_error();
                        }
            }
?>