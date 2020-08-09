<?php
	$id = $_POST["id"];
	$pass = $_POST["pass"];

	$con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
	$sql = "select * from member where id='$id'";
	$result = mysqli_query($con, $sql);

	$num_match = mysqli_num_rows($result);

	if( !$num_match ) {
		echo "
			<script>
				window.alert('등록되지 않은 아이디입니다.');
				history.go(-1);
			</script>
		";
	}
	else {
		$row = mysqli_fetch_array($result);
		$db_pass = $row["pass"];

		mysqli_close($con);

		if( $pass != $db_pass ) {
			echo "
				<script>
					window.alert('비밀번호가 일치하지 않습니다.');
					history.go(-1);
				</script>
			";
		}
		else {
			session_start();
			$_SESSION["userid"] = $row["id"];
			$_SESSION["username"] = $row["name"];
			$_SESSION["userlevel"] = $row["level"];
			$_SESSION["userpoint"] = $row["point"];

			echo "
				<script>
				location.href = 'index.php';
				</script>
			";
		}
	}
?>