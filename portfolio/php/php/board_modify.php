<?php

	// 게시글 고유번호와 
	// 수정 후 다시 돌아갈때 게시글이 있던 리스트 페이지로 돌아가기 위해 페이지도 받아온다
	$num = $_GET["num"];
	$page = $_GET["page"];

	$subject = $_POST["subject"];
	$content = $_POST["content"];

	// DB connect
	$con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
	$sql = "update board set subject='$subject', content='$content' where num=$num";
	mysqli_query($con, $sql);
	mysqli_close($con);
	// DB close

	// 수정 후 게시글이 있던 리스트 페이지로 다시 돌아간다
	echo "
		<script>
			location.href = 'board_view.php?num=$num&page=$page';
		</script>
	";
?>