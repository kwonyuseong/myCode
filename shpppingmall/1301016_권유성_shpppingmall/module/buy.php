<?php
require_once("../DBconn.php");
// 이 페이지에 필요한 정보

   //로그인 체크
  if(!isset($_SESSION['usernum'])){
    echo "<script>
            alert('로그인 후 이용해 주세요');
            history.go(-1);
          </script>";
  }

  //품절이라고!
  if($_GET['productcount'] <= 0){
    echo "<script>
            alert('품절 상품입니다.');
            history.go(-1);
          </script>";
  }else{


  //유저 정보 검색
  $sql = "SELECT usermoney FROM user WHERE usernum = $_SESSION[usernum]";
  $stmt = $pdo -> prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
  $stmt->execute();
  $rowCount = $stmt->rowCount();

  // usernum를 비교하여 돈이 있는지 비교 -> 추후 아이디 변경시 를 위한 처치
  if ($rowCount > 0){
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    //돈이 많으면 구매완료 -> 구매리스트 or 구매상품상세 페이지로 이동
    if($row['usermoney'] >= $_GET['productprice']){
      $calc = ($row['usermoney'] - $_GET['productprice']);

      // 유저 소지금 깍기
      $sql = "UPDATE user SET usermoney = {$calc}";
      $sql.= " WHERE usernum = $_SESSION[usernum]";
      $stmt = $pdo -> prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
      $stmt->execute();

      //상품 제고 깍기
      $clac_p_count = ($_GET['productcount']-1);
      $sql = "UPDATE product SET productcount = {$clac_p_count}";
      $sql.= " WHERE productnum = {$_GET['productnum']}";
      $stmt = $pdo -> prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
      $stmt->execute();

      //구매리스트에 추가
      $sql = "INSERT INTO buylist (productnum,usernum,productname,productexplain,productprice,productimgname)";
      $sql.= " VALUES ({$_GET['productnum']},{$_SESSION['usernum']},'{$_GET['productname']}',";
      $sql.= "'{$_GET['productexplain']}',{$_GET['productprice']},'{$_GET['productimgname']}')";
      $stmt = $pdo -> prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
      $result=$stmt->execute();

      //남은돈을 세션에 저장
      $_SESSION['usermoney'] = $calc;
      echo"<script>
              if(confirm('구매목록 페이지로 바로 이동 하시겟습니까?')){
                location.replace('../buylist.php');
              }else{
                history.go(-1);
              }

            </script>";


    //돈이 부족하면 구매 불가 상품상세 페이지로 복귀
    }else{
      echo "<script>
              alert('돈이 부족합니다');
              history.go(-1);
            </script>";
    }

  }else{
    echo "DB값이 출력되지 않았습니다.";
  }
}// 품절확인 의 끝
 ?>
