<?php
    
require_once '../config/connect.php';

    $sql = "SELECT ord.*,mem.member_name,
		(
                SELECT SUM(quantity*price)
                FROM orderdetail
                WHERE ord.order_id = orderdetail.order_id			
		) AS total_price
	FROM orderfood AS ord
	LEFT JOIN member AS mem
	ON ord.member_id = mem.member_id
	WHERE ord.order_status = 'wait'
	ORDER BY ord.order_id ASC";
    
            $rs = mysql_query($sql) or die(mysql_error());
            
            $n = 1;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            .grid{
                border: #ccc 1px solid;
                margin: 5px;
            }
            .grid thead tr td{
                padding: 3px;
            }.grid tbody tr td{
                border-right: #ccc 1px solid;
                border-bottom: #999 1px dashed;
                background: lemonchiffon;
            }
        </style>
    </head>
    <body>
        
        <!-- show order -->
        <?php if($rs):?>
        <table class="grid"width="80%" cellpadding="3px">
            <thead>
            <th colspan="7" style="background:#336699;color:#fff;">
                <div>
                    ข้อมูลสถานะการจัดส่งอาหาร 
                </div>
            </th>
            <tr align="center" style="background:deeppink;color:#fff;">
            	<td width="50px">ลำดับ</td>
                <td>รหัสใบสั่งซื้อ</td>
                <td>ชื่อผู้สั่งซื้ออาหาร</td>
                <td>สถานะ</td>
                <td>ยืนยัน</td>
            </tr>
            </thead>
            
            <tbody>
            <?php while ($r = mysql_fetch_array($rs)): ?>
             <tr align="center">
            	<td><?php echo $n++; ?></td>
                <td>
                <a href="home.php?url=show_order_detail&ord_id=<?php echo $r['order_id']; ?>">
                    <?php
                     echo sprintf("%05d", $r["order_id"]);
                    ?>
                </td>
                <td><?=$r[member_name]?></td>
                <td>
                    <?=$r[order_status]?>
                </td>
                <td>
                    <a href="confirm_order.php?ord_id=<?php echo $r['order_id'];?>">
                        <img src="../ico/OK.ico" border="0" />
                    </a>
                </td>
            </tr>
            <?php endwhile;?>
            </tbody>
        </table>
        <?php endif;?>
    </body>
</html>
