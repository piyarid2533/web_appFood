<?php
        require_once '../config/connect.php';
        require_once '../back_end/function.php';
        
            $sql = "SELECT food.food_name,food_price,Total,p
                    FROM food INNER JOIN
                    (SELECT order_id,SUM(price*quantity)AS p,
                    food_id,SUM(quantity)AS Total
                                FROM orderdetail
                                GROUP BY food_id)AS OD
                                ON food.food_id=OD.food_id 
                    ORDER BY Total ASC LIMIT 2";
            
                $rs = mysql_query($sql);
                
                if(!$rs){
                    echo mysql_error();
                } else {
                    $n = 1;
                }
        
                
        
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            .grid{
                border: #999 1px dashed;
                margin: 40px;
            }
            .grid thead tr td{
                padding: 5px;
                background: orange;
                color: #fff;
            }
            .grid tbody tr td{
                border-bottom: #ccc 1px dotted;
                border-right: #cccccc 1px solid;
            }
            #r{
                background:lightcoral;
                color: #fff;
            }
        </style>
    </head>
    <body>
      <div style="margin-top: 30px;">
        <fieldset style="border: 1px #cccccc solid;margin: 10px;">
         <legend>รายงานอันดับอารหารที่ขายไม่ดี </legend>
         <table width="80%" cellpadding="5px" class="grid">
             <thead>
             <th colspan="5" id="r">
                รายงานอันดับอารหารที่ขายไม่ดี 
            </th>
            <tr align="center">
                <td width="30px">ลำดับ</td>
                <td>ชื่ออาหาร</td>
                <td>ราคา</td>
                <td width="150px">จำนวนรายการอาหาร</td>
                <td width="90px">ราคารวมทั้งหมด</td>
                
            </tr>
            </thead>
            
            <tbody>
            <?php while ($row = mysql_fetch_array($rs)):?>
            <tr align="center">
                <td><?php echo $n++;?></td>
                <td><?=$row[food_name]?></td>
                <td><?=$row[food_price]?></td>
                <td><?=$row[Total]?></td>
                <td>
                    <font color="red">
                    <?php echo number_format($row[p], 2, ".", ",")?>
                    </font>
                </td>
            </tr>
            </tbody>
            <?php endwhile;?>
        </table>
        </fieldset>
       </div>
    </body>
</html>
