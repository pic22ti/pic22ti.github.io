<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>아이디 중복체크</title>
	<link rel="stylesheet" type="text/css" href="style-open.css">
</head>
<body>
	<section class="section">
		<h2>아이디 중복체크</h2>
		
		<?php
			$id = $_GET["id"];

			$con = mysqli_connect('localhost', 'user1', '12345', 'newdb');
			$sql = "select * from member where id='$id'";
			$result = mysqli_query($con, $sql);
			$num_record = mysqli_num_rows($result);

			if( !$id ) {
				echo "아이디를 입력해주세요.";
		?>
		<br>
		<input type="button" name="" value="확인" onclick="closeCheck()">
		<?php	
				// 중복일때는 넣었던 값이 없어지게 해보기
			}
			else {
				// 값이 있다면
				if( $num_record ) {
					echo "$id<br>";
					echo "이미 사용되고 있는 아이디입니다.<br>다른 아이디를 사용해주세요.";
		?>
		<br>
		<input type="button" name="" value="확인" onclick="idCheckNo()">
		<?php	
				}
				// 값이 없다면
				else {
					echo "$id<br>";
					echo "사용가능한 아이디입니다.";
		?>
		<br>
		<input type="button" name="" value="확인" onclick="idCheckOk()">
		<?php	
				}
				mysqli_close($con);
			}
		?>
		
	</section>
	<script type="text/javascript">
		function closeCheck() {
			self.close();
		}
		function idCheckOk() {
			self.close();
		}
		function idCheckNo() {
			self.close();
		}
	</script>
</body>
</html>