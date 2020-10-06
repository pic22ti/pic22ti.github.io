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
	// 회원 정보 수정이 불가능하다는 알림창을 띄우고 전 페이지로 돌아감
	if( $userlevel != 1 ) {
		echo "
			<script>
				alert('회원 정보 수정은 관리자만 가능합니다.');
				history.go(-1);
			</script>
		";
	}

	// 수정된 회원의 고유번호 가져오기
	$num = $_GET["num"];

	// DB connect
	$con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
	$sql = "delete from member where num='$num'";
	mysqli_query($con, $sql);
	mysqli_close($con);
	// DB close

	// 정상적으로 삭제되었다는 알림창을 띄우고 회원관리 페이지로 돌아감
	// *********************** 개선사항: 정상적으로 삭제가 되었을때와 삭제에 실패했을때 구분해서 알림창 다르게 띄우기
	echo "
		<script>
			alert('삭제되었습니다.');
			location.href = 'admin_member.php';
		</script>
	";
?>