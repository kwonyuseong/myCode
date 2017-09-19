<?php
   session_start();
?>
<meta charset="utf-8">
<?php
   if(!$_SESSION['user']['userID']) {
     echo("
	   <script>
	     window.alert('로그인 후 이용하세요.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }
   require_once "../lib/DBManager.php";       // dconn.php 파일을 불러옴
   $dbo = connect();
   try{
     $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
     $table = $_GET['table'];
     $num = $_GET['num'];
     $userid =  $_SESSION['user']['userID'];
     $username = $_SESSION['user']['username'];
     $usernick =  $_SESSION['user']['usernick'];
     $ripple_content = $_POST['ripple_content'];
     // 레코드 삽입 명령
     $sql = "insert into free_ripple (parent, id, name, nick, content, regist_day) ";
     $sql .= "values($num, '$userid', '$username', '$usernick', '$ripple_content', '$regist_day')";
     $stt = $dbo->prepare($sql,
       array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
     $stt->execute();
     //$result=$stt->fetch(PDO::FETCH_ASSOC);
    //  mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
    //  mysql_close();                // DB 연결 끊기
    $dbo = null;
     echo "
  	   <script>
  	    location.href = 'view.php?table=$table&num=$num';
  	   </script>
  	";
   }
   catch(PDOException $e){

   }

?>
