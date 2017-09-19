<?php
ob_start();
session_start();

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
if(!$rs) {
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

if(!$rs_p) {
	echo mysql_error();
}
?>
<div class="f_panel" style="margin: 20px;">
    <div style="background: lightseagreen;padding: 5px;">
    <div style="margin-left: 10px;color: #FFF;">
    เมนู และ รายการอาหารที่สั่ง
    </div>
</div>
    
<div class="f_panel_body" style="margin: 10px;"><br/>
<div style="font-size:16px;font-weight:bold;
     margin-top:5px;padding: 3px;">
        Web-App System Healthy
    </div>
    <table cellpadding="5"  width="70%">
        <tr>
            <td width="100px">
                <strong>
                 Bill ID 
                </strong>
            </td>
            <td colspan="3">: <?php echo sprintf("%05d", $order_id); ?>
            </td>
        </tr>
        <tr>
            <td>
                <strong>ชื่อ-นามสกุล  </strong>
            </td>
            <td  colspan="3">:  <?php echo $r["member_name"]; ?>
            </td>
        </tr>
    </table><br/>
    
    
    <table  width="95%" cellpadding="5px" style="border: #990033 1px dotted;">
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
        </tfoot>
    </table>
    <br /><br />
 </div>
</div>
<center>
    <input type="button" value="View"
           onclick="javascript: window.location.href='print_order.php';"/>
    <input type="button" value="<< Back "
           onclick="javascript: window.location.href='index.php';"/>
</center><br /><br />
