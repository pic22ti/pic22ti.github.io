<meta charset="utf-8">
<?php
	$send_id = $_GET["send_id"];

	$rv_id = $_POST["rv_id"];
	$subject = $_POST["subject"];
	$content = $_POST["content"];

	$subject = htmlspecialchars($subject, ENT_QUOTES);
	$content = htmlspecialchars($content, ENT_QUOTES);
	$regist_day = date("Y-m-d (H:i)");

	$con = mysqli_connect('localhost', 'user1', '12345', 'newdb');
	$sql = "select * from member where id='$rv_id'";
	$result = mysqli_query($con, $sql);
	$num_record = mysqli_num_rows($result);

	if( $num_record ) {
		$sql = "insert into messagebox (send_id, rv_id, subject, content, regist_day)";
		$sql .= " value ('$send_id', '$rv_id', '$subject', '$content', '$regist_day')";
		mysqli_query($con, $sql);
	}
	else {
		echo "
			<script>
				alert('받는 사람이 잘못되었습니다.');
				history.go(-1);
			</script>
		";
	}

	mysqli_close($con);

	echo "
		<script>
			location.href = 'message_box.php?mode=send';
		</script>
	";
?>