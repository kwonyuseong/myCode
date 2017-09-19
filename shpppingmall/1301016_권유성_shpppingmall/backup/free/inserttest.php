<?php session_start(); ?>

<meta charset="utf-8">
<?php
	if(!$_SESSION['user']['userID']) {
		echo("
		<script>
	     window.alert('로그인 후 이용해 주세요.')
	     history.go(-1)
	   </script>
		");
		exit;
	}

	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

	// 다중 파일 업로드
	$files = $_FILES["upfile"];
	$count = count($files["name"]);
	$upload_dir = './data/';
	$copied_file_name=array();
	$copied_file_name[0] = isset($copied_file_name[0]) ? $copied_file_name[0] : "";
	$copied_file_name[1] = isset($copied_file_name[1]) ? $copied_file_name[1] : "";
	$copied_file_name[2] = isset($copied_file_name[2]) ? $copied_file_name[2] : "";
	for ($i=0; $i<$count; $i++)
	{
		$upfile_name[$i]     = $files["name"][$i];
		$upfile_tmp_name[$i] = $files["tmp_name"][$i];
		$upfile_type[$i]     = $files["type"][$i];
		$upfile_size[$i]     = $files["size"][$i];
		$upfile_error[$i]    = $files["error"][$i];

		$file = explode(".", $upfile_name[$i]);
		$file_name = isset($file[0]) ? $file[0] : "";
		$file_ext  = isset($file[1]) ? $file[1] : "";

		if (!$upfile_error[$i])
		{
			$new_file_name = date("Y_m_d_H_i_s");
			$new_file_name = $new_file_name."_".$i;
			$copied_file_name[$i] = $new_file_name.".".$file_ext;
			$uploaded_file[$i] = $upload_dir.$copied_file_name[$i];

			if( $upfile_size[$i]  > 500000 ) {
				echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(500KB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
				</script>
				");
				exit;
			}

			if ( ($upfile_type[$i] != "image/gif") &&
				($upfile_type[$i] != "image/jpeg") &&
				($upfile_type[$i] != "image/pjpeg") )
			{
				echo("
					<script>
						alert('JPG와 GIF 이미지 파일만 업로드 가능합니다!');
						history.go(-1)
					</script>
					");
				exit;
			}

			if (!move_uploaded_file($upfile_tmp_name[$i], $uploaded_file[$i]) )
			{
				echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
				exit;
			}
		}
	}
	require_once "../lib/DBManager.php";       // dconn.php 파일을 불러옴
	try{
		$dbo = connect();
		$mode = $_POST['mode'];
		if ($mode=="modify")
		{
			$num_checked = count($_POST['del_file']);
			$position = $_POST['del_file'];

			for($i=0; $i<$num_checked; $i++)                      // delete checked item
			{
				$index = $position[$i];
				$del_ok[$index] = "y";
			}
			$sql = "select * from $table where num=$num";   // get target record
			//$row = mysql_fetch_array($result);
			$stt = $dbo->prepare($sql,
				array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
			$result = $stt->execute();

			for ($i=0; $i<$count; $i++)					// update DB with the value of file input box
			{

				$field_org_name = "file_name_".$i;
				$field_real_name = "file_copied_".$i;

				$org_name_value = $upfile_name[$i];
				$org_real_value = $copied_file_name[$i];
				if ($del_ok[$i] == "y")
				{
					$delete_field = "file_copied_".$i;
					$delete_name = $row[$delete_field];
					$delete_path = "./data/".$delete_name;

					unlink($delete_path);

					$sql = "update $table set $field_org_name = '$org_name_value', $field_real_name = '$org_real_value'  where num=$num";
					//mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
					$stt = $dbo->prepare($sql,
						array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
					$stt->execute();
				}
				else
				{
					if (!$upfile_error[$i])
					{
						$sql = "update $table set $field_org_name = '$org_name_value', $field_real_name = '$org_real_value'  where num=$num";
						//mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
						$stt = $dbo->prepare($sql,
							array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
						$stt->execute();
					}
				}
			}
			$sql = "update $table set subject='$subject', content='$content' where num=$num";
			//mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
			$stt = $dbo->prepare($sql,
				array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
			$stt->execute();
		}
		else
		{
			$table = $_GET['table'];
			$userid = $_SESSION['user']['userid'];
			$usernick = $_SESSION['user']['usernick'];
			$username = $_SESSION['user']['username'];
			$subject = $_POST['subject'];
			$content = $_POST['content'];
			$file_name = isset($file[0]) ? $file[0] : "";
			$file_ext  = isset($file[1]) ? $file[1] : "";


			$sql = "insert into $table (id, name, nick, subject, content, regist_day, hit,";
			$sql .= " file_name_0, file_name_1, file_name_2, file_copied_0,  file_copied_1, file_copied_2) ";
			$sql .= "values('$userid', '$username', '$usernick', '$subject', '$content', '$regist_day', 0,";
			$sql .= "'$upfile_name[0]', '$upfile_name[1]',  '$upfile_name[2]', '$copied_file_name[0]', '$copied_file_name[1]','$copied_file_name[2]')";
			// //mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
			// $stt = $dbo->prepare($sql,
			// 	array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
			// $result = $stt->execute();
			// if($result) {
      //     echo "입력 완료";
      // }

			$stt = $dbo->prepare($sql,
				array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
			$result = $stt->execute();
			if($result) {
          echo "입력 완료";
      }
		}
	}
	catch(PDOException $e){

	}
	               // DB 연결 끊기

	// echo "
	//    <script>
	//     location.href = 'list.php?table=$table&page=$page';
	//    </script>
	// ";
?>
