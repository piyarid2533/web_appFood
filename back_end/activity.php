<?php
    
    require_once '../config/connect.php';
    
        $sql = "SELECT * FROM activity";
        
            $rs = mysql_query($sql);
            
            if($rs){
            
            $n = 1;//
            }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script language="javascript" src="../js/jQuery 1.2.6.js"></script>
        <style type="text/css">
            .grid_b thead tr td{
                padding: 3px;
            }
            .grid_b tbody tr td{
                border-bottom: #666 1px dashed;
                border-right: #ccc 1px solid;
            }
        </style>  
    </head>
    <body>
    <fieldset style="border: 1px #cccccc solid;margin: 10px;">
        <legend>จัดการข้อมูลพลังงานที่ใช้ในการทำกิจกรรม</legend>
        <form action="activity_add.php" method="post" id="form1" name="form1" onsubmit="return chk_form()">
        <table width="80%"cellpadding="5px"style="border: #cccccc 1px solid;
               margin-top: 20px;margin-bottom: 20px;" class="grid">
            <thead>
            <th colspan="2" bgcolor="#66CDAA">
                เพิ่มข้อมูลพลังงานที่ใช้ในการทำกิจกรรม
            </th>
            <tr>
            <td align="right">ชื่อกิจกรรม :</td>
            <td>
                <input type="text" name="activity_name" id="activity_name"/>
            </td>
            </tr>
            <tr>
                <td align="right" valign="top">รายละเอียดกิจกรรม :</td>
                <td>
                    <textarea name="detail" id="detail" rows="3" cols="30"></textarea>
                </td>
            </tr>
            </thead>
            
            <tbody>
            <tr>
                <td align="right">จำนวณครั้งที่ทำกิจกรรม :</td>
                <td>
                    <input type="text" name="number_week" id="number_week"/>
                </td>
            </tr>
            <tr>
               <td align="right">
                    ความต้องการพลังงานที่ใช้ในการทำกิจกรรม :
                </td>
                <td>
                    <input type="text" name="energy" id="energy"/>
                    ใช้พลังงานต่อชั่วโมง (Kcal)
                </td>
            </tr>
            <tr>
               <td></td>
                <td>
                    <input type="submit" value="Send"/>
                    <input type="reset" value="Reset"/>
                </td>
                </tr>
              </tbody>
            </table>
          </form>
        </fieldset>

        <!-- show data-->
        <fieldset style="border: 1px #cccccc solid;margin: 10px;">
            <legend>แสดงข้อมูลพลังงานที่ใช้ในการทำกิจกรรม</legend>
            <table width="80%" cellpadding="3px" 
              style="border: #cccccc 1px solid;"class="grid_b">
                <thead>
                <th style="background: #66CDAA;" colspan="7">
                    แสดงข้อมูลพลังงานที่ใช้ในการทำกิจกรรม
                </th>
                <tr align="center" style="background: #336699;color: #fff;">
                    <td>ลำดับ</td>
                    <td>ชื่อกิจกรรม</td>
                    <td>รายละเอียด</td>
                    <td>จำนวนครั้ง</td>
                    <td>ความต้องการพลังงาน</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                </thead>
                
                <tbody>
                <?php while ($row = mysql_fetch_array($rs)): ?>
                    <tr align="center">
                        <td><?php echo $n++ ?></td>
                        <td><?= $row[activity_name] ?></td>
                        <td><?= $row[detail] ?></td>
                        <td><?= $row[number_week] ?></td>
                        <td><?= $row[energy] ?></td>
                        <td>
                            <a href="home.php?url=activity_edit&activityid=<?= $row[activityid] ?>">
                                <img src="../ico/create.ico"/>   
                            </a>
                        </td>
                        <td>
                            <a href="delete_activity.php?activityid=<?= $row[activityid] ?>" 
                               onclick="return confirm('ลบจิงดิ')">
                                <img src="../ico/delete.ico"/>
                            </a>
                        </td>
                    </tr>
                  </tbody>
                <?php endwhile; ?>
            </table>
        </fieldset>
    </body>
</html>
