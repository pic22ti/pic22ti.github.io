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
				alert('회원 삭제는 관리자만 가능합니다.');
				history.go(-1);
			</script>
		";
	}

	$num = $_GET["num"];
	
	$con = mysqli_connect('localhost', 'user1', '12345', 'newdb');
	$sql = "delete from member where num=$num";
	mysqli_query($con, $sql);
	mysqli_close($con);

	echo "
		<script>
			alert('정상적으로 삭제되었습니다.');
			location.href = 'admin.php';
		</script>
	";



?>