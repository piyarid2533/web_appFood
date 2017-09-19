<?php

require_once '../config/connect.php';

$foodtype_id = $_GET["foodtype_id"];

$sql = "SELECT * FROM food WHERE foodtype_id='$foodtype_id'";

$rs = mysql_query($sql);

if(!$rs) {
	echo mysql_error();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="f_panel" style="margin-top: 5px;">
        <div class="f_panel_header">
	<center>ประเภทอาหาร [ <?php echo $_GET["foodtype_name"];?> ]</center>
        </div>

<div class="f_panel_body">

<table width="100%" cellpadding="5">
    <tr valign="top">

<?php while ($r = mysql_fetch_array($rs)): ?>
    <td align="center">
        <div>
            <?php
            if ($r["food_img"] == "") {
                $food_img = "warning.ico";
            } else {
                $food_img = $r["food_img"];
            }
            ?>
            <a href="index.php?url=show_food_detail&food_id=<?php echo $r['food_id']; ?>">
                <img src="../fileupload/<?php echo $food_img; ?>" width="200px"
                 data-action="zoom" class="pull-left"/>
            </a>

        </div>
        <div>
            <a href="index.php?url=show_food_detail&food_id=<?php echo $r['food_id']; ?>">
                <?php echo $r["food_name"]; ?>
            </a>
        </div>
        <div>
            ราคา <?php echo number_format($r["food_price"], 2); ?> บาท
        </div>
        <div>
            <?php if (!empty($_SESSION["member_id"])) { ?>
                <a href="add_to_orderfood.php?f_id=<?php echo $r['food_id']; ?>">
                    สั่งอาหาร
                </a>
            <?php } ?>
        </div>

    </td>

    <?php
    if (++$n % 3 == 0) {
        echo "</tr><tr valign='top'>";
    }
    ?>

<?php endwhile ?>


</table>
</div>
</div>
    </body>
</html>
