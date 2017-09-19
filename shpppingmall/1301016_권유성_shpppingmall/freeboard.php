<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>자유 게시판</title>
    <link rel="stylesheet" href="./css/master.css">
    <link rel="stylesheet" href="./css/list.css">
<!--    <link rel="stylesheet" href="./css/list.css">-->
  </head>
  <body>
    <?php //DB연결
    require_once("./DBconn.php");?>
    <?php  //헤더
    require_once("./view/header.php");?>
<br>
<?php
//유저의 freeboard 구하기
$sql = "SELECT * FROM freeboard";
$stmt = $pdo ->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
$stmt -> execute();

$rowCount =$stmt-> rowCount();

?>
<div id="horizen_bar">
    <table id="list_menubar">
      <tr>
        <td class ="b_m_name">번호</td>
        <td class ="b_m_ex">게시글이름</td>
        <td class ="b_m_name">작성자</td>
      </tr>
    </table>
</div>
<?php
$count = 1;
if($rowCount > 0){

   ?>
    <div id="content1">
      <table id="list_content">
<?php
  $count = 1;
  while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){

    // 위에서구한 목록으로 검색
  ?>
    <tr>
      <td class ="b_m_name">
        <a href="freeboard_detail.php?freenum=<?=$row['freenum']?>">
          <?=$count ?>
        </a>
      </td>
      <td class ="b_m_ex">
        <a href="freeboard_detail.php?freenum=<?=$row['freenum']?>">
          <?=$row['freesubject'] ?>
        </a>
      </td>
      <td class ="b_m_name">
        <a href="freeboard_detail.php?freenum=<?=$row['freenum']?>">
          <?=$row['usernick'] ?>
        </a>
      </td>
    </tr>

  <?php
  $count++;
 }
  ?>
      </table>
    </div>

<?php
}else{
  ?>
<div id="content1">
  <table id="list_content">
    <tr>
      <td class ="b_m_name"><?=$count ?></td>
      <td class ="b_m_ex"> 작성된 게시글이 없어양  ㅎㅎㅎㅎ</td>
      <td class ="b_m_name">default nikc</td>
    </tr>
  </table>
</div>
<?php
  $count++;
  }
?>
<form action="./insertboardform.php" method="post">
  <input type="image" src="./img/write.png" name="" value="글쓰기">
</form>
<br>
    <?php //뿌터
    require_once("./view/footer.php");?>
  </body>
</html>
