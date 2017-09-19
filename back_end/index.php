<!DOCTYPE   html>
<html>
  <head>
      <title>ระบบจัดการข้อมูลอาหารเพื่อสุขภาพ</title>
       <script src="../js/js_admin.js"></script>
       <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <link rel="stylesheet" href="css_formLogin/style.css">
      <meta charset="utf-8"/>
  </head>
  <body style="margin: 0px;">
    <!--************************** nav_b ******************************-->
      <div class="nav_b">
        <div style="margin-left: 25px;">
            <img src="../ico/modify.ico"/> ระบบจัดการข้อมูลอาหารเพื่อสุขภาพ
           <b><font color="#fff">Health Information Management</font></b>
        </div> 
      </div>
 <!--************************** End nav_b ******************************-->

 <form action="check_login.php" method="post" 
       name="formlogin"onsubmit="return validateForm()">
        <div class="login">
            <h2>Admin Login</h2>
            <fieldset>
                <input type="text"  placeholder="username" name="username" />
                <input type="password" placeholder="password"  name="password"/>
            </fieldset>
            <input type="submit" value="Log In" />
            <div class="utilities">
                <label>พัฒนาโดย Piyarid.</label>
            </div>
        </div>
   </form>
</body>
<html>
