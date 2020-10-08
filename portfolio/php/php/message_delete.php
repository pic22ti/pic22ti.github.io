<meta charset="utf-8">
<?php

	// 게시글 고유번호와 
	// 삭제 후 다시 돌아갈때 게시글이 있던 리스트 페이지로 돌아가기 위해 페이지도 받아온다
	$mode = $_GET["mode"];
	$num = $_GET["num"];

	// DB connect
	$con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
	$sql = "delete from messagebox where num=$num";
	mysqli_query($con, $sql);
	mysqli_close($con);
	// DB close

	if ($mode == "send") {
		$url = "message_box.php?mode=send";
	}
	else {
		$url = "message_box.php?mode=rv";
	}

	echo "
		<script>
			location.href = '$url';
		</script>
	";
?>