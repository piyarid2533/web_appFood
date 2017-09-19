<?php

    ob_start();

    require_once"../config/connect.php";

      $foodtype_id = $_GET["foodtype_id"];

      //sql
      $sql = "DELETE FROM foodtype WHERE foodtype_id = $foodtype_id";

        if(mysql_query($sql)){

            header("location:home.php?url=type_food");
        } else {
          echo mysql_error();
        }

 ?>
