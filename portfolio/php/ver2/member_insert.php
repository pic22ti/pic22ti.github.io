<?php
	$id = $_POST["id"];
	$pass = $_POST["pass"];
	$name = $_POST["name"];
	$email = $_POST["email"];

	// 현재의 년-월-일-시-분을 저장
	date_default_timezone_set('Asia/Seoul');
	$regist_day = date('Y-m-d (H:i)');

	$con = mysqli_connect('localhost', 'user1', '12345', 'newdb');
	$sql = "insert into member (id, pass, name, email, regist_day, level, point)";
	$sql .= " values ('$id', '$pass', '$name', '$email', '$regist_day', 9, 0)";

	mysqli_query($con, $sql);
	mysqli_close($con);

	echo "
		<script>
			location.href = 'member_complete.php';
		</script>
	";
?>