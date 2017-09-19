<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>제품상세</title>
    <link rel="stylesheet" href="./css/master.css">
    <link rel="stylesheet" href="./css/product_detail.css">
  </head>
  <body>
    <?php //DB연결
    require_once("./DBconn.php");?>
    <?php  //헤더
    require_once("./view/header.php");?>
    <?php //제품상세

    ?>
    <!-- ------------------------------- 페이지 전체 div ------------------------------ -->

    <div id="wrap">

    <!-- ------------------------------- 상세설명 전체 div ------------------------------ -->
        <?php
        /*
        |--------------------------------------------------
        |      상품 정보 표시
        |--------------------------------------------------
        */
        ?>
        <br>
          <div id = "horizen_bar">
            상품정보
          </div>
          <?php
          /*
          |--------------------------------------------------
          |      내용을 표시한는 곳 좌 , 우 로 구분됨
          |--------------------------------------------------
          */
          ?>
                      <?php
                      /*
                      |--------------------------------------------------
                      |      왼쪽 상품 이미지  표시
                      |--------------------------------------------------
                      */
                      ?>
                  <div id = "content">
                      <br>
                    <div id = "content_left">

                      <?php
                      if(isset($_GET['productnum'])){
                        $sql = "SELECT * FROM product WHERE productnum = {$_GET['productnum']}";
                        $stmt = $pdo -> prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      ?>

                      <div class="imgeffect">
                        <img  src="./img/MainproductList/<?=$row['productimgname'];?>.png" alt="시발">
                      </div>

                      <?php
                      }else {
                        echo"제품번호를 GET 방식으로 받아오지 못했습니다.";
                      }
                      ?>
                    </div>
                    <?php
                      /*
                      |--------------------------------------------------
                      |    오른쪽  상품 상세 정보
                      |--------------------------------------------------
                      */
                      ?>
                      <div  id = "content_right">
                <?php
                   echo "  <table >
                              <tr>
                                  <td id ='td_title'>상품 이름</td> <td>{$row['productname']}</td>
                              </tr>
                              <tr>
                                  <td id ='td_title'>가격</td> <td>{$row['productprice']}만원</td>
                              </tr>
                              <tr>
                                  <td id ='td_title'>카테고리</td> <td>{$row['productcategory']}</td>
                              </tr>
                              <tr>
                                  <td id ='td_title'>판매자</td> <td>{$row['productseller']}</td>
                              </tr>
                              <tr>
                                  <td id ='td_title'>재고 수량</td> <td>{$row['productcount']}</td>
                              </tr>
                          </table>";

                      ?>
                      <div id="button">
                        <form action="./module/insertcartlist.php" method="get">
                           <input type="image" src="./img/cartbtn.png">
                        <!--  <input type="hidden" name="productnum" value="<?php// echo $_GET['productnum'] ?>">
                          <input type="hidden" name="productname" value="<?php// echo $row['productname'] ?>">
                          <input type="hidden" name="productprice" value="<?php// echo $row['productprice'] ?>">
                          <input type="hidden" name="productexplain" value="<?php// echo $row['productexplain'] ?>"> -->
                        </form>
                        <form class="" action="./module/buy.php" method="get">
                          <input type="hidden" name="productnum" value="<?php echo $_GET['productnum'] ?>">
                          <input type="hidden" name="productcount" value="<?php echo $row['productcount'] ?>">
                          <input type="hidden" name="productname" value="<?php echo $row['productname'] ?>">
                          <input type="hidden" name="productexplain" value="<?php echo $row['productexplain'] ?>">
                          <input type="hidden" name="productprice" value="<?php  echo $row['productprice'] ?>">
                          <input type="hidden" name="productimgname" value="<?php echo $row['productimgname'] ?>">

                          <input type="image" src="./img/buybtn.png">
                        </form>
                      </div>
                    </div>
                  </div><!--contents 의 끝 -->

                  <br>
              <!-- 상품설명 제목 바 -->
              <div id = "horizen_bar">
                  상품설명
              </div>

              <div id = "explain">
                  <?php
                      echo $row['productexplain']."<br>";
                  ?>
              </div>

              <br>
          </div>  <!--END of wrap -->
    <?php //뿌터
    require_once("./view/footer.php");?>
  </body>
</html>
