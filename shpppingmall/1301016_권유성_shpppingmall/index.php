<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>메인 페이지</title>
    <link rel="stylesheet" href="./css/master.css">
  </head>
  <body>
    <?php //DB연결
    require_once("./DBconn.php"); ?>
    <?php  //헤더
    require_once("./view/header.php"); ?>
    <?php //메인상품리스트?>
    <br>
    <div id="horizen_bar">
      메인상품
    </div>
    <div id="maincontainer">
        <div id = "content1">
        <?php
        // 표시하고 싶은 메인 상품의 개수 3개를 표시하는데 최적화 되어있기때문에
        //3의배수 의 상품을 배치할것! 끊어서
          // 메인 상품 테이블 작성 예정이라 계속
        $sql = "SELECT * FROM product WHERE productcategory ='TITAN'";
        $stmt = $pdo -> prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
        $stmt -> execute();

        $totalProduct = 5;

        for($count = 0; $count <= $totalProduct; $count++){
          $row = $stmt ->fetch(PDO::FETCH_ASSOC);
          if(!$count % 3 == 0){
            // 지금 하이퍼링크이기 때문에 다음 페이지는 require_once가 초기화된다
          ?>
        <div id="productBox">
            <a href="./product_detail.php?productnum=<?=$row['productnum']?>">
            <!-- 이미지 검색후 출력 -->
            <div id="productimgBox">
              <img width= "300" src ="./img/MainproductList/<?=$row['productimgname'];?>.png" alt="이미지를 못찾았어요 ㅜㅜㅜ">
            </div>
            <div id="productTextBox">
              <table>
                <tr>
                  <td id ="none"><?=$row['productname']."<br>" ?></td>
                <tr>
                  <td><?=$row['productcategory']."<br>" ?></td>
                </tr>
                <tr>
                  <td> <?=$row['productprice']."만원<br>" ?></td>
                </tr>
                <tr>
                  <td><?php if( $row['productcount'] <= 0){?>
                    <span id = "soldout">[품절]</span>
                    <?php } ?></td>
                </tr>
              </table>
            </div>
          </a>
        </div>
    <?php }else{ ?>
              <div id="productBox" style="clear:both;">
                <a href="./product_detail.php?productnum=<?=$row['productnum']?>">
              <!-- 이미지 검색후 출력 -->
              <div id="productimgBox">
                <img width= "300" src ="./img/MainproductList/<?=$row['productimgname'];?>.png" alt="이미지를 못찾았어요 ㅜㅜㅜ">
              </div>
              <div id="productTextBox">
                  <table>
                    <tr>
                      <td><?=$row['productname']."<br>" ?></td>
                    <tr>
                      <td><?=$row['productcategory']."<br>" ?></td>
                    </tr>
                    <tr>
                      <td> <?=$row['productprice']."만원<br>" ?></td>
                    </tr>
                    <tr>
                      <td><?php if( $row['productcount'] == 0){?>
                        <span id = "">[품절]</span>
                        <?php } ?></td>
                    </tr>
                  </table>
                </div>
              </a>
            </div>
    <?php }
        }  ?>
      </div>
    </div>
    <br>
    <?php //뿌터
    require_once("./view/footer.php");?>
  </body>
</html>
