<style type="text/css">
    .grid thead tr td{
        
    }
    .grid tbody tr td{
        border-bottom: #999 1px dashed;
        border-right: #ccc 1px solid;
    }
</style>
<?php if (empty($_SESSION["my_order_food"])) { ?>
<div class="f_panel">
    <div class="f_panel_header"><center>รายการอาหาร</center></div>
    <div class="f_panel_body">

        <div style="margin: 50px auto; 
             text-align:center;
             font-weight:bold;
             font-size:16px;
             color:#990066;">
            ไม่มีรายการอาหาร
        </div>

    </div>
    </div>
<?php } else { ?>

<!-- warp order-->
<div style="width:90%;margin-left: 35px;margin-top: 10px;
     border: #ccc 1px solid;">
    <div style="background: mediumseagreen;padding: 5px;color:#fff; ">
        <center>
            รายการอาหาร
        </center>
    </div>
<div class="f_panel_body">
<form method="post" action="calculate_price.php">
    <table  width="100%" align="center"  cellpadding="5px" class="grid">
    <thead>
        <tr align="center" style="background:palegoldenrod;">
            <td width="40px">ลำดับ</td>
            <td>ชื่อสินค้า</td>
            <td>จำนวน</td>
            <td width="80px">ราคา</td>
            <td width="80px">พลังงาน/Kcal</td>
            <td width="80px">รวม</td>
            <td width="40px">ลบ</td>
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
            <input  style="text-align:center"type="text" name="f_qty[]" 
                value="<?php echo $f_qty; ?>" size="1" />
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
            <td align="center">
                <a onclick="return confirm('ยืนยันการลบรายการอาหาร ?');"
                   href="delete_from_orderfood.php?food_id=<?php echo $food_id; ?>">
                    <img src="../ico/erase.ico" border="0" />
                </a>
        </td>
            </tr>
        <?php } //end for   ?>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" align="right">
                        พลังงานทั้งหมดจากการรับประทานอาหาร
                    </td>
                <td align="right"
                style="border-bottom: hotpink 3px double; color:#FF0000;">
                <?php echo number_format(($total_energy), 2, ".", ","); ?>
                </td>
                <td align="center">Kcal</td>
                </tr>
            <tr style="">
                <td colspan="5" align="right">ราคารวม</td>
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

    <div align="center">
            <input type="button" value="<< สั่งอาหารเพิ่ม"  
                   onclick="window.location = 'index.php'" />
            <input type="submit" name="cal_price" value="คำนวณราคา" />
            <input type="submit" name="buy_product" value="สั่งอาหาร >>" />
        </div>
        <br />
    </div>
 </form>
<?php } ?>
