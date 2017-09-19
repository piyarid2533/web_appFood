<!DOCTYPE html>
<html >
    <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css_formLogin/style.css">
    </head>

    <body>
      <form action="check_login.php" method="post" 
       name="formlogin"onsubmit="return validateForm()">
        <div class="login">
            <h2>Admin Login</h2>
            <fieldset>
                <input type="text"  placeholder="username" />
                <input type="password" placeholder="Password" />
            </fieldset>
            <input type="submit" value="Log In" />
            <div class="utilities">
                <label>By piyarid</label>
            </div>
        </div>
        </form>
    </body>
</html>
