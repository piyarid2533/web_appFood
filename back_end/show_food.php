<?php 
    
    require_once '../config/connect.php';
    
    $sql = "SELECT * FROM "
            . "food a left outer join foodtype b "
            . "on a.foodtype_id=b.foodtype_id";

    $result = mysql_query($sql);
    
    $id= 1;
    $code = sprintf("F%'06d",$id);

    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            .gid thead tr td{
                background: #1ea167;border-bottom:greenyellow 5px solid;
                text-align: center;padding: 5px;color: #fff;
            }
            .gid tbody tr td{
                padding: 5px;
                border-bottom: #666 1px dashed;
                border-right: #ccc 1px solid;
                border-left: #ccc 1px solid;
            }
        </style>
    </head>
    <body>
        <div>
            <fieldset style="border: 1px #cccccc solid;margin: 10px;">
                <legend>แสดงข้อมูลเมนูอารหารและพลังงาน</legend>
                <table width="90%" class="gid" style="margin: 20px;">
                    <thead>
                    <tr align="center">
                        <td width="30px">ลำดับ</td>
                        <td width="150px">ชื่อ</td>
                        <td>ประเภทเมนูอาหาร</td>
                        <td>ราคา</td>
                        <td>พลังงาน</td>
                        <td>รูปภาพ</td>
                        <td width="50px">แก้ไข</td>
                        <td width="50px">ลบ</td>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php  while ($r = mysql_fetch_assoc($result)):?>
                    <tr align="center">
                        <td><?php echo $code++;?></td>
                        <td><?=$r["food_name"];?></td>
                        <td><?=$r["foodtype_name"]?></td>
                        <td><?=$r["food_price"]?></td>
                        <td><?=$r["food_energy"]?></td>
                        <td>
                            <img src="../fileupload/<?=$r[food_img]?>" width="74px"/>
                        </td>
                        <td>
                            <a href="home.php?url=update_food&food_id=<?=$r[food_id]?>">
                                <img src="../ico/create.ico"/>
                            </a>
                        </td>
                        <td>
                            <a href="delete_food.php?food_id=<?=$r['food_id']?>&pic_del=<?=$r["food_img"]?>" 
                               
                               onclick="return confirm('ลบจิงอ่ะ')">
                                <img src="../ico/close.ico"/>
                            </a>
                        </td>
                    </tr>
                     <?php endwhile;?>
                    </tbody>
                </table>
            </fieldset>
        </div>
    </body>
</html>
