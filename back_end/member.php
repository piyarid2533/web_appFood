<?php

    require_once '../config/connect.php';
    if(!empty($_GET["member_id"])) {
	$member_id = $_GET['member_id'];
	$rs_mem = mysql_query("SELECT * FROM member WHERE member_id=$member_id");
								
	if(!$rs_mem) {
		echo mysql_error();
	} else {
		$r_mem = mysql_fetch_array($rs_mem);
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            .grid thead tr td{
                padding: 5px;
            }
            .grid tbody tr td{
                border-bottom: #999 1px dashed;
                border-right: #cccccc 1px solid;
                border-left: #cccccc 1px solid;
            }
        </style>
    </head>
    <body>
        <fieldset style="border: 1px #cccccc solid;margin:20px;">
         <legend>เพิ่มข้อมูลสมาชิก</legend>
        <form action="manage_member_save.php" method="post"name="form_member"
          onsubmit="return memberForm()">
            <table width="85%" cellpadding="3px" style="margin-bottom: 30px;
              margin-left: 50px;margin-top: 30px;border: #999 1px dotted;">
                <th style="background:lightseagreen;color: #fff;" 
                    colspan="2" align="center">
                    เพิ่มข้อมูลสมาชิก
                </th>
                <tr>
                    <td width="120px" align="right">ชื่อ-นามสกุล:</td>
                    <td>
                        <input type="text" name="member_name" value="<?=$r_mem[member_name]?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">เพศ :</td>
                    <td>
                        <input type="radio" name="member_sex" value="0" checked/>ชาย
                        <input type="radio" name="member_sex" value="1"
                        <?php
                         if($r_mem[member_sex]=="1"){
                             echo "checked";
                         }

                     ?>/>หญิง
                    </td>
                </tr>
                <tr>
                    <td align="right">เบอร์โทร :</td>
                    <td>
                        <input type="text" name="member_mobile" value="<?=$r_mem[member_mobile]?>"/>
                    </td>
                </tr>
                <tr valign="top">
                    <td align="right">ที่อยู่ :</td>
                    <td>
                        <textarea name="member_address" rows="3" cols="30">
                            <?php echo $r_mem[member_address]?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td width="100px" align="right">ชื่อผู้ใช้ :</td>
                    <td>
                        <input type="text" name="username" value="<?=$r_mem[username]?>"/>
                        *Username
                    </td>
                </tr>
                <tr>
                    <td align="right">
                    </td>
                </tr>
                <tr>
                    <?php if (empty($r_mem)) { ?>
                        <td align="right">รหัสผ่าน : </td>
                        <td>
                            <input type="password" name="password"/>
                            *Password
                        </td>
                    <?php } else { ?>
                        <td align="right">รหัสผ่านใหม่ : </td>
                        <td>
                            <input type="password" name="password_new"/>
                            *Password New
                        </td>
                </tr>
                <tr>
                    <td  align="right">รหัสผ่านเก่า :</td>
                    <td>
                        <input type="hidden" name="password" value="<?=$r_mem[password]?>"/>
                        <?php echo "<font color='red'>".$r_mem[password]."<font/>"?>
                    </td>
                    <?php } ?>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Send"/>
                        <input type="reset" value="Reset"/>
                        <input type="hidden" name="member_id" value="<?=$r_mem[member_id]?>"/>
                    </td>
                </tr>
            </table>
            
            
            <!--แสดงข้อมูล -->
            <?php
                
                   require '../config/connect.php';
                   
                    $sql = "SELECT * FROM member";
                    
                        $rs = mysql_query($sql);
                        
                        if(!$rs){
                            
                            echo mysql_error();
                        } else {
                            
                            $n = 1;
                        }
            ?>
            <div align="center">
                <table width="90%"cellpadding="3px" class="grid">
                    <thead>
                    <tr>
                        <td colspan="8" style="background:lightseagreen;color: #fff;">
                            <strong>
                                <div style="margin-left: 20px;">
                                    ข้อมูลสมาชิก
                                </div>
                            </strong>
                        </td>
                    </tr>
                    <tr align="center" style="background:#336699;color: #fff;">
                        <td width="50px">ลำดับ</td>
                        <td>ชื่อ-สกุล</td>
                        <td>เพศ</td>
                        <td>เบอร์โทร</td>
                        <td>ชื่อผู้ใช้</td>
                        <td width="50px">แก้ไข</td>
                        <td width="50px">ลบ</td>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php while ($row = mysql_fetch_array($rs)):?>
                    <tr align="center">
                        <td width="50px">
                            <?php echo $n++;?>
                        </td>
                        <td><?=$row[member_name];?></td>
                        <td>
                            <?php 
                                if($row["member_sex"] == 0) {
                                        echo "ชาย";
                                } else {
                                        echo "หญิง";
                                }
				?>
                        </td>
                        <td><?=$row[member_mobile]?></td>
                        <td><?=$row[username]?></td>
                        <td width="70px">
                            <a href="home.php?url=member&member_id=<?=$row['member_id']?>">
                            <img src="../ico/create.ico"/>
                            </a>
                        </td>
                        <td width="70px">
                            <a href="manage_member_delete.php?member_id=<?php echo $row['member_id']; ?>"
                               onclick="return confirm('ยืนยันการลบข้อมูลสมาชิก ')">
                                <img src="../ico/close.ico"/>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                    <?php endwhile;?>
                </table>
            </div>
            </form>
       </fieldset>
    </body>
</html>
