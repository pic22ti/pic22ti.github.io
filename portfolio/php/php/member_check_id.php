<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>

<!-- *************************************** 개선사항: html 기본 형태가 필요한가? ex) main.php -->
	<section class="section">
		<?php
			// 입력된 아이디 가져오기
			$id = $_GET["id"];

			// DB connect
			$con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
			$sql = "select * from member where id='$id'";
			$result = mysqli_query($con, $sql);
			$num_record = mysqli_num_rows($result);

			mysqli_close($con);
			// DB close
		?>


		<!-- 자바스크립트 -->
		<script type="text/javascript">

			// 결과값 가져오기
			let row = "<?=$num_record?>";
			if( row == 1 ) {
				parent.document.getElementById("chk_id2").value = "0";
				// 중복 아이디가 있다면 input 비우기
				parent.document.getElementById("chk_id1").value = "";
				parent.alert("이미 사용중인 아이디입니다.\n다른 아이디를 사용해주세요.");
			}
			else {
				parent.document.getElementById("chk_id2").value = "1";
				parent.alert("사용 가능한 아이디입니다.");
			}
		</script>
</body>
</html>