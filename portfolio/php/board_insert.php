<meta charset="utf-8">
<?php
	session_start();
	if( isset($_SESSION["userid"]) ) {
		$userid = $_SESSION["userid"];
	}
	else {
		$userid = "";
	}
	// username 
	if( isset($_SESSION["username"]) ) {
		$username = $_SESSION["username"];
	}
	else {
		$username = "";
	}

	if( !$userid ) {
		echo ("
			<script>
				alert('게시판은 로그인 후 사용할 수 있습니다.');
				history.go(-1);
			</script>
		");
	}
	$subject = $_POST["subject"];
	$content = $_POST["content"];
	$subject = htmlspecialchars($subject, ENT_QUOTES);
	$content = htmlspecialchars($content, ENT_QUOTES);
	date_default_timezone_set('Asia/Seoul');
	$regist_day = date("Y-m-d (H:i)");
	$upload_dir = './data/';

	$upfile_name = $_FILES["upfile"]["name"];
	$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
	$upfile_type = $_FILES["upfile"]["type"];
	$upfile_size = $_FILES["upfile"]["size"];
	$upfile_error = $_FILES["upfile"]["error"];

	if( $upfile_name && !$upfile_error ) {
		$file = explode(".", $upfile_name);
		$file_name = $file[0];
		$file_ext = $file[1];

		$new_file_name = date("Y_m_d_H_i_s");
		// 이건 뭘까
		$new_file_name = $new_file_name;
		$copied_file_name = $new_file_name.".".$file_ext;
		$uploaded_file = $upload_dir.$copied_file_name;

		if( $upfile_size > 1000000 ) {
			echo ("
				<script>
					alert('1MB 이하의 파일만 업로드 할 수 있습니다.');
					history.go(-1);
				</script>
			");
		}
		if( !move_uploaded_file($upfile_tmp_name, $uploaded_file) ) {
			echo ("
				<script>
					alert('파일을 업로드하는데 실패했습니다.');
					history.go(-1);
				</script>
			");
		}
	}
	else {
		$upfile_name = "";
		$upfile_type = "";
		$copied_file_name = "";
	}

	$con = mysqli_connect('localhost', 'user1', '12345', 'newdb');
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

	echo ("
		<script>
			location.href = 'board_list.php';
		</script>
	");
?>
