<?php

ob_start();

require_once"../config/connect.php";

    $foodtype_id   = $_POST["foodtype_id"];
    $foodtype_name = $_POST["foodtype_name"];

        if($foodtype_name == ""){
        ?>
        <script type="text/javascript">
            alert('ท่านยังไม่กรอกข้อมูล');
            history.back();
        </script>
        <?php
    } else {

    if (empty($foodtype_id)) {

        $sql = "INSERT INTO foodtype (foodtype_name) values ('$foodtype_name')";
    } else {

        $sql = "UPDATE foodtype SET foodtype_name = '$foodtype_name'
                WHERE foodtype_id = '$foodtype_id'";
}

    if (mysql_query($sql)) {

    echo header("location:home.php?url=type_food");
    
    } else {

    echo mysql_error();
}
    }
?>
