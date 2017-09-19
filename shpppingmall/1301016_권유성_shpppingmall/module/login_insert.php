<?php
  require_once("../DBconn.php");
  // 유저 정보 검색

  $sql ="SELECT * FROM user where userid ='{$_POST['input_userid']}'";
  $stmt = $pdo->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
  $stmt->execute();

  $row = $stmt->rowCount();
  // 1. 아이디가 일치하는지
  if($row > 0){

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($_POST['input_userpass'] == $row['userpass'] ){
            $_SESSION['usernum']    = $row['usernum'];
            $_SESSION['usernick']   = $row['usernick'];
            $_SESSION['usermoney']  = $row['usermoney'];


          $popup_usernick = $_SESSION['usernick'];

          echo "<script>
                alert('{$popup_usernick} 님 환영합니다');
                location.replace('../index.php');
                </script>";

        }else{
          echo "<script>
                  alert('비밀번호가 일치하지 않습니다.');
                  location.replace('../loginform.php');
                </script>";
        }
    }else{
      echo "<script>
              alert('아이디를 잘못 입력 하셨습니다.');
              location.replace('../loginform.php');
            </script>";
    }


 ?>
