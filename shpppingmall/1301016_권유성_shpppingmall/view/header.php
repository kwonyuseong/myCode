<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>머리</title>
  </head>
  <body>
    <?php

 if(!isset($_SESSION['usernum'])) {?>
<div id="horizen_bar">
  <div id = "headerNavContaina"align = "left" >
    <div id = "headerNav" >
      <li><a class ="menuLink" href="loginform.php">로그인</a></li>
      <li><a class ="menuLink" href="joinform.php">회원가입</a></li>
      <li><a class ="menuLink" href="freeboard.php">자유게시판</a></li>
      <li><a class ="menuLink" href="index.php">메인상품</a></li>
    </div>
  </div>
</div>

<?php }else
        {
 ?>
    <div id="horizen_bar">
     <div id = "headerNavContaina" align = "left" >
      <div id = "headerNav">
          <li><a class ="menuLink" href="./module/logout.php">로그아웃</a></li>
          <li><a class ="menuLink" href="freeboard.php">자유게시판</a></li>
          <li><a class ="menuLink" href="index.php">메인상품</a></li>
          <li><a class ="menuLink" href="buylist.php">주문내역</a></li>
          <li><a class ="menuLink" href="cartlist.php">장바구니</a></li>
          <li><a class ="menuLink" href="#"></a></li>

          <div align = "right">
            <li>닉네임 :<?=$_SESSION['usernick'] ?></li>
            <li>소지금 :<?=$_SESSION['usermoney'] ?></li>
          </div>
      <?php } ?>
      </div>

    </div>
  </div>
        <div id ="headerimg">
          <span style ="text-align:center;">
            <a href="./index.php"><img src="./img/TF2_TITLE.JPG"></a>
          </span>
        </div>

  </body>
</html>
