<?php

    require_once ("../DBconn.php");
    $real_name = $_POST['DLF_name'];
    $file_path = "../upfiles/".$real_name;


    header("Pragma: public");
    header("Expires: 0");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"$real_name\"");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".filesize($file_path));

    ob_clean();           // 출력 버퍼의 모든내용을 버림.
    flush();              // 출력 버퍼를 전송하고 출력 버퍼링을 종료합
    readfile($file_path); // readfile 파일을 읽고 출력버퍼에 작성



?>
