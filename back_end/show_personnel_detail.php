<?php

    require_once '../config/connect.php';
    
        $id = $_GET['id'];
        
            $sql = "SELECT * FROM personnel WHERE psn_id = '$id'";
            
            $rs = mysql_query($sql) ;
            
            if($rs){
            
                $row1 = mysql_fetch_array($rs);
                
                $code_id=$r['psn_id'];
            
                $code_id = sprintf("Em%'06d",$id);

            } else{
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
        
        <fieldset style="border: 1px #cccccc solid;font-family: monospace;">
            <legend>แสดงข้อมูลพนักงาน</legend>
            <table width="80%" border="1px" cellpadding="3px"
              style="border-collapse: collapse;border-color: #999;">
                <th colspan="9"bgcolor="#66CDAA" style="padding: 5px;">
                    แสดงข้อมูลพนักงาน
                </th>
                <tr align="center" style="background:#336699;color: #fff;">
                    <td width="10px">Employee ID</td>
                    <td width="150px">ชื่อผู้ใช้ระบบ</td>
                    <td width="60px">รหัสผ่าน</td>
                    <td width="150px">ชื่อ-สกุล ผู้ใช้</td>
                    <td width="20px">ตำแหน่ง</td>
                    <td width="20px">เพศ</td>
                    <td width="20px">ที่อยู่</td>
                    <td width="20px">Tel</td>
                </tr>
                <tr align="center">
                    <td><?php echo $code_id;?></td>
                    <td><?=$row1[username]?></td>
                    <td><?=$row1[password]?></td>
                    <td><?=$row1[psn_name]?></td>
                    <td>
                        <?php
                            if($row1[psn_position]=="1"){
                                $psn = "ผู้ดูแลระบบ";
                            } else {
                                $psn = "พนักงาน";
                            }

                            echo $psn;
                         ?>
                    </td>
                    <td>
                        <?php
                            if($row1[psn_sex]=="man"){
                                $gender = "ชาย";
                            }else {
                                $gender = "หญิง";
                            }
                            echo $gender;
                        ?>
                    </td>
                    <td><?=$row1[psn_address]?></td>
                    <td><?=$row1[psn_mobile]?></td>
                </tr>
            </table>
        </fieldset>
    </body>
</html>
