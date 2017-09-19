<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>게시글 작성 페이지</title>
    <link rel="stylesheet" href="./css/master.css">
  </head>
  <body>
    <?php //DB연결
    require_once("./DBconn.php");
    //로그인 체크
    if(!isset($_SESSION['usernum'])){
      echo "<script>
              alert('글쓰기는 로그인 후 이용가능합니다.');
              history.go(-1);
            </script>";
    }

    ?>
    <?php  //헤더
    require_once("./view/header.php");?>
    <?php //로그인

    ?>
    <br>
    <div id="horizen_bar">
      글쓰기
    </div>

    <div id="content1">
      <form  action="./module/insertboard.php" method="post" enctype="multipart/form-data">
          <table>
            <tr>
              <td>제목</td>
              <td><input type="text" name="input_subject"></td>
            </tr>

            <tr>
              <td>내용</td>
              <td><textarea name="input_content" rows="8" cols="80"></textarea></td>
            </tr>

            <tr>
              <td>파일 업로드 </td>
              <td><input type="file" name="input_file"></td>
            </tr>
          </table>
        <input type="submit" name="login_submit">
      </form>
    </div>
<br>

    <?php //뿌터
    require_once("./view/footer.php");?>
  </body>
</html>
