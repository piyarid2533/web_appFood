
<?php

    require_once '../config/connect.php';
    
    $activityid = $_GET[activityid];
    
    $sql = "SELECT * FROM activity WHERE activityid = '$activityid' ";
    
        $rs = mysql_query($sql);
        
        if($rs){
            
            $r = mysql_fetch_array($rs);
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
        <legend>แก้ไขข้อมูลพลังงานที่ใช้ในการทำกิจกรรม</legend>
        <form action="activity_edit_process.php" method="post">
            <table width="80%"cellpadding="5px" 
            style="border: #cccccc 1px solid; margin-top: 20px;
            margin-bottom: 20px;">
            <th colspan="2" bgcolor="#66CDAA">
                แก้ไขข้อมูลพลังงานที่ใช้ในการทำกิจกรรม
            </th>
            <tr>
                    <td align="right">ชื่อกิจกรรม :</td>
                    <td>
                        <input type="text" name="activity_name" value="<?=$r[activity_name]?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="right" valign="top">รายละเอียดกิจกรรม :</td>
                    <td>
                        <textarea name="detail" rows="3" cols="30"><?php echo $r[detail];?></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="right">จำนวณครั้งที่ทำกิจกรรม :</td>
                    <td>
                        <input type="text" name="number_week" value="<?=$r[number_week]?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        พลังงานที่ใช้ในการทำกิจกรรม :
                    </td>
                    <td>
                        <input type="text" name="energy" value="<?=$r[energy]?>"/>
                        ใช้พลังงานต่อชั่วโมง (Kcal)
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Send"/>
                        <input type="reset" value="Reset"/>
                        <input type="hidden" name="activityid" value="<?=$r[activityid]?>"/>
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
    </body>
</html>
