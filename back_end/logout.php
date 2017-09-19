<?php

session_start();
unset($_SESSSION['psn_id']);
unset($_SESSION['psn_username']);

header("location:index.php");

?>
