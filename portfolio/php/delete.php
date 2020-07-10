<?php
	session_start();
	$userid = $_SESSION["userid"];

	unset($_SESSION["userid"]);
	unset($_SESSION["username"]);

	$con = mysqli_connect('localhost', 'user1', '12345', 'newdb');
	$sql = "delete from member where id='$userid'";
	mysqli_query($con, $sql);
	mysqli_close($con);

	echo "
		<script>
			alert('탈퇴되었습니다.');
			location.href='index.php';
		</script>
	";
?>