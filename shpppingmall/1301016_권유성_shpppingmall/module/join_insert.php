<?php
  require_once("../DBconn.php");

          $sql ="INSERT INTO user (userid,usernick,userpass,usermoney)";
          $sql.=" VALUES ('{$_POST['userid']}','{$_POST['usernick']}',";
          $sql.="'{$_POST['userpass']}',{$_POST['usermoney']})";
          $stmt = $pdo->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
          $stmt->execute();

          echo "<script>
                  alert('회원가입이 완료 되었습니다.');
                </script>";
          Header("Location:../index.php");

 ?>
