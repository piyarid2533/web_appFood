<?php
session_start();
header('Cache-Control: max-age=900');
if(!isset($_SESSION["username"])){
  header("location:index.php");
}
?>
<!doctype html>
  <html>
    <head>
      <title><?php require'title.php';?></title>
      <link rel="stylesheet" type="text/css" href="../css/admin.css">
      <script src="../js/js_admin.js"></script>
      <meta charset="utf-8"/>
    </head>
    <body style="background: #ccc">
      <div style="width:100%">
      <table  width="90%" aligin="center" class="bt">
        <tr>
            <td colspan="2" class="header">
                <font color="#FFFFE0" style="margin-left: 15px;">
                <img src="../ico/boss.ico">
                    <?php require'title.php';?>
              </font>
              
              
              <div align="right" style="font-size: 13px;margin-right: 15px;">
                  <font color="#fff"/>ยินดีต้อนรับ:</font> 
                  <font color="yellow"/>คุณ: 
                      <?php echo $_SESSION["psn_name"]; ?>
                  <font color="#fff"/>
            </div>
          </td>
        </tr>
        
        <tr>
            
          <td width="300px" class="left" valign="top">
            <?php require_once"menu_left.php";?>
          </td>
          
          <td align="center" valign="top" class="conten">
            <?php

                if(!empty($_GET["url"])){

                  $url = $_GET["url"];

                  $file = $url. ".php";

                  include_once $file;
                  
                } else {
                  echo "<br/><br/><br/><br/><h3>"
                    .   "ยินดีต้อนรับสู่ ระบบจัดการข้อมูลอาหารเพื่อสุขภาพ</h3>";
                  ?>
              <br/><br/><img src="../pic/1185341442.jpg" width="200px" height="200px"/>
                  <?php
                }
             ?>

          </td>
        </tr>
        
        
        
        <tr align="center">
            <td colspan="2">
                <div id="footer">
                    @Piyarid.dev Develpoer PHP, MySQL and Apache Server
                    <img src="../ico/linux.ico"/>
                    <div style="margin-left: 10px;">
                    <?php
                    $date = date("Y-m-d");
                    $time = date("H:i:s");

                    echo $date." / ".$time;
                    ?>
                    </div>
                </div>
            </td>
        </tr>
      </table>
   </div>
 </body>
</html>
