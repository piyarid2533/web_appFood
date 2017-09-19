<?php

    $host   = "127.0.0.1";
    $user   = "root";
    $pass   = "1234";
    $db     = "db_foodapp";

        $conn = mysql_connect($host, $user, $pass) or die("Cannot connect");

            if ($conn) {

                mysql_select_db($db);
                mysql_query("SET NAMES UTF8");
            } else {

                echo mysql_error();
        }
?>
