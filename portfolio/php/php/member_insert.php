<?php

	// 회원 가입 입력값 가져오기
	$id = $_POST["id"];
	$pass = $_POST["pass"];
	$name = $_POST["name"];
	$email = $_POST["email"];

	// 시간대를 아시아/서울로 설정 후
	// 현재의 년-월-일-시-분을 저장
	date_default_timezone_set('Asia/Seoul');
	$regist_day = date('Y-m-d (H:i)');

	// DB connect
	$con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
	$sql = "insert into member (id, pass, name, email, regist_day, level, point)";
	$sql .= " values ('$id', '$pass', '$name', '$email', '$regist_day', 9, 0)";

	mysqli_query($con, $sql);
	mysqli_close($con);
	// DB close

	echo "
		<script>
			location.href = 'member_complete.php';
		</script>
	";
?>