<?php

require_once '../config/connect.php';

    $ord_id = $_GET["ord_id"];

        $sql = "SELECT  ord_de.*, f.food_name
                FROM orderdetail AS ord_de
                LEFT JOIN food AS f ON ord_de.food_id = f.food_id
                WHERE ord_de.order_id = '$ord_id'";

            $rs = mysql_query($sql);

    if (!$rs) {
        
    echo mysql_error();
}

?>
<style type="text/css">
    .grid{
        border: #ccc 1px solid;
    }
    .grid thead tr td{
        padding: 3px;
    }
    .grid tbody tr td{
        border-bottom: #999 1px dashed;
        border-right: #ccc 1px solid;
    }
</style>
<div style="margin: 30px;width: auto;">
<div style="">
    <table  width="90%" align="center" cellpadding="3px" class="grid">
      <thead>
        <th colspan="7"style="background:lightsalmon;padding: 5px;color: #fff;">
            รายละเอียดใบสั่งซื้อเลขที่ 
            [ <?php echo sprintf("%05d", $ord_id); ?> ]
        </th>
            <tr align="center" style="background: darkseagreen;color: #fff;">
                <td width="40px">ลำดับ</td>
                <td>ชื่ออาหาร</td>
                <td>จำนวน</td>
                <td>พลังงาน</td>
                <td width="80px">ราคา</td>
                <td width="80px">รวม/Bath</td>
                <td width="80px">พลังงาน/kcal</td>
            </tr>
        </thead>
        <tbody>

        <?php
        while ($r = mysql_fetch_array($rs)):
            
              $food_name = $r["food_name"];
              $f_qty = $r["quantity"];
              $energy = $r["energy"];
              $price = $r["price"];
              $total_price += ($f_qty * $price );
              $total_energy += ($f_qty * $energy );
            ?>

            <tr align="center">
                <td align="center">
                    <?php echo ++$n;?>
                </td>
                <td>
                    <?php echo $food_name?>
                </td>
                <td align="center">
                    <?php echo $f_qty;?>
                </td>
                <td>
                    <?php echo $energy;?>
                </td>
                <td align="">
                    <?php echo number_format($price, 2, ".", ",");?>
                </td>
                <td align="">
                    <?php echo number_format(($price * $f_qty), 2, ".", ","); ?>
                </td>
                <td align="">
                    <?php echo number_format($total_energy, 2, ".", ","); ?>
                </td>
            </tr>
            <?php endwhile ?>
        </tbody>
        <tfoot>
            <tr style="font-weight: bold;">
                <td colspan="4" align="right">ราคารวม </td>
                <td align="center"
                 style="border-bottom: #990033 3px double; color:#FF0000;">
                  <?php echo number_format($total_price, 2, ".", ","); ?>
                </td>
                <td>รวมพลังงาน</td>
                <td align="center"
                 style="border-bottom: #990033 3px double; color:#FF0000;">
                  <?php echo number_format($total_energy, 2, ".", ","); ?>
                </td>
            </tr>
        </tfoot>
    </table>

    <div style="margin:30px auto; text-align:center">
        <input type="button" value="<< ย้อนกลับ"  onclick="javascript: history.back();" />
        <?php if (empty($_GET["ord_send"])) { ?>
            <input type="button" value="ยืนยัน >>"
            onclick="window.location='confirm_order.php?ord_id=\n\
            <?php echo $ord_id; ?>';" />
        <?php } else { ?>
            <input type="button" value="จัดส่งสินค้า >>" onclick="" />
        <?php } //end if  ?>
             <input type="button"  value="Print"onclick="window.print()"/>
    </div>
  <br />
</div>
</div>