<meta charset="UTF-8">
<?php

	// 세션 스타트하고 유저레벨 가져오기
	session_start();
	if( isset($_SESSION["userlevel"]) ) {
		$userlevel = $_SESSION["userlevel"];
	}
	else {
		$userlevel = "";
	}

	// 유저레벨이 1이 아닐때 함수
	// 게시글 삭제 불가능하다는 알림창을 띄우고 전 페이지로 돌아감
	if( $userlevel != 1 ) {
		echo "
			<script>
				alert('게시글 삭제는 관리자만 가능합니다.');
				history.go(-1);
			</script>
		";
	}

	// 게시판 리스트에서 선택된 게시글의 수를 가져오는 함수
	// 선택된 게시글이 없다면 알림창을 띄우고 전 페이지로 돌아감
	if( isset($_POST["item"]) ) {
		$num_item = count($_POST["item"]);
	}
	else {
		echo "
			<script>
				alert('삭제할 게시글을 선택해주세요.');
				history.go(-1);
			</script>
		";
	}

	// DB connect
	$con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');

	// 선택된 게시글 배열을 for문으로 돌림
	for( $i = 0; $i < count($_POST["item"]); $i++ ) {

		// 하나씩 넘버를 넣어 DB에서 select
		$num = $_POST["item"][$i];

		$sql = "select * from board where num=$num";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);

		// 첨부파일이 있다면 링크 해제
		$copied_name = $row["file_copied"];

		if( $copied_name ) {
			$file_path = "./data/".$copied_name;
			unlink($file_path);
		}

		// 선택된 게시글 데이터 삭제
		$sql = "delete from board where num=$num";
		mysqli_query($con, $sql);
	}

	mysqli_close($con);
	// DB close

	// 정상적으로 삭제되었다는 알림창을 띄우고 게시판관리 페이지로 돌아감
	// *********************** 개선사항: 정상적으로 삭제가 되었을때와 삭제에 실패했을때 구분해서 알림창 다르게 띄우기
	echo "
		<script>
			alert('게시글이 정상적으로 삭제되었습니다.');
			location.href = 'admin_board.php';
		</script>
	";
?>