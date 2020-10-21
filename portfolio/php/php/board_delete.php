<?php

	// 게시글 고유번호와 
	// 삭제 후 다시 돌아갈때 게시글이 있던 리스트 페이지로 돌아가기 위해 페이지도 받아온다
	$num = $_GET["num"];
	$page = $_GET["page"];

	// DB connect
	$con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
	$sql = "select * from board where num=$num";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);

	// 첨부파일이 있다면 링크 해제
	$copied_name = $row["file_copied"];

	if( $copied_name ) {
		$file_path = "../data/".$copied_name;
		unlink($file_path);
	}

	// 게시글 데이터 삭제
	$sql = "delete from board where num=$num";
	mysqli_query($con, $sql);

	mysqli_close($con);
	// DB close

	// 삭제 후 게시글이 있던 리스트 페이지로 다시 돌아간다
	echo "
		<script>
			location.href = 'board_list.php?page=$page';
		</script>
	";
?>