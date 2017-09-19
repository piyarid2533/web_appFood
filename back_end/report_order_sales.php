<?php
require_once '../config/connect.php';
require_once '../back_end/function.php';

if (!empty($_POST["report_button"]) || !empty($_GET["sy"])) {

    if (!empty($_GET["sy"])) {

        $start_y = $_GET["sy"];
        $start_m = $_GET["sm"];
        $start_d = $_GET["sd"];

        $end_y = $_GET["ey"];
        $end_m = $_GET["em"];
        $end_d = $_GET["ed"];
    } else {
        $start_y = ($_POST["start_year"] - 543);
        $start_m = $_POST["start_month"];
        $start_d = $_POST["start_date"];

        $end_y = ($_POST["end_year"] - 543);
        $end_m = $_POST["end_month"];
        $end_d = $_POST["end_date"];
    }

    $start_date = $start_y . "-" . $start_m . "-" . $start_d;
    $end_date = $end_y . "-" . $end_m . "-" . $end_d;

    $sql = "SELECT ord.*, m.member_name, e.psn_name,
            (
            SELECT SUM(quantity*price)
                FROM orderdetail AS ord_de
                WHERE ord.order_id = ord_de.order_id
		) AS total_price
		FROM orderfood AS ord
	LEFT JOIN member AS m
	ON ord.member_id = m.member_id
	LEFT JOIN personnel AS e
	ON ord.psn_id = e.psn_id
	WHERE ord.order_status IN('pay','send')
	AND order_date BETWEEN '$start_date' AND '$end_date'
	ORDER BY ord.order_id ASC
	";

    $rs = mysql_query($sql);

    if (!$rs) {
        echo mysql_error();
    }
}
?>
<!------------------ css  ----------------------- -->
<style type="text/css">
    .grid{
        border: #666 1px dotted;
        
    }
    .grid thead tr td{
        background: lightseagreen;
        color: #fff;
        padding: 3px;
    }
    .grid tbody tr td{
        border-right: #ccc 1px solid;
        
    }
</style>
<!------------------ css  ----------------------- -->
<div class="panel">
<div class="panel_header">
    รายงานยอดขาย
</div>
<div class="panel_body">
<div style="margin:20px auto 10px auto; text-align:center; 
    color:#990066; font-size:16px; font-weight:bold;">
    	รายงานยอดขาย
</div>
   <form method="post" action="<?=$_SERVER['PHP_SELF']?>?url=report_order_sales">
    <div align="center">
    	จากวันที่ : 
        <select name="start_date">
        	<?php foreach(get_date() as $k => $v) { ?>
            <option value="<?=$k?>"
            	<?php if($k == $start_d) { echo "selected"; } ?>><?=$v?>
            </option>
            <?php } ?>
        </select>
        
        <select name="start_month">
        <?php foreach(get_month() as $k => $v) { ?>
            <option value="<?=$k?>"
            <?php if($k == $start_m) { echo "selected"; } ?>>
            <?=$v?>
            </option>
            <?php } ?>
        </select>
        
        <select name="start_year">
        <?php foreach(get_year(2560, 2570) as $k => $v) { ?>
            <option value="<?=$k?>"
            <?php if($k == ($start_y+543)) { echo "selected"; } ?>>
            <?=$v?>
            </option>
            <?php } ?>
        </select>
        
        ถึงวันที่ : 
        <select name="end_date">
        <?php foreach(get_date() as $k => $v) { ?>
            <option value="<?=$k?>"
            <?php if($k == $end_d) { echo "selected"; } ?>><?=$v?>
            </option>
            <?php } ?>
        </select>
        
        <select name="end_month">
        <?php foreach(get_month() as $k => $v) { ?>
            <option value="<?=$k?>"<?php if($k == $end_m) { echo "selected"; }?>><?=$v?>
            </option>
            <?php } ?>
        </select>
        
        <select name="end_year">
        <?php foreach(get_year(2560, 2570) as $k => $v) { ?>
            <option value="<?=$k?>"
            <?php if($k == ($end_y+543)) { echo "selected"; }?>><?=$v?>
            </option>
            <?php } ?>
        </select>
        <input type="submit" name="report_button" value="ดูรายงาน" />
    </div>
    </form><br />
 
    <?php 
	if(!empty($_POST["report_button"]) || !empty($_GET["sy"])) { 
            if(mysql_num_rows($rs) == 0) { ?>
            <div style="margin: 40px auto; 
                    text-align:center;
                    font-weight:bold;
                    font-size:16px;
                    color:#990066;">
            ไม่มีรายงานยอดขายสินค้า
            </div>
    <?php } else { ?>
	
    <table class="grid" align="center" width="80%">
    	<thead>
            <tr align="center">
            <td>ลำดับ</td>
            <td>รหัสใบสั่งซื้อ</td>
            <td>ผู้ซื้อ</td>
            <td>ผู้ขาย</td>
            <td>วันที่สั่งซื้อ</td>
            <td>ยอดเงินรวม</td>
            </tr>
        </thead>
        <tbody>
        <?php while($r = mysql_fetch_array($rs)): $total_sales += $r["total_price"]; ?>
         <tr align="center">
            <td align="center"><?php echo ++$n; ?></td>
             <td align="center">
                <a href="home.php?url=report_order_sales_detail&ord_id=<?=$r['order_id']?>&sy=<?=$start_y?>&sm=<?=$start_m?>&sd=<?=$start_d?>&ey=<?=$end_y?>&em=<?=$end_m?>&ed=<?=$end_d?>">
                <?php echo sprintf("%05d",$r["order_id"]); ?>
                 </a>
                </td>
                <td><?php echo $r["member_name"]; ?></td>
                <td>
                <?php
                    if($r["psn_name"] == "") {
                            echo "<center>";
                            echo " - ";
                            echo "</center>";
                    } else {
                            echo $r["psn_name"];
                    }
		?>
                </td>
                <td align="center"><?php echo $r["order_date"]; ?></td>
                <td style="color:#990000; font-weight: bold;">
                	<?php echo number_format($r["total_price"],2,".",","); ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    
    <div style="margin:30px; text-align:center; font-size:16px; font-weight:bold;">
    	ยอดขายรวม : <span style="color:#990000;"><?php echo number_format($total_sales,2,".",","); ?></span> บาท
    </div>
    <?php	} // end if num rows

            } // end if not empyt
     ?>
    </div>
</div>