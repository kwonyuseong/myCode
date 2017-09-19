<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>로그인 페이지</title>
    <link rel="stylesheet" href="./css/master.css">
    <script>

    function check_id()
    {
      window.open(
         "./module/member/check_id.php?userid=" + document.join.userid.value,
         "IDcheck",
         "left=400,top=400,width=200,height=100,scrollbars=no,resizable=yes"
       );
    }

    function check_nick()
    {
      window.open(
         "./module/member/check_nick.php?usernick=" + document.join.usernick.value,
         "NICKcheck",
         "left=400,top=400,width=200,height=60,scrollbars=no,resizable=yes"
       );
    }

    function check_input()
    {
       if (!document.join.userid.value)
       {
           alert("아이디를 입력하세요");
           document.join.userid.focus();
           return;
       }

       if (!document.join.usernick.value)
       {
           alert("닉네임을 입력하세요");
           document.join.usernick.focus();
           return;
       }

       if (!document.join.userpass.value)
       {
           alert("비밀번호를 입력하세요");
           document.join.userpass.focus();
           return;
       }

       if (!document.join.userpass_confirm.value)
       {
           alert("비밀번호 확인을 입력하세요");
           document.join.userpass_confirm.focus();
           return;
       }

       if (!document.join.usermoney.value)
       {
           alert("초기 자본(소지금)을 입력해 주세요");
           document.join.userpass_confirm.focus();
           return;
       }

       if (document.join.userpass.value !=
             document.join.userpass_confirm.value)
       {
           alert("비밀번호가 일치하지 않습니다.\n 다시 입력해 주세요 ㅎ");
           document.join.userpass.focus();
           document.join.userpass.select();
           return;
       }

       document.join.submit();
    }

    </script>
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
      회원가입
    </div>

    <div id="content1">
      <form name="join" action="./module/join_insert.php" method="post">
          <table>
            <tr>
              <td>아이디 입력</td>
              <td><input type="text" name="userid"></td>
              <td>
                <a href="#">
                  <img src="./img/login/check_id.gif" onclick="check_id()">
                </a>
              </td>
            </tr>

            <tr>
              <td>닉네임</td>
              <td><input type="text" name="usernick"></td>
              <td>
                  <a href="#">
                    <img src="./img/login/check_id.gif" onclick="check_nick()">
                  </a>
              </td>
            </tr>

            <tr>
              <td>비밀번호 입력</td>
              <td><input type="password" name="userpass"></td>
            </tr>

            <tr>
              <td>비밀번호 확인입력</td>
              <td><input type="password" name="userpass_confirm"></td>
            </tr>

            <tr>
              <td>초기자본(소지금) 입력</td>
              <td><input type="text" name="usermoney"></td>
            </tr>
          </table>

          <a href="#">
            <img src="./img/login/button_save.gif"  onclick="check_input()">
          </a>
      </form>
    </div>
<br>

    <?php //뿌터
    require_once("./view/footer.php");?>
  </body>
</html>
