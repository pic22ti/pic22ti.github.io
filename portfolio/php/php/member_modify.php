<?php

	// 입력갑 가져오기
	$id = $_GET["id"];

	$pass = $_POST["pass"];
	$name = $_POST["name"];
	$email = $_POST["email"];

	// DB connect
	$con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
	$sql = "update member set pass='$pass', name='$name', email='$email' where id='$id'";
	mysqli_query($con, $sql);
	mysqli_close($con);
	// DB close

	echo "
		<script>
			location.href = 'index.php';
		</script>
	";
?>