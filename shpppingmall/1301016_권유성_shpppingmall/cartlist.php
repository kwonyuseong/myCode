<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>구매 목록</title>
    <link rel="stylesheet" href="./css/master.css">
    <link rel="stylesheet" href="./css/list.css">
  </head>
  <body>
    <?php
    //DB연결
    require_once("./DBconn.php");
    //로그인 체크
   if(!isset($_SESSION['usernum'])){
     echo "<script>
             alert('로그인 후 이용해 주세요');
             history.go(-1);
           </script>";
   }
    ?>
    <?php  //헤더
    require_once("./view/header.php");?>
    <?php //구매 목록

      //유저의 buylist 구하기
    $sql = "SELECT * FROM cartlist WHERE usernum = {$_SESSION['usernum']}";
    $stmt = $pdo ->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
    $stmt -> execute();

    $rowCount =$stmt-> rowCount();

    ?>
    <br>
    <div id="horizen_bar">
        <table id="list_menubar">
          <tr>
            <td class ="b_m_name">상품이름</td>
            <td class ="b_m_ex">상품설명</td>
            <td class ="b_m_name">상품가격</td>
          </tr>
        </table>
    </div>
    <?php
    if($rowCount > 0){

       ?>
        <div id="content1">
          <table id="list_content">
  <?php
      while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
        // 위에서구한 목록으로 검색
        $sql_p = "SELECT * FROM product WHERE productnum = {$row['productnum']}";
        $stmt_p = $pdo ->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
        $stmt_p -> execute();
      ?>
        <tr>
          <td class ="b_m_name">
            <a href="product_detail.php?productnum=<?=$row['productnum']?>">
              <?=$row['productname'] ?>
            </a>
        </td>
          <td class ="b_m_ex"><?=$row['productexplain'] ?></td>
          <td class ="b_m_name"><?=$row['productprice']  ?></td>
        </tr>

      <?php }
      ?>
          </table>
        </div>

    <?php
    }else{
      ?>
    <div id="content1">
      <table id="list_content">
        <tr>
          <td class ="b_m_name">없어 없다고! </td>
          <td class ="b_m_ex">상품정보가 없음니다</td>
          <td class ="b_m_name">시무룩</td>
        </tr>
      </table>
    </div>
    <?php
      }
    ?>
    <br>
    <?php //뿌터
    require_once("./view/footer.php");?>
  </body>
</html>
