<?php
//ob_start();
  require_once"../config/connect.php";

    $foodtype_id = $_GET["foodtype_id"];

      $sqle = "SELECT * FROM foodtype WHERE foodtype_id = '$foodtype_id'";

        $rs = mysql_query($sqle);

        if($rs){

          $r = mysql_fetch_array($rs);
        } else {
          echo mysql_error();
        }
?>
 <!doctype html>
<html>
  <head>
    <title><?php require_once"title.php";?></title>
  </head>

  <body>
      <fieldset style="border: 1px #cccccc solid;margin: 10px;">
          <legend>เพิ่มประเภทข้อมูลอาหาร</legend>
          <form method="post" action="foodtype_add.php">
            <table width="70%">
              <tr>
                  <td align="right">เพิ่มประเภทข้อมูลอาหาร :</td>
                  <td align="center">
                    <input type="text" name="foodtype_name" value="<?php echo $r['foodtype_name']?>"/>
                  </td>
                  <td>
                    <input type="hidden" name="foodtype_id" value="<?php echo $r["foodtype_id"]?>"/>
                    <input type="submit" value="Send"/>
                    <input type="reset" value="Reset"/>
                  </td>
              </tr>
            </table>
          </form>
        </br>
      <?php
    //sql
        $sql = "SELECT * FROM foodtype";

                $rs = mysql_query($sql);

                     $n = 1;

       ?>
          <!-- show data -->
          <?php if($rs): ?>
          <table width="60%" class="grid" cellpadding="4px">
              <thead>
              <tr align="center" style="font-size:13px;">
                <td width="25px" style="padding:5px;">
                  ลำดับ
                </td>
                <td>ขื่อประเภทเมนูอาหาร</td>
                <td width="50px">แก้ไข</td>
                <td>ลบ</td>
              </tr>
              </thead>
              
              <tbody>
              <?php  while ($r = mysql_fetch_assoc($rs)):?>
              <tr align="center">
                <td style="padding:3px;">
                  <?php echo $n++; ?>
                </td>
                <td><?=$r["foodtype_name"]?></td>
                <td>
                  <a href="home.php?url=type_food&foodtype_id=<?=$r["foodtype_id"]?>">
                      <img src="../ico/create.ico"/>
                  </a>
                </td>
                <td width="50px">
                  <a href="delete_type.php?foodtype_id=<?=$r["foodtype_id"]?>"
                    onclick="return confirm('ลบจิงน่ะ');">
                      <img src="../ico/close.ico"/>
                  </a>
                </td>
              </tr>
              </tbody>
            <?php endwhile ?>
            </table>
          <?php endif ?>
      </fieldset>
  </body>
</html>
<style type="text/css">
    .grid{
        border: #ccc 1px solid;
    }.grid thead tr td{
        background: lightseagreen;color: #fff;
    }
    .grid tbody tr td{
        border-right: #ccc 1px solid;
        border-bottom: #666 1px dashed;
    }
</style>
