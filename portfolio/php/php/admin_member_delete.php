<meta charset="UTF-8">
<?php
	session_start();
	if( isset($_SESSION["userlevel"]) ) {
		$userlevel = $_SESSION["userlevel"];
	}
	else {
		$userlevel = "";
	}

	if( $userlevel != 1 ) {
		echo "
			<script>
				alert('회원 정보 수정은 관리자만 가능합니다.');
				history.go(-1);
			</script>
		";
	}

	$num = $_GET["num"];

	$con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
	$sql = "delete from member where num='$num'";
	mysqli_query($con, $sql);
	mysqli_close($con);

	echo "
		<script>
			alert('삭제되었습니다.');
			location.href = 'admin_member.php';
		</script>
	";
?>