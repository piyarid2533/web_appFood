<?php
require_once '../config/connect.php';

    if(isset($_SESSION["mem_id"])) {
        $member_id = $_SESSION['mem_id'];
           $rs_mem = mysql_query("SELECT * FROM member WHERE member_id=$member_id");
          if (!$rs_mem) {
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
    </head>
    <body>
        <form action="member_register_add.php" method="post"name="form_member"
          onsubmit="return memberForm()">
            <table width="85%" cellpadding="3px" style="margin-bottom: 30px;
              margin-left: 50px;margin-top: 30px;border: #999 1px dotted;">
                <th style="background:plum;" colspan="2" align="center">
                    สมัครสมาชิก
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
            </form>
    </body>
</html>
