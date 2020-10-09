<meta charset="utf-8">
<?php

	// 세션 스타트하고 유저아이디, 유저네임 가져오기
	session_start();
	if( isset($_SESSION["userid"]) ) {
		$userid = $_SESSION["userid"];
	}
	else {
		$userid = "";
	}
	if( isset($_SESSION["username"]) ) {
		$username = $_SESSION["username"];
	}
	else {
		$username = "";
	}
	
	// *********************** 개선사항: 어차피 로그인해야 게시판 버튼이 보이는데 필요한 부분인가?
	if( !$userid ) {
		echo ("
			<script>
				alert('게시판은 로그인 후 사용할 수 있습니다.');
				history.go(-1);
			</script>
		");
	}

	// 게시글을 등록하는데 필요한 데이터 가져오기
	$subject = $_POST["subject"];
	$content = $_POST["content"];

	// htmlspecialchars() 함수: 특수 문자를 HTML 특수 기호로 변환
	$subject = htmlspecialchars($subject, ENT_QUOTES);
	$content = htmlspecialchars($content, ENT_QUOTES);

	// 시간대를 아시아/서울로 설정한다
	date_default_timezone_set('Asia/Seoul');
	$regist_day = date("Y-m-d (H:i)");
	$upload_dir = './data/';

	// 첨부된 파일을 업로드 준비
	$upfile_name = $_FILES["upfile"]["name"];
	$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
	$upfile_type = $_FILES["upfile"]["type"];
	$upfile_size = $_FILES["upfile"]["size"];
	$upfile_error = $_FILES["upfile"]["error"];

	// 만약 첨부된 파일이 있고 에러가 없다면
	if( $upfile_name && !$upfile_error ) {
		$file = explode(".", $upfile_name);
		$file_name = $file[0];
		$file_ext = $file[1];

		$new_file_name = date("Y_m_d_H_i_s");
		$copied_file_name = $new_file_name.".".$file_ext;
		$uploaded_file = $upload_dir.$copied_file_name;

		// 파일 용량 제어
		if( $upfile_size > 1000000 ) {
			echo ("
				<script>
					alert('1MB 이하의 파일만 업로드 할 수 있습니다.');
					history.go(-1);
				</script>
			");
		}

		// 파일 업로드에 실패 했을 경우
		if( !move_uploaded_file($upfile_tmp_name, $uploaded_file) ) {
			echo ("
				<script>
					alert('파일을 업로드하는데 실패했습니다.');
					history.go(-1);
				</script>
			");
		}
	}

	// 첨부된 파일이 없다면 업로드 하지 않는다
	else {
		$upfile_name = "";
		$upfile_type = "";
		$copied_file_name = "";
	}

	// DB connect
	$con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
	$sql = "insert into board (id, name, subject, content, regist_day, hit, file_name, file_type, file_copied) ";
	$sql .= "values ('$userid', '$username', '$subject', '$content', '$regist_day', 0, ";
	$sql .= "'$upfile_name', '$upfile_type', '$copied_file_name')";
	mysqli_query($con, $sql);

	$point_up = 100;
	$sql = "select point from member where id='$userid'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$new_point = $row["point"]+$point_up;

	$sql = "update member set point=$new_point where id='$userid'";
	mysqli_query($con, $sql);

	mysqli_close($con);
	// DB close

	echo ("
		<script>
			location.href = 'board_list.php';
		</script>
	");
?>
