<?php

ob_start();
session_start();

require_once '../config/connect.php';;

    $var_err = "ไม่สามารถเข้าสู่ระบบได้.......No.....Invalid..!!! ";
    $username = $_POST["username"];
    $password = $_POST["password"];

        $sql = " SELECT * FROM personnel 
                 WHERE username = '$username'
                 AND   password = '$password'";

        $rs = mysql_query($sql);

    if (!$rs) {
    echo mysql_error();
}

if (mysql_num_rows($rs) > 0) {
    
        $row = mysql_fetch_array($rs);

        $_SESSION["psn_id"] = $row["psn_id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["psn_name"] = $row["psn_name"];
        $_SESSION["psn_position"] = $row["psn_position"];

    header("location: home.php");
    
} else {
   ?>
    <div class="varerror" style="padding: 10px;text-align: center;">
        <?php echo $var_err;?>
        <a href="index.php"> << Back</a>
    </div>
  <?php
}

?>
<style type="text/css">
.varerror{border: #FF0000 1px solid;background:palegoldenrod;
color: #FF0000;font-family: monospace;font-size: 16px;
}a{text-decoration: none;}a:hover{text-decoration: underline;}
</style>