<meta charset="UTF-8">
<?php

	// 세선 스타트하고 유저 아이디 받아와서 저장
	session_start();
	$userid = $_SESSION["userid"];

	// 유저 세션을 삭제해서 세션 종료
	// *********************** 수정사항: login.php에서는 세션 4개를 다 시작했는데, logout.php에서는 세션 4개를 다 종료하고 여기는 2개만 종료하는지?
	unset($_SESSION["userid"]);
	unset($_SESSION["username"]);

	// DB connect
	$con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
	$sql = "delete from member where id='$userid'";
	mysqli_query($con, $sql);
	mysqli_close($con);
	// DB close

	// 정상적으로 탈퇴되었다는 알림창을 띄우고 메인 페이지로 돌아감
	// *********************** 개선사항: 정상적으로 탈퇴가 되었을때와 탈퇴에 실패했을때 구분해서 알림창 다르게 띄우기
	echo "
		<script>
			alert('탈퇴되었습니다.');
			location.href='index.php';
		</script>
	";
?>