<?php
	session_start();
	require_once "../lib/DBManager.php";
	if(isset($_GET['mode']))
	{
		$mode = $_GET['mode'];
	}
	else {
		$mode = "write";
		$item_subject     = "";
		$item_content     = "";
		$item_file_0 			= "";
		$item_file_1		 	= "";
		$item_file_2 			= "";

		// $copied_file_0 = "";
		// $copied_file_1 = "";
		// $copied_file_2 = "";
	}
	$table = $_GET['table'];
	if ($mode=="modify")
	{
    try {
      $dbo=connect();
			$page = $_GET['page'];
			$num = $_GET['num'];
      $sql = "select * from $table where num=$num";
      $stt = $dbo->prepare($sql,
         array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
      $result = $stt->execute();
			$row = $stt->fetch();
  		//$result = mysql_query($sql, $connect);
  		//$row = $stt->rowCount();

  		$item_subject     = $row['subject'];
  		$item_content     = $row['content'];
  		$item_file_0 			= $row['file_name_0'];
  		$item_file_1		 	= $row['file_name_1'];
  		$item_file_2 			= $row['file_name_2'];

  		$copied_file_0 = $row['file_copied_0'];
  		$copied_file_1 = $row['file_copied_1'];
  		$copied_file_2 = $row['file_copied_2'];

    }
    catch(PDOException $e){

    }

	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/board4.css" rel="stylesheet" type="text/css" media="all">
<script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요1");
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>

<body>
<div id="wrap">
  <div id="header">
    <?php require_once "../shoppingMall/header.php"; ?>
  </div>  <!-- end of header -->



  <div id="content">
	<div id="col1">

	</div>

	<div id="col2">
		<div id="title">
			<img src="../img/title_free.gif">
		</div>
		<div class="clear"></div>

		<div id="write_form_title">
			<img src="../img/write_form_title.gif">
		</div>
		<div class="clear"></div>
<?php

	if($mode=="modify")
	{
?>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data">
<?php
	}
	else
	{
?>
		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data">
<?php
	}
?>
		<div id="write_form">
			<div class="write_line"></div>
			<div id="write_row1"><div class="col1"> 별명 </div><div class="col2"><?=$_SESSION['user']['usernick']?></div>
<?php
	if( $_SESSION['user']['userID'] && ($mode != "modify"))
	{
?>

<?php
	}
?>
			</div>
			<div class="write_line"></div>
			<div id="write_row2"><div class="col1"> 제목   </div>
			                     <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row3"><div class="col1"> 내용   </div>
			                     <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row4"><div class="col1"> 이미지파일1   </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
			<div class="clear"></div>
<?php 	if ($mode=="modify" && $item_file_0)
	{
?>
			<div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[0]" value="0"> 삭제</div>
			<div class="clear"></div>
<?php
	}
?>
			<div class="write_line"></div>
			<div id="write_row5"><div class="col1"> 이미지파일2  </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
<?php 	if ($mode=="modify" && $item_file_1)
	{
?>
			<div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[1]" value="1"> 삭제</div>
			<div class="clear"></div>
<?php
	}
?>
			<div class="write_line"></div>
			<div class="clear"></div>
			<div id="write_row6"><div class="col1"> 이미지파일3   </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
<?php 	if ($mode=="modify" && $item_file_2)
	{
?>
			<div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[2]" value="2"> 삭제</div>
			<div class="clear"></div>
<?php
	}
?>
			<div class="write_line"></div>

			<div class="clear"></div>
		</div>

		<div id="write_button"><a href="#"><img src="../img/ok.png" onclick="check_input()"></a>&nbsp;
								<a href="list.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/list.png"></a>
		</div>
		</form>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
