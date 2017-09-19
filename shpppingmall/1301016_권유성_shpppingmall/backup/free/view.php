<?php
//시작 require_once = shoppingmall/freeboar.php
	require_once "../DBconn.php";
	try{

		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}
		$table = $_GET['table'];
		$num = $_GET['num'];
		$sql = "SELECT * FROM $table WHERE num = $num";
		$stmt = $pdo->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
		$result = $stmt->execute();

		//$total_record = $stt->rowCount();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		// $result = mysql_query($sql, $connect);
	  // $row = mysql_fetch_array($result);

		$item_num     = $row['num'];
		$item_id      = $row['id'];
		$item_name    = $row['name'];
	  $item_nick    = $row['nick'];
		$item_hit     = $row['hit'];

		$image_name[0]   = $row['file_name_0'];
		$image_name[1]   = $row['file_name_1'];
		$image_name[2]   = $row['file_name_2'];
		$image_copied[0] = $row['file_copied_0'];
		$image_copied[1] = $row['file_copied_1'];
		$image_copied[2] = $row['file_copied_2'];

	  $item_date    = $row['regist_day'];
		$item_subject = str_replace(" ", "&nbsp;", $row['subject']);
		$item_content = $row['content'];


		for ($i=0; $i<3; $i++)
		{
			if ($image_copied[$i])
			{
				$imageinfo = GetImageSize("./data/".$image_copied[$i]);
				$image_width[$i] = $imageinfo[0];
				$image_height[$i] = $imageinfo[1];
				$image_type[$i]  = $imageinfo[2];

				if ($image_width[$i] > 785)
					$image_width[$i] = 785;
			}
			else
			{
				$image_width[$i] = "";
				$image_height[$i] = "";
				$image_type[$i]  = "";
			}
		}
		$new_hit = $item_hit + 1;
		$sql = "update $table set hit=$new_hit where num=$num";
		$stmt = $pdo->prepare($sql,	array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
		$stt->execute();  // 글 조회수 증가시킴
	}
	catch(PDOException $e){

	}


?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link href="./css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="./css/board4.css" rel="stylesheet" type="text/css" media="all">
<script>
	function check_input()
	{
		if (!document.ripple_form.ripple_content.value)
		{
			alert("내용을 입력하세요!");
			document.ripple_form.ripple_content.focus();
			return;
		}
		document.ripple_form.submit();
    }

    function del(href)
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>
</head>

<body>
<div id="wrap">
	<div id="header">
		<?php require_once "./view/header.php" ?>

  </div>  <!-- end of header -->
<br>
  <div id="content">
	<div id="col1">

	</div>

	<div id="col2">
		<div id="title">
			<img src="../img/title_free.gif">
		</div>

		<div id="view_comment"> &nbsp;</div>
		<div id="view_title">
			<div id="view_title1"><?= $item_subject ?></div><div id="view_title2"><?= $item_nick ?> | 조회 : <?= $item_hit ?>
			                      | <?= $item_date ?> </div>
		</div>

		<div id="view_content">
<?php
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];
			$img_name = "./data/".$img_name;
			$img_width = $image_width[$i];

			echo "<img src='$img_name' width='$img_width'>"."<br><br>";
		}
	}
?>
			<?= $item_content ?>
		</div>
		<?php
    for ($i=0; $i<3; $i++)
	{
		if ($_SESSION['usernum'] && $image_copied[$i])
		{
			$show_name = $image_name[$i];
			$real_name = $image_copied[$i];
			$real_type = $image_type[$i];
			$file_path = "./data/".$real_name;
			$file_size = filesize($file_path);

			echo "▷ 첨부파일 : $show_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       <a href='download.php?table=$table&num=$num&real_name=$real_name&show_name=$show_name&file_type=$real_type'>[저장]</a><br>";
		}
	} ?>
		<div id="ripple">
<?php
	try{
		$sql = "select * from free_ripple where parent='$item_num'";
		$stt = $dbo->prepare($sql,
			array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
		$repple_result = $stt->execute();
		//$total_record = $stt->rowCount();

	  // $ripple_result = mysql_query($sql);
		//$row=$stt->fetch(PDO::FETCH_ASSOC,PDO::FETCH_ORI_ABS,$i);
		while ($row_ripple =$stt->fetch(PDO::FETCH_ASSOC))
		{
			$ripple_num     = $row_ripple['num'];
			$ripple_id      = $row_ripple['id'];
			$ripple_nick    = $row_ripple['nick'];
			$ripple_content = str_replace("\n", "<br>", $row_ripple['content']);
			$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
			$ripple_date    = $row_ripple['regist_day'];
			?>
			<div id="ripple_writer_title">
			<ul>
			<li id="writer_title1"><?=$ripple_nick?></li>
			<li id="writer_title2"><?=$ripple_date?></li>
			<li id="writer_title3">
		      <?php
					if($_SESSION['user']['userID']=="admin" || $_SESSION['user']['userID']==$ripple_id)
			          echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'>[삭제]</a>";
			  			?>
			</li>
			</ul>
			</div>
			<div id="ripple_content"><?=$ripple_content?></div>
			<div class="hor_line_ripple"></div>
	<?php
			}
	?>
			<form  name="ripple_form" method="post" action="insert_ripple.php?table=<?=$table?>&num=<?=$item_num?>">
			<div id="ripple_box">
				<div id="ripple_box1"><img src="../img/title_comment.gif"></div>
				<div id="ripple_box2"><textarea rows="5" cols="65" name="ripple_content"></textarea>
				</div>
				<div id="ripple_box3"><a href="#"><img src="../img/ok_ripple.gif"  onclick="check_input()"></a></div>
			</div>
			</form>
		</div> <!-- end of ripple -->

		<div id="view_button">
				<a href="list.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/list.png"></a>&nbsp;
	<?php
		if(isset($_SESSION['user']['userID']) && ($_SESSION['user']['userID']==$item_id))
		{
	?>
				<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>"><img src="../img/modify.png"></a>&nbsp;
				<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')"><img src="../img/delete.png"></a>&nbsp;
	<?php
		}
	?>
	<?php
		if(isset($_SESSION['user']['userID']))
		{
	?>
					<a href="write_form.php?table=<?=$table?>"><img src="../img/write.png"></a>
	<?php
		}
	}
	catch(PDOException $e){

	}
?>
		</div>
		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
