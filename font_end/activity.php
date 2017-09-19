<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            .gid{border: #61e5ab 1.5px solid;}
            .gid tbody tr td{padding: 10px;}
            .a_h{background:lightseagreen;padding: 10px;}
            .a_l{border-right: #61e5ab 1px solid;padding: 5px;}
            .error{border: #FF0000 1px solid;background:palegoldenrod;color: #FF0000;}
        </style>
    </head>
    <body>
        <?php
        if (!empty($_POST["key_word"])) {
            $keyword = $_POST["key_word"];
        } else {
            $keyword = $_GET["key_word"];
        }
        ?>
        <div style="margin-top: 30px">
            <form action="index.php?url=activity" method="post">
                <table align="center" width="90%" class="gid" cellpadding="3px">
             <thead>
            <tr>
                <td colspan="2" class="a_h">
                    <div style="margin-left: 15px;font-size: 14px;color:#fff;">
                        ความต้องพลังต่อการทำกิจกรรม
                    </div>
                </td>
            </tr>
            </thead>
            
            <tbody>
            <tr align="center">
                <td class="a_l">ประเภทกิจกรรม</td>
                <td> 
                    <img src="../ico/view.ico"/>
                    <input type="text"  size="50" name="key_word" value="<?=$keyword?>"/>
                    <input type="submit"name="search_button" value="ค้นหา"/>
                </td>
            </tr>
            </tbody>
            </table>
            </form>
            <?php
            require_once '../config/connect.php';

            if (!empty($_POST["search_button"]) || !empty($_GET["key_word"])) {
                if (!empty($_POST["key_word"])) {
                    $keyword = $_POST["key_word"];
                } else {
                    $keyword = $_GET["key_word"];
                }

                $sql = "SELECT * FROM activity WHERE (activity_name LIKE '%$keyword%'OR detail LIKE '%$keyword%')";

                $rs = mysql_query($sql);

                $n = 1;
                $err = "ไม่มีข้อมูลที่ท่านค้นหา..............Invalid..!!!";

                if (!$rs) {
                    echo mysql_error();
                }

                if (mysql_num_rows($rs) == 0) {

                    ?>
                    <div class="error" style="margin: 20px;padding: 10px;">
                        <?php echo "<strong>".$err."</strong>"; ?>
                    </div>
                 <?php
                } else {
                    ?>
                </div>
                
    </div>
<br/>
   <!----------------- view data-values---------------->
   <table align="center"  width="90%" class="gid" cellpadding="3px">
       <thead>
           <tr style="background: lightseagreen;color:#fff;">
                <td width="50px" class="a_l">
                    ลำดับที่
                </td>
                <td class="a_l">ประเภทกิจกรรม</td>
                <td width="80px" align="center">(Kcal)</td>
            </tr>
            </thead>
            
            <tbody>
            <?php while ($r = mysql_fetch_array($rs)):?>
            <tr>
                <td align="center" class="a_l" style="border-bottom: #ccc 1px solid;">
                    <?php echo $n++;?>
                </td>
                <td class="a_l"  style="border-bottom: #ccc 1px solid;">
                    <?=$r[activity_name]?>
                </td>
                <td align="center"  style="border-bottom: #ccc 1px solid;background:#ccffff;">
                     <?=$r[energy]?>
                </td>
            </tr>
            </tbody>
            <?php endwhile;?>
         </table>
           <?php
       }
   }
   ?><br/><!-- values -->
   
   
   
  <!-- empty -->
  <?php if(empty($_POST["search_button"]) && empty($_GET["key_word"])) : ?>
   <?php 
 
   require_once '../config/connect.php';
   
        $sql = "SELECT * FROM activity";
        
            $rs = mysql_query($sql);
            
                $n = 1;
            if(!$rs){
                echo mysql_error();
            }
   ?>
   <table align="center"  width="90%" class="gid" cellpadding="3px">
       <thead>
           <tr style="background:lightseagreen;color: #fff;">
                <td width="50px" class="a_l">
                    ลำดับที่
                </td>
                <td class="a_l">ประเภทกิจกรรม</td>
                <td width="80px" align="center">(Kcal)</td>
            </tr>
            </thead>
            
            <tbody>
            <?php while ($r = mysql_fetch_array($rs)):?>
            <tr>
                <td align="center" class="a_l" style="border-bottom: #ccc 1px solid;">
                    <?php echo $n++;?>
                </td>
                <td class="a_l" style="border-bottom: #ccc 1px solid;">
                    <?=$r[activity_name]?>
                </td>
                <td align="center" 
                    style="border-bottom: #ccc 1px solid;background:#ccffff;">
                    <?=$r[energy]?>
                </td>
            </tr>
            </tbody>
            <?php endwhile;?>
            
         </table>
  <?php endif;?>
  </body>
</html>
