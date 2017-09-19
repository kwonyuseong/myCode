<?php
  require_once("../DBconn.php");
  session_destroy();
  
echo "<script>
      history.go(-1);
    </script>";
 ?>
