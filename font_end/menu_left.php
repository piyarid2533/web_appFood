<?php

    session_start();
    require_once '../config/connect.php';
    
    $rs = mysql_query("SELECT * FROM foodtype");

        if (!$rs) {
            
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
        <style type="text/css">
            ul.f_v_d {
                list-style-image: url(../ico/notes.ico);
            }
        </style>
        <div class="f_panel" style="margin-top: 0px;">
            <div class="f_panel_header">
                <b>Menu</b>
            </div>

        <div class="f_panel_body">
            <br />
            <?php while ($r = mysql_fetch_array($rs)): ?>

                <ul class="f_v_d">
                    <li>
                        <a href="index.php?url=show_food_type&foodtype_id=<?php echo $r['foodtype_id']; ?>&foodtype_name=<?php echo $r['foodtype_name']; ?>"><?php echo $r["foodtype_name"]; ?>
                        </a>
                    </li>
                </ul>

            <?php endwhile ?>
            <br />
        </div>
        </div><br/>
        
        
        <!-- end member -->
        <div class="f_panel">
            <div class="f_panel_header">
                <b> Member Login</b>
            </div>

            <div class="f_panel_body">
                <div style="margin-left: 10px;padding: 5px;">
                    <?php if (isset($_SESSION["mem_id"])) { ?>
                        <div>ยินดีต้อนรับ</div>
                        <div>คุณ : <?php echo $_SESSION["mem_name"]; ?></div>
                        <div>
                            <a href="index.php?url=member_register">แก้ไขข้อมูล</a>
                        </div>
                        <div>
                            <center>
                                <a onclick="return confirm('Are you sure ?');" 
                                   href="logout.php">ออกจากระบบ</a>
                            </center>
                        </div>

                    <?php } else { ?>
                        <form action="check_login.php" method="post">
                        <table width="250px" style="color: #666;"cellpadding="3px">
                            <tr>
                                <td>Username</td>
                                <td>
                                    <input type="text" name="username"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>
                                    <input type="password" name="password"/>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <img src="../ico/lock.ico"/>
                                </td>
                                <td>
                                    <input type="submit" value="Login"/>
                                    <input type="reset" value="Reset"/>
                                    <br/>
                                    <a href="index.php?url=member_register">
                                        <strong>Register</strong>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php }?>
                </div>
            </div>
    </body>
</html>
