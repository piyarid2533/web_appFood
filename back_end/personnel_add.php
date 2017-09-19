<?php 
    
    require_once '../config/connect.php';
    
        $sql = "SELECT * FROM personnel";
        
            $rs = mysql_query($sql) or die(mysql_error());
            
            $id= 1;
            
            $code_id = sprintf("Em%'06d",$id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <fieldset style="border: 1px #cccccc solid;margin: 10px;">
            <legend>แสดงข้อมูลพนักงาน</legend>
            <table width="80%" border="1px" cellpadding="3px"
              style="border-collapse: collapse;border-color: #999;">
                <th colspan="7"bgcolor="#66CDAA" style="padding: 5px;">
                    แสดงข้อมูลพนักงาน
                </th>
                <tr align="center" style="background:#336699;color: #fff;">
                    <td width="10px">Employee ID</td>
                    <td width="150px">ชื่อผู้ใช้ระบบ</td>
                    <td width="50px">Tel</td>
                    <td width="60px">ลายละเอียดข้อมูลพนักงาน</td>
                    <td width="20px">Edit</td>
                    <td width="20px">Delete</td>
                </tr>
                <?php while ($row = mysql_fetch_array($rs)):?>
                <tr align="center">
                    <td><?php echo $code_id++?></td>
                    <td><?=$row[psn_name]?></td>
                    <td><?=$row[psn_mobile]?></td>
                    <td>
                        <a href="show_personnel_detail.php?id=<?=$row[psn_id]?>" 
                        onclick="NewWindow(this.href,'name','600','400','yes');
                            return false">ดูข้อมูล
                            <img src="../ico/user group.ico"/>
                    </a>
                    </td>
                    <td width="50px">
                        <a href="home.php?url=personnel_edit&psn_id=<?=$row['psn_id']?>">
                        <img src="../ico/create.ico"/>
                        </a>
                    </td>
                    <td width="50px">
                        <a href="delete_personnel.php?psn_id=<?=$row['psn_id']?>"
                           onclick="return confirm('คุณแนใจว่าจะลบข้อมูล')">
                        <img src="../ico/delete.ico"/>
                        </a>
                    </td>
                </tr>
                <?php endwhile;?>
            </table>
        </fieldset>



        <!------------------ forrm_add พนักงาน -------------------------->
        <fieldset style="border: 1px #cccccc solid;margin: 10px;">
            <legend>เพิ่มข้อมูลพนักงาน</legend>
            <form action="personnel_process.php" method="post">
                <table width="80%" cellpadding="3px" 
                style="border: #999 1px dotted;margin: 5px;">
                    <th colspan="2" style="background: #66CDAA;padding: 5px;">
                        เพิ่มข้อมูลพนักงาน
                    </th>
                    <tr>
                        <td align="right">ชื่อผู้ใช้ระบบ :</td>
                        <td>
                            <input type="text" name="username"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">รหัสผ่าน :</td>
                        <td>
                            <input type="password" name="password"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">ชื่อ-สกุล ผู้ใช้:</td>
                        <td>
                            <input type="text" name="psn_name"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">ตำแหน่ง:</td>
                        <td>
                            <select name="psn_position">
                                <option value="#">Selected</option>
                                <?php
                                    $sql = "select * from status";
                                    $result = mysql_query($sql);
                                    while ($data2 = mysql_fetch_array($result)) {
                                        if ($data2['name'] == '1') {
                                            echo "<option value='1'>ผู้ดูแลระบบ</option>";
                                        } 
                                    }
                                    echo "<option value='0'>พนักงาน</option>";
                                    ?>
                                
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">เพศ :</td>
                        <td>
                            <input type="radio" name="psn_sex" value="man"/>ชาย
                            <input type="radio" name="psn_sex" value="woman"/>หญิง
                        </td>
                    </tr>
                    <tr>
                        <td align="right" valign="top">ที่อยู่ :</td>
                        <td>
                            <textarea name="psn_address" rows="3" cols="30">
                                
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Tel:</td>
                        <td>
                            <input type="text" name="psn_mobile"/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Send"/>
                            <input type="reset" value="Reset"/>
                        </td>
                    </tr>
                </table>
            </form>
        </fieldset>
        <!------------------ End forrm_add พนักงาน ----------------------->
    </body>
</html>
