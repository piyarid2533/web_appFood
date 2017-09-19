<?php
session_start();
$mem_id = $_SESSION["mem_id"];

$rs = mysql_query("SELECT * FROM member WHERE member_id='$mem_id'");

if(!$rs) {
	echo mysql_error();
}
$r = mysql_fetch_array($rs);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            .grid thead tr td{
                border-bottom: #999 3px double;
            }
            .grid tbody tr td{
                border-bottom: #999 1px dashed;
                border-right: #ccc 1px solid;
                padding: 3px;
            }
        </style>
    </head>
    <body>
        <div style="margin: 10px;">
        <div class="f_panel" style="background: beige">
        <div class="f_panel_header">
            <center>รายการสั่งอาหาร</center>
        </div>
        <div class="f_panel_body" >
        <div style="text-align:center;font-weight:bold; color:#000099; 
        margin:10px auto;">
                ข้อมูลลูกค้า
            </div>
            <table align="center" cellpadding="5"> 
                <tr>
                    <td>ชื่อ-สกุล : </td>
                    <td><?php echo $r["member_name"]?></td>
                    <td>เพศ : </td>
                    <td>
                        <?php
                        if ($r["member_sex"] == 0) {
                            echo "ชาย";
                        } else {
                            echo "หญิง";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>เบอร์โทร : </td>
                    <td>
                        <?php echo $r["member_mobile"]; ?>
                    </td>
                </tr>
                <tr>
                    <td>ที่อยู่ : </td>
                    <td colspan="3">
                        <?php echo $r["member_address"]; ?>
                    </td>
                </tr>
            </table>

            <br />

            <table  width="100%" class="grid" align="center">
                <thead>
                <th colspan="6"style="background: cadetblue;
                    padding: 5px;color:#fff; "><center>
                        ข้อมูลอาหาร
                    </center>
                </th>
                    <tr align="center" style="background:mistyrose">
                        <td width="40px">ลำดับ</td>
                        <td>ชื่อสินค้า</td>
                        <td width="50px">จำนวน</td>
                        <td width="80px">ราคา</td>
                        <td width="80px">พลังงาน</td>
                        <td width="80px">รวม</td>
                    </tr>
                </thead>
                <tbody>

                <?php
            for ($i = 0; $i < count($my_order_food); $i++) {
                $food_id      = $my_order_food[$i][0];
                $food_name    = $my_order_food[$i][1];
                $f_qty        = $my_order_food[$i][2];
                $food_price   = $my_order_food[$i][3];
                $food_energy  = $my_order_food[$i][4];
                $total_price  += ($food_price * $f_qty);
                $total_energy  +=  ($f_qty*$food_energy);
            ?>
            <tr align="center">
            <td align="center"><?php echo ++$n; ?></td>
            <td><?php echo $food_name; ?></td>
            <td align="center">
            <?php echo $f_qty; ?>
            </td>
            <td align="">
                <?php echo number_format($food_price, 2, ".", ","); ?>
            </td>
            <td align="">
                <?php echo $food_energy; ?>
            </td>
            <td align="">
                <?php echo number_format(($food_price * $f_qty), 2, ".", ","); ?>
            </td>
            </tr>
        <?php } //end for   ?>
              </tbody>
              <tfoot>
                <tr>
                    <td colspan="4" align="right">พลังงานทั้งหมด</td>
                    <td align="right"
                style="border-bottom: hotpink 3px double; color:#FF0000;">
                <?php echo number_format(($total_energy), 2, ".", ","); ?>
                    </td>
                <td align="center">Kcal</td>
                </tr>
                <tr style="">
                    <td colspan="4" align="right">ราคารวม</td>
                    <td align="right"
                style="border-bottom:  hotpink 3px double; color:#FF0000;">
                <?php echo number_format(($total_price), 2, ".", ","); ?>
                    </td>
                <td align="center">บาท</td>
                </tr>
            </tfoot>
            </table>
       
            </div>
            <br /><br />

            <div style="margin:30px auto; text-align:center">
                <input type="button" value="<< ย้อนกลับ"  onclick="javascript: history.back();" />
                <input type="button" value="ยืนยันสั่งอาหาร" onclick="window.location='order_save.php';" />
            </div>

            <br />
        </div>
      </div>
    </body>
</html>
