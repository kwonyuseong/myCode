<?php
//세션 시작 + $pdo 값 받아오기
require_once("../DBconn.php");

//받아와서 사용할 정보

// $_POST['input_subject'];
// $_POST['input_content'];
// $_FILES['input_file'];
// $_SESSION['usernick'];
// $_SESSION['usernum'];

//파일 경로를 지정
$save_dir =("../upfiles/");

//파일을 저장할 디렉토리 및 파일명
$save_path = $save_dir . $_FILES["input_file"]["name"];
$filename = $_FILES["input_file"]["name"];
$filetype = $_FILES["input_file"]["type"];
$tmp  = $_FILES["input_file"]["tmp_name"];

//파일을 지정한 디렉토리에 저장
if(move_uploaded_file($tmp, $save_path))
{
  //파일 업로드에 성공하면 DB에 값을 저장

  $sql = "INSERT INTO freeboard (usernum,usernick,freesubject,freecontent,filename,filetype)";
  $sql.= " VALUES ($_SESSION[usernum],'{$_SESSION['usernick']}','{$_POST['input_subject']}',";
  $sql.= "'{$_POST['input_content']}','$filename','$filetype')";
  $stmt = $pdo->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
  $stmt->execute();

    echo "<script>
            alert('글을 성공적으로 저장했습니다.');
            location.replace('../freeboard.php');
          </script>";
}
else
{
   die("파일을 지정한 디렉토리에 저장하는데 실패했습니다.");
}


 ?>
