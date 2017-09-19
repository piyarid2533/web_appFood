<html>
<body onload="window.print()">
<?php
     echo file_get_contents($_GET['file'].'.php');
?>
</body>
</html>