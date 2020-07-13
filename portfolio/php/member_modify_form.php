<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>회원정보수정</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrap">
		<header class="header">
			<?php include "header.php"; ?>
		</header>
		<section class="section">
			<?php
				$con = mysqli_connect('localhost', 'user1', '12345', 'newdb');
				$sql = "select * from member where id='$userid'";
				$result = mysqli_query($con, $sql);
				$row = mysqli_fetch_array($result);

				$pass = $row["pass"];
				$name = $row["name"];
				$email = $row["email"];

				mysqli_close($con);
			?>
			<div class="form modify">
				<form name="member_form" method="post" action="member_modify.php?id=<?=$userid?>">
					<h2>회원정보수정</h2>
					<div class="id">
						<p>
						<?=$userid?>
						</p>
					</div>
					<div>
						<input type="password" name="pass" value="<?=$pass?>">
					</div>
					<div>
						<input type="password" name="pass_confirm" value="<?=$pass?>">
					</div>
					<div>
						<input type="text" name="name" value="<?=$name?>">
					</div>
					<div>
						<input type="text" name="email" value="<?=$email?>">
					</div>
					<div class="btn flex">
						<input class="button update" type="button" value="저장하기" onclick="check_input()">
						<input class="button reset" type="button" value="취소하기" onclick="reset_form()">
						<input class="button" type="button" value="회원탈퇴" onclick="delete_id()">
					</div>
				</form>
			</div>
		</section>
		<footer class="footer">
			<?php include "footer.php"; ?>
		</footer>
	</div>
	<script type="text/javascript">
		function check_input() {
			if( !document.member_form.pass.value ) {
				alert( "비밀번호를 입력하세요" );
				document.member_form.pass.focus();
				return;
			}
			if( !document.member_form.pass_confirm.value ) {
				alert( "비밀번호 확인을 입력하세요" );
				document.member_form.pass_confirm.focus();
				return;
			}
			if( !document.member_form.name.value ) {
				alert( "이름을 입력하세요" );
				document.member_form.name.focus();
				return;
			}
			if( !document.member_form.email.value ) {
				alert( "이메일 입력하세요" );
				document.member_form.email.focus();
				return;
			}
			if( document.member_form.pass.value != document.member_form.pass_confirm.value ) {
				alert( "비밀번호가 일치하지 않습니다" );
				document.member_form.pass.focus();
				document.member_form.pass.select();
				return;
			}
			document.member_form.submit();
		}
		function reset_form() {
			document.member_form.pass.value = "";
			document.member_form.pass_confirm.value = "";
			document.member_form.name.value = "";
			document.member_form.email.value = "";
			document.member_form.id.focus();
			return;
		}
		
		function delete_id() {
			if( confirm( "정말로 탈퇴하시겠습니까?" ) == true ){
				document.location.href = 'delete.php';
			}
			else {
				return;
			}
		}
	</script>
</body>
</html>