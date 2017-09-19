<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>로그인 페이지</title>
    <link rel="stylesheet" href="./css/master.css">
  </head>
  <body>
    <?php //DB연결
    require_once("./DBconn.php");?>
    <?php  //헤더
    require_once("./view/header.php");?>
    <?php //로그인

    ?>
    <br>
    <div id="horizen_bar">
      로그인
    </div>

    <div id="content1">
      <form  action="./module/login_insert.php" method="post">
          <table>
            <tr>
              <td>아이디 입력</td>
              <td><input type="text" name="input_userid"></td>
            </tr>

            <tr>
              <td>비밀번호 입력</td>
              <td><input type="password" name="input_userpass"></td>
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
