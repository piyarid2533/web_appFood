<?php 


header('Cache-Control: max-age=900');

    require_once '../config/connect.php';

    $sql = "SELECT * FROM "
            . "food a left outer join foodtype b "
            . "on a.foodtype_id=b.foodtype_id";


        $rs = mysql_query($sql);

            $cols = 3;

            $c = $cols;
            
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../js/css/zoom.css">
    </head>
    <body>
        <?php
        $tableName = "food";
        $targetpage = "index.php";
        $limit = 6;

        $query = "SELECT COUNT(*) as num FROM $tableName";
        $total_pages = mysql_fetch_array(mysql_query($query));
        $total_pages = $total_pages['num'];

        $stages = 3;
        $page = mysql_real_escape_string($_GET['page']);
        if ($page) {
            $start = ($page - 1) * $limit;
        } else {
            $start = 0;
        }

// Get page data
        $sql = "SELECT * FROM $tableName LIMIT $start, $limit";
        $rs = mysql_query($sql);

        if (!$rs) {
            echo mysql_error();
        }

// Initial page num setup
        if ($page == 0) {
            $page = 1;
        }
        $prev = $page - 1;
        $next = $page + 1;
        $lastpage = ceil($total_pages / $limit);
        $LastPagem1 = $lastpage - 1;


        $paginate = '';
        if ($lastpage > 1) {




            $paginate .= "<div class='paginate'>";
            // Previous
            if ($page > 1) {
                $paginate .= "<a href='$targetpage?page=$prev'>previous</a>";
            } else {
                $paginate .= "<span class='disabled'>previous</span>";
            }



            // Pages	
            if ($lastpage < 7 + ($stages * 2)) { // Not enough pages to breaking it up
                for ($counter = 1; $counter <= $lastpage; $counter++) {
                    if ($counter == $page) {
                        $paginate .= "<span class='current'>$counter</span>";
                    } else {
                        $paginate .= "<a href='$targetpage?page=$counter'>$counter</a>";
                    }
                }
            } elseif ($lastpage > 5 + ($stages * 2)) { // Enough pages to hide a few?
                // Beginning only hide later pages
                if ($page < 1 + ($stages * 2)) {
                    for ($counter = 1; $counter < 4 + ($stages * 2); $counter++) {
                        if ($counter == $page) {
                            $paginate .= "<span class='current'>$counter</span>";
                        } else {
                            $paginate .= "<a href='$targetpage?page=$counter'>$counter</a>";
                        }
                    }
                    $paginate .= "...";
                    $paginate .= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
                    $paginate .= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";
                }
                // Middle hide some front and some back
                elseif ($lastpage - ($stages * 2) > $page && $page > ($stages * 2)) {
                    $paginate .= "<a href='$targetpage?page=1'>1</a>";
                    $paginate .= "<a href='$targetpage?page=2'>2</a>";
                    $paginate .= "...";
                    for ($counter = $page - $stages; $counter <= $page + $stages; $counter++) {
                        if ($counter == $page) {
                            $paginate .= "<span class='current'>$counter</span>";
                        } else {
                            $paginate .= "<a href='$targetpage?page=$counter'>$counter</a>";
                        }
                    }
                    $paginate .= "...";
                    $paginate .= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
                    $paginate .= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";
                }
                // End only hide early pages
                else {
                    $paginate .= "<a href='$targetpage?page=1'>1</a>";
                    $paginate .= "<a href='$targetpage?page=2'>2</a>";
                    $paginate .= "...";
                    for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++) {
                        if ($counter == $page) {
                            $paginate .= "<span class='current'>$counter</span>";
                        } else {
                            $paginate .= "<a href='$targetpage?page=$counter'>$counter</a>";
                        }
                    }
                }
            }

            // Next
            if ($page < $counter - 1) {
                $paginate .= "<a href='$targetpage?page=$next'>next</a>";
            } else {
                $paginate .= "<span class='disabled'>next</span>";
            }

            $paginate .= "</div>";
        }

        if (!empty($_POST["key_word"])) {
            $keyword = $_POST["key_word"];
        } else {
            $keyword = $_GET["key_word"];
        }
        ?>
        <!---------------------ค้นหาอาหาร---------------------->
        <div class="f_panel">
        <div class="f_panel_header">
            <center>ค้นหาอาหาร</center>
        </div>
        <div class="f_panel_body">

            <form method="post" action="index.php?url=show_food">
                <table cellpadding="5px" align="center">
                    <tr>
                        <td>ค้นหา : </td>
                        <td><input type="text" name="key_word" value="<?=$keyword?>"/></td>
                        <td><input type="submit" name="search_button" value="ค้นหา" /></td>
                    </tr>
                </table>
            </form>
        </div>
        </div>
        <?php
        if (!empty($_POST["search_button"]) || !empty($_GET["key_word"])) {
            if (!empty($_POST["key_word"])) {
                $keyword = $_POST["key_word"];
            } else {
                $keyword = $_GET["key_word"];
            }

            $sql_search = "SELECT * FROM food WHERE "
                        . "(food_name LIKE '%$keyword%'OR food_detail LIKE '%$keyword%' OR foodtype_name LIKE '%ไต%')";
                   
            $sql_search = "SELECT * FROM "
                        . "food a left outer join foodtype b "
                        . "on a.foodtype_id=b.foodtype_id";

            $rs_search = mysql_query($sql_search);

            if (!$rs_search) {
                echo mysql_error();
            }

            if (mysql_num_rows($rs_search) == 0) {
                echo "ไม่มีข้อมูลที่ท่านค้นหา";
            } else {
                ?>
        <br />
        <!------------values null!!-------------->
    <table  width="95%" cellpadding="5px"  align="center"
    style="border: #ccc 1px solid;font-size: 16px;">
        <th style="background:mediumorchid;
           border-bottom:lightseagreen 5px solid;" colspan="3">
            <font color="#fff">รายการอาหาร</font>
        </th>
        <tr valign="top">
            <?php while ($r = mysql_fetch_array($rs_search)): ?>
            <td align="center">
                <div>
                    <?php
                    if ($r["food_img"] == "") {
                        $image = "warning.ico";
                    } else {
                        $image = $r["food_img"];
                    }
                    ?>
                    <a href="index.php?url=show_food_detail&food_id=<?php echo $r['food_id']; ?>&key_word=<?=$keyword?>">
                        <img src="../fileupload/<?php echo $image; ?>"
                        width="150px" data-action="zoom" class="pull-left">
                    </a>
                </div>
                <div>
                    <a href="index.php?url=show_food_detail&food_id=<?php echo $r['food_id']; ?>&key_word=<?=$keyword?>">
                        <?php echo $r["food_name"]; ?>
                    </a>
                </div>
                <div>
                    ราคา <?php echo number_format($r["food_price"], 2); ?> บาท
                </div>
                <div>
                    <?php if (isset($_SESSION["mem_id"])) { ?>
                    <a href="add_to_orderfood.php?food_id=<?php echo $r['food_id']; ?>">
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
            <?php
        }
    }
    ?>
</div>
<br />



<?php if(empty($_POST["search_button"]) && empty($_GET["key_word"])) : ?>
<!------------------------------- show Food------------->
<table  width="95%" cellpadding="5px"  align="center"
    style="border: #ccc 1px solid;font-size: 16px;border-radius: 5px 5px 0px 0px;">
        <th style="background:mediumorchid;border-radius: 5px 5px 0px 0px;
            border-bottom:lightseagreen 5px solid;" colspan="3">
            <font color="#fff">รายการอาหาร</font>
        </th>
        <tr align="center">
        <?php
            while ($result = mysql_fetch_array($rs)) {
                $c --;
                ?>
                <td width="150px" align="center">
            <div style="margin-bottom: 10px;margin-top: 5px;">
                <img src="../fileupload/<?= $result[food_img] ?>"
                   width="200px" data-action="zoom" class="pull-left"/>
             <br/>รูป
            </div>
                <div>ชื่อ:<?=$result[food_name]; ?><br/></div>
                <div>ราคา <?php echo number_format($result["food_price"], 2); ?> บาท<br/></div>
                <div>
                    <?php if (isset($_SESSION["mem_id"])) { ?>
                    <a href="index.php?url=show_food_detail&food_id=<?php echo $result['food_id']; ?>">
                            สั่งอาหาร
                        </a>
                    <?php } ?>
                </div>
            </td>
            <?php
            if ($c == 0) {
                $c = $cols;
                ?>
            </tr>
            <?php }{ ?>
          <?php
    }
}
?>
</tr></table>
<div align="center" style="margin:30px;">
<?php

 // pagination
 echo $paginate;
?>


</div>
<?php endif ?>
</body>
</html>
