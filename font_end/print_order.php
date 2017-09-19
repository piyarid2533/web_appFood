<?php
ob_start();
@session_start();



require_once '../config/connect.php';
$member_id = $_SESSION["mem_id"];

// get order id
$sql = "SELECT ord.*,m.*
        FROM orderfood AS ord
        LEFT JOIN member AS m 
        ON ord.member_id = '$member_id'
        ORDER BY ord.order_id DESC
        LIMIT 1";

$rs = mysql_query($sql);
if (!$rs) {
    echo mysql_error();
}

$r = mysql_fetch_array($rs);

$order_id = $r["order_id"];


$sql_p = "
	SELECT  ord_de.*, f.food_name
	FROM orderdetail AS ord_de
	LEFT JOIN food AS f
	ON ord_de.food_id = f.food_id
	WHERE ord_de.order_id = '$order_id'
";

$rs_p = mysql_query($sql_p);

if (!$rs_p) {
    echo mysql_error();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    </head>
    <body style="font-family: monospace;font-size: 13;">
        
    <div class="f_panel">
    <div class="f_panel_body"><br/>
    <div style="text-align:center; font-size:16px;
       font-weight:bold;margin-top:5px;padding: 3px;">
        <h3>Web-App System Healthy</h3>
    </div>
<table align="center" cellpadding="5">
    <tr>
        <td align="right">รหัสใบสั่งซื้อ : </td>
        <td><?php echo sprintf("%05d", $order_id); ?></td>
        <td align="right">ชื่อ-นามสกุล : </td>
        <td><?php echo $r["member_name"]; ?></td>
    </tr>
    <tr>
        <td align="right">เบอร์โทร : </td>
        <td><?php echo $r["member_mobile"]; ?></td>
    </tr>
    <tr>
        <td align="right">ที่อยู่ : </td>
        <td><?php echo $r["member_address"]; ?></td>
        <td align="right">วันที่สั่งซื้อ : </td>
        <td><?php echo $r["order_date"]; ?></td>
    </tr>
</table>


<table  width="70%" cellpadding="5px" align="center"
  style="border: #990033 1px dotted;">
   <thead>
        <th colspan="7"style="text-align:center; font-size:15px ;
         font-weight: bold; margin:5px;background:navajowhite;">
            รายการอาหาร และ พลังงาน
        </th>
        <tr align="center" style="background: lightsteelblue;">
            	<td width="30px">ลำดับ</td>
                <td>ชื่อสินค้า</td>
                <td width='50px'>จำนวน</td>
                <td width="80px">พลังงาน</td>
                <td width="80px">ราคา</td>
                <td width="80px">รวม/Bath</td>
                <td width="80px">รวม/Energy</td>
            </tr>
        </thead>
        <tbody>
        <?php while($r1 = mysql_fetch_array($rs_p)){
            $food_name   = $r1["food_name"];
            $f_qty       = $r1["quantity"];
            $price       = $r1["price"];
            $energy      = $r1["energy"];
            $total_price += ($f_qty * $price);
            $total_energy += ($f_qty * $energy);
            ?>
            <tr align="center">
            	<td align="center"><?php echo ++$n; ?></td>
                <td><?php echo  $food_name; ?></td>
                <td align="center"><?php echo $f_qty;?></td>
                <td align="center"><?php echo $energy;?></td>
                <td>
                    <?php echo  number_format($price,2,".",","); ?>
                </td>
                <td>
                    <?php echo  number_format(($price * $f_qty),2,".",","); ?>
                </td>
                <td>
                    <?php echo  number_format($total_energy,2,".",","); ?>
                </td>
            </tr>
            <?php } ?>
            
        </tbody><p/>
        <tfoot style="margin-bottom: 5px;">
        	<tr style="font-weight: bold;" align='center'>
            	<td colspan="5" align="right">
                    ราคารวม
                </td>
                <td
                style="border-bottom: #990033 3px double; color:#FF0000;">
                <?php echo number_format($total_price,2,".",","); ?>
                </td>
                <td
                style="border-bottom: #990033 3px double; color:#FF0000;">
                <?php echo number_format($total_energy,2,".",",");?>
                 Kcal
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </tfoot>
    </table>
        <div align="right" style="margin-top: 150px;">
            <div style="margin-right: 200px;">
                <input type="button"  value="Print"onclick="window.print()"/>
            </div>
        </div>
</body>
</html>
