<?php

ob_start();
session_start();

include '../config/connect.php';

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM member
                WHERE username = '$username'
                AND password = '$password'";

$rs = mysql_query($sql);

if (!$rs) {
    echo mysql_error();
}

if (mysql_num_rows($rs) > 0) {
    // Login pass
    $r = mysql_fetch_array($rs);


    $_SESSION["mem_id"] = $r['member_id'];
    $_SESSION["mem_name"] = $r["member_name"];

    header("location: index.php");
} else {
    // Login Fail.
    ?>

    <script type="text/javascript">
        alert("username or password invalid!!!");
        history.back();
    </script>

    <?php

}
?>