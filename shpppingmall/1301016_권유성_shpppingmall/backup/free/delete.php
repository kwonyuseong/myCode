<?php
   session_start();
   require_once "../lib/DBManager.php";
   $table = $_GET['table'];
   $num = $_GET['num'];

   try{
     $dbo = connect();
    //  $result = mysql_query($sql, $connect);
     //
    //  $row = mysql_fetch_array($result);
    $sql = "select * from $table where num = $num";
     $stt = $dbo->prepare($sql,
       array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
     $stt->execute();
     $row=$stt->fetch(PDO::FETCH_ASSOC);
     $copied_name[0] = $row['file_copied_0'];
     $copied_name[1] = $row['file_copied_1'];
     $copied_name[2] = $row['file_copied_2'];

     for ($i=0; $i<3; $i++)
     {
  		if ($copied_name[$i])
  	   {
  			$image_name = "./data/".$copied_name[$i];
  			unlink($image_name);
  	   }
     }

     $sql = "delete from $table where num = $num";
     $stt = $dbo->prepare($sql,
       array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
     $stt->execute();
     $dbo=null;
   }
   catch(PDOException $e){

   }


   echo "
	   <script>
	    location.href = 'list.php?table=$table';
	   </script>
	";
?>
