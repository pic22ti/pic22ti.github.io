<meta charset="utf-8">
<?php

	// 메세지 보내는데 필요한 데이터 가져오기
	$send_id = $_GET["send_id"];

	$rv_id = $_POST["rv_id"];
	$subject = $_POST["subject"];
	$content = $_POST["content"];

	$subject = htmlspecialchars($subject, ENT_QUOTES);
	$content = htmlspecialchars($content, ENT_QUOTES);
	date_default_timezone_set('Asia/Seoul');
	$regist_day = date("Y-m-d (H:i)");

	// DB connect
	$con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');

	// 받는 사람이 제대로 입력되었는지 확인하기 위해 받는 사람 아이디 찾기
	$sql = "select * from member where id='$rv_id'";
	$result = mysqli_query($con, $sql);
	$num_record = mysqli_num_rows($result);

	// 빋는 사람이 제대로 입력되었다면 메세지 저장
	if( $num_record ) {
		$sql = "insert into messagebox (send_id, rv_id, subject, content, regist_day)";
		$sql .= " value ('$send_id', '$rv_id', '$subject', '$content', '$regist_day')";
		mysqli_query($con, $sql);
	}

	// 받는 사람이 잘못되었을 때 되돌아간다
	else {
		echo "
			<script>
				alert('받는 사람이 잘못되었습니다.');
				history.go(-1);
			</script>
		";
	}

	mysqli_close($con);
	// DB close

	echo "
		<script>
			location.href = 'message_box.php?mode=send';
		</script>
	";
?>