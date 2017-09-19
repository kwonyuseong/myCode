<?php
      require_once "../lib/DBManager.php";
      $table = $_GET['table'];
      $num = $_GET['num'];
      try{
        $ripple_num =  $_GET['ripple_num'];
        $dbo = connect();
        $sql = "delete from free_ripple where num=$ripple_num";
        $stt = $dbo->prepare($sql,
          array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
        $stt->execute();
        //$result=$stt->fetch(PDO::FETCH_ASSOC);
        // mysql_query($sql, $connect);
        // mysql_close();

      $dbo=null;
      }
      catch(PDOException $e){

      }
      echo "<script>
       location.href = 'view.php?table=$table&num=$num';
      </script>";
?>
