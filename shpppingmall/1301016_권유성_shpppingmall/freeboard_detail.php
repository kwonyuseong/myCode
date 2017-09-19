<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>게시판 상세</title>
    <link rel="stylesheet" href="./css/master.css">
    <link rel="stylesheet" href="./css/list.css">
  </head>
  <body>
    <?php
    //DB연결
    require_once("./DBconn.php");
    //로그인 체크

    ?>
    <?php  //헤더
    require_once("./view/header.php");?>
    <?php //장바구니목록 표시

  //쓴글 내용 구하기
  $sql = "SELECT * FROM freeboard WHERE freenum = {$_GET['freenum']}";
  $stmt = $pdo ->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
  $stmt -> execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  ?>
  <br>
  <div id="horizen_bar">
    <?=$row['freesubject'] ?>
  </div>

    <div id="content1">
      <table>
        <tr>
          <td>게시글 번호</td> <td><?=$_GET['freenum'] ?></td>
          <td>작성자</td> <td><?= $row['usernick'] ?></td>
          <td>파일</td> <td><img src="./upfiles/<?=$row['filename'] ?> " alt="이미지가 없습니다.">
             업로드한 이미지
          </td>
        </tr>
        <tr>
          <td>내용</td><td><?=$row['freecontent'] ?></td>
        </tr>
        <tr>

        </tr>
      </table>
      <form action="./module/download.php" method="post" enctype="multipart/form-data">
        <!-- <input type="hidden" name="DLF_freenum" value="<?php // $_GET['freenum'] ?>"> -->
        <input type="hidden" name="DLF_name" value="<?= $row['filename'] ?>">
        <!-- <input type="hidden" name="DLF_type" value="<?php //$row['filetype'] ?>"> -->
        <!-- <input type="hidden" name="show_DLF_name" value="<?=$row['freesubject'] ?> 의 이미지파일"> -->
        <input type="submit"  value="파일 다운로드">
      </form>
    </div>
  <br>
     <?php //뿌터
    require_once("./view/footer.php");?>
  </body>
</html>
