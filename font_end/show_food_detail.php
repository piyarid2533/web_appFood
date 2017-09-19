<?php

    $food_id = $_GET["food_id"];
    
    $sql = "SELECT f.*, t.foodtype_name FROM food  AS f
			INNER JOIN foodtype AS t 
			ON t.foodtype_id = f.foodtype_id
			WHERE food_id = '$food_id'";
    $rs = mysql_query($sql);

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
    </head>
    <body>
        <div class="f_panel">
        <div class="f_panel_header">
            รายละเอียดอาหาร
        </div>

          <div class="f_panel_body">
            <table class="grid-detail" width="100%" cellpadding="5" >
                <tr>
                    <td colspan="2" align="center">
                        <?php
                        if ($r["food_img"] == "") {
                            $food_img = "warning.ico";
                        } else {
                            $food_img = $r["food_img"];
                        }
                        ?>

                        <img src="../fileupload/<?php echo $food_img; ?>" 
                         width="400px" border="0" class="pull-left"/>

                    </td>
                </tr>
                <tr>
                    <td align="right" width="160px"><strong>ชื่ออาหาร : </strong></td>
                    <td><?php echo $r["food_name"]; ?></td>
                </tr>
                <tr>
                    <td align="right" width="160px"><strong>ประเภท : </strong></td>
                    <td>
                        <font color="red">
                            <?php echo $r["foodtype_name"]; ?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td align="right" width="160px"><strong>ราคา : </strong></td>
                    <td><?php echo number_format($r["food_price"], 2); ?> บาท</td>
                </tr>
                <tr>
                    <td align="right" width="160px"><strong>พลังงาน : </strong></td>
                    <td><?php echo $r["food_energy"]; ?></td>
                </tr>
                <tr>
                    <td align="right" width="160px"><strong>รายละเอียด : </strong></td>
                    <td><?php echo $r["food_detail"]; ?></td>
                </tr>
            </table>

            <br />
            <div align="center">
                <?php if (empty($_GET["key_word"])) { ?>
                    <input type="button" value="<< ย้อนกลับ" 
                           onclick="javascript:history.back();"/>
                       <?php } else { ?>
                    <input type="button" value="<< ย้อนกลับ"
                           onclick="window.location='index.php?url=show_food&key_word=<?=$_GET["key_word"]?>';"/>
                       <?php } //end if ?>
                    
                 <?php if (isset($_SESSION["mem_id"])) { ?><!-- member Login -->
                <input type="button" value="สั่งอาหาร" 
                onclick="window.location='add_to_orderfood.php?food_id=<?php echo $food_id; ?>';"/>
                  <?php } else { ?>
                <!-- personnel -->
                <input type="button" value="สมัครสมาชิก" 
                onclick="window.location='index.php?url=member_register'"/>
                <?php }?>
            </div>
            <br />
            </div>
        </div>
    </body>
</html>
