<?php
        require '../config/connect.php';
        
        $psn_id  = $_GET['psn_id'];
        
            $sql = "SELECT * FROM personnel WHERE psn_id='$psn_id'";
            
            $result = mysql_query($sql);
            
            if($result){
                
                $r = mysql_fetch_array($result);
            } else {
            
                echo mysql_error();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <fieldset style="border: 1px #cccccc solid;margin: 10px;">
            <legend>
                <img src="../ico/boss.ico"/>
            </legend>
            <form action="personnel_edit_process.php" method="post">
                <table width="80%" cellpadding="3px" 
                style="border: #999 1px dotted;margin: 5px;">
                    <th colspan="2" style="background: #66CDAA;padding: 5px;">
                        <?php 
                        if ($_SESSION["psn_position"] == 1) { 
                            $status ="แก้ไขข้อมูลผู้ดูและระบบ";
                        } else {
                            if($_SESSION["psn_position"]== 0){
                                $status ="แก้ไขข้อมูลพนักงาน";
                            }
                        }
                        echo $status;
                        ?>
                    </th>
                    <tr>
                        <td align="right">ชื่อผู้ใช้ระบบ :</td>
                        <td>
                            <input type="text" name="username" value="<?=$r[username]?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">รหัสผ่าน :</td>
                        <td>
                            <input type="text" name="password" value="<?=$r[password]?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">ชื่อ-สกุล ผู้ใช้:</td>
                        <td>
                            <input type="text" name="psn_name" value="<?=$r[psn_name]?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">ตำแหน่ง:</td>
                        <td>
                            <select name="psn_position">
                                <?php
                                if($r[psn_position]=="1"){
                                   $psn =  "selected" . "ผู้ดูแลระบบ";
                                   ?>
                                <option value="1">
                                    <?php echo $psn;?>
                                </option>
                                <option value="0">พนักงาน</option><!-- ค่าปกติ -->
                                
                                  <?php
                                } /// End if1
                                if($r[psn_position]=="0"){
                                    $psn = "selected" . "พนักงาน";
                                    ?>
                                <option value="0">
                                    <?php echo $psn;?>
                                </option>
                                 <option value="1">ผู้ดูแลระบบ</option><!-- ค่าปกติ -->
                                 
                                  <?php
                                }//End if2
                                ?>
                           </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">เพศ :</td>
                        <td>
                           <input type="radio" name="psn_sex" value="man"
                            <?php if($r[psn_sex]=="man"){echo "checked";}?>/>ชาย
                            <input type="radio" name="psn_sex" value="woman"
                             <?php if($r[psn_sex]=="woman"){echo "checked";}?>/>หญิง
                        </td>
                    </tr>
                    <tr>
                        <td align="right" valign="top">ที่อยู่ :</td>
                        <td>
                          <textarea name="psn_address" rows="3" cols="30"><?=$r[psn_address]?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Tel:</td>
                        <td>
                            <input type="text" name="psn_mobile" value="<?=$r[psn_mobile]?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Send"/>
                            <input type="reset" value="Reset"/>
                            <input type="hidden" name="psn_id" value="<?=$r[psn_id]?>"/>
                        </td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
</html>
