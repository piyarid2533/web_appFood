<?php
    
    ob_start();
    
    require_once '../config/connect.php';
    
        $psn_id = $_GET['psn_id'];
        
        $sql = "DELETE FROM personnel WHERE psn_id ='$psn_id'";
        
            if(mysql_query($sql)){
                
                ?>
                <script type="text/javascript">
                    alert('ลบข้อมูลเรียบร้อยแล้ว');
                    history.back();
                </script>
                    <?php
                
            } else {
            
                echo mysql_error();
}
?>