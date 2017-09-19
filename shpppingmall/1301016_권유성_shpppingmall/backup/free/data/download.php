<?php session_start(); ?>
<?php
	if(!isset($_SESSION['user']['userID'])) {
		echo("
		<script>
	     window.alert('로그인 후 이용해 주세요.')
	     history.go(-1)
	   </script>
		");
		exit;
	}
    $real_name = $_GET['real_name'];
    $file_path = "./data/".$real_name;
    $file_type = $_GET['real_type'];
    $show_name = $_GET['show_name'];

    header("Pragma: public");
    header("Expires: 0");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"$show_name\"");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".filesize($file_path));

    ob_clean();
    flush();
    readfile($file_path);

?>
