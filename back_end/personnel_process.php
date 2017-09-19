<?php
    
    ob_start();
    require_once '../config/connect.php';
    
        $username = $_POST["username"];
        $password = $_POST["password"];
        $psn_name = $_POST["psn_name"];
        $psn_position = $_POST["psn_position"];
        $psn_sex = $_POST["psn_sex"];
        $psn_address = $_POST["psn_address"];
        $psn_mobile = $_POST["psn_mobile"];
        
        if($username==""){
            ?>
            <script type="text/javascript">
                alert('ไม่มีชื่อผู้ใช้ระบบ');
                history.back();
            </script>
            <?php
            
        } 
       /****************** End user ***********************/ 
        
        if($password==""){
            ?>
            <script type="text/javascript">
            alert('ไม่ได้ใส่รหัสผ่าน');
            history.back();
            </script>
            <?php
        }
        /****************** End pass ***********************/
        
        if($psn_name==""){
             ?>
            <script type="text/javascript">
                alert('ยังไม่ได้ใส่ชื่อผู้ใช้');
                history.back();
            </script>
            <?php
            }
            /****************** End psn_name ***********************/
            
        if($psn_position==""){
                ?>
             <script type="text/javascript">
                alert('ยังไม่ได้ระบุตำแหน่ง');
                history.back();
            </script>
            <?php
            }
         /****************** End psn_position***********************/
            
            if($psn_sex==""){
                ?>
            <script type="text/javascript">
                alert('ไม่ได้ระบุเพศ');
                history.back();
            </script>
            <?php
            }
         /****************** End psn_sex ***********************/
            
            if($psn_address==""){
                ?>
            <script type="text/javascript">
                alert('ไม่ได้ใส่ข้อมูลที่อยู่');
                history.back();
            </script>
            <?php
            }
         /****************** End address ***********************/
            
            if($psn_mobile==""){
                ?>
            <script type="text/javascript">
                alert('ไม่ได้ใส่ฃ้อมูลโทรศัพท์');
                history.back();
            </script>
            <?php
            /****************** End mobile ***********************/ 
            
            } else {
            
                // sql insert
                $sql = "INSERT INTO personnel("
                        . ""
                        . "username,"
                        . "password,"
                        . "psn_name,"
                        . "psn_position,"
                        . "psn_sex,"
                        . "psn_address,"
                        . "psn_mobile"
                        . ""
                        
                        . ")VALUES("
                        
                        . "'$username',"
                        . "'$password',"
                        . "'$psn_name',"
                        . "'$psn_position',"
                        . "'$psn_sex',"
                        . "'$psn_address',"
                        . "'$psn_mobile')"
                        . "";
                
                    $rs = mysql_query($sql);
                    
                    
                    if($rs){
                        header("location:home.php?url=personnel_complete");
                    } else {
                        echo mysql_error();
                    }
}
            
            
?>