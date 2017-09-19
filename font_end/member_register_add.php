<?php

        ob_start();
        
        require_once '../config/connect.php';
        
        $member_id      = $_POST[member_id];
        
        $username       = $_POST[username];
        $password       = $_POST[password];
        $member_name    = $_POST[member_name];
        $member_sex     = $_POST[member_sex];
        $member_address = $_POST[member_address];
        $member_mobile  = $_POST[member_mobile];
        
        if(empty($member_id)) {
            $rs = mysql_query(
                    "SELECT username FROM member "
                    . "WHERE username = '$username'"
                    . "");
        } else {
            $rs = mysql_query(
                    "SELECT username FROM member "
                    . "WHERE username = '$username'"
                    . "AND member_id != '$member_id'"
                    . "");
}

if(!$rs) {
	echo mysql_error();
}

if(empty($member_id)) {
	$password = $_POST["password"];
} else {
	if(!empty($_POST["password_new"])) {
		$password_new = $_POST["password_new"];
	}
}


if(mysql_num_rows($rs) > 0) { ?>

        <script type="text/javascript">
            alert("username ซ้ำกัน");
            history.back();
        </script>

<?php } else { 

    if(empty($member_id)) {
            $sql = "INSERT INTO member("
                    . "username,"
                    . "password,"
                    . "member_name,"
                    . "member_sex,"
                    . "member_address,"
                    . "member_mobile"
                    . ""
                    . ")VALUES("
                    
                    . "'$username',"
                    . "'$password',"
                    . "'$member_name',"
                    . "'$member_sex',"
                    . "'$member_address',"
                    . "'$member_mobile'"
                    . ")";
    }else{
                
        // update data
		$sql = "UPDATE member SET
                        username = '$username',
                        password = '$password',
                        member_name = '$member_name',
                        member_sex = '$member_sex',
                        member_address = '$member_address',
                        member_mobile = '$member_mobile'"
                        . "";
                if(!empty($password_new)) {
			$sql .= ",password = '$password_new' ";
		}
                
                $sql .= "WHERE member_id = '$member_id'";
		
	} // end if check mem_id

} // end if mysql_num_row
if(mysql_query($sql)) {
	header("location: index.php?url=member_register_complete");
} else {
	echo mysql_error();
}

?>

                
        