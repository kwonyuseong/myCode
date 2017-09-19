<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php
   if(empty($_GET['usernick']))
   {
      echo("닉네임을 입력하세요.");
   }
   else
   {
      require_once("../../DBconn.php");

      try {
        $sql = "SELECT * FROM user WHERE usernick=:usernick;";
        $stmt = $pdo->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
        $stmt->execute(array(':usernick'=>$_GET['usernick']));

        // 몇줄인지 출력해주는 함수
        $result = $stmt->rowCount();

        if($result == 1)
        {
          ?>
          <div id="check_ncikbox">
            닉네임이 중복됩니다 다른 닉네임을 입력해 주세요
          </div>

         <?php
        }
        else
        {
           echo "사용 가능한 닉네임 입니다.";
        }

      //  mysql_close();
      $pdo = NULL;
      } catch (Exception $e) {
        exit("에러발생{$e->getMassage}");
      }

   }
?>
  </body>
</html>
