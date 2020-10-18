<meta charset="UTF-8">
<?php

	// 세선 스타트하고 유저 아이디 받아와서 저장
	session_start();
	$userid = $_SESSION["userid"];

	// 유저 세션을 삭제해서 세션 종료
	unset($_SESSION["userid"]);

	// DB connect
	$con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
	$sql = "delete from member where id='$userid'";
	mysqli_query($con, $sql);
	mysqli_close($con);
	// DB close

	// 정상적으로 탈퇴되었다는 알림창을 띄우고 메인 페이지로 돌아감
	echo "
		<script>
			alert('탈퇴되었습니다.');
			location.href = 'index.php';
		</script>
	";
?>