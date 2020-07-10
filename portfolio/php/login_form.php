<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrap">
		<header class="header">
			<?php include "header.php"; ?>
		</header>
		<section class="section">
			<div class="form">
				<form name="login_form" method="post" action="login.php">
					<h2>Login</h2>
					<div>
						<input type="text" name="id" placeholder="아이디">
					</div>
					<div>
						<input type="password" name="pass" placeholder="비밀번호">
					</div>
					<div class="btn flex">
						<input class="button" type="button" value="로그인" onclick="check_input()">
						<input class="button reset" type="button" value="회원가입" onclick="signUp()">
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
			if( !document.login_form.id.value ) {
				alert("아이디를 입력하세요!");
				document.login_form.id.focus();
				return;
			}
			if( !document.login_form.pass.value ) {
				alert("비밀번호를 입력하세요!");
				document.login_form.pass.focus();
				return;
			}
			document.login_form.submit();
		}
		function signUp() {
			document.location = 'member_form.php';	
		}
	</script>
</body>
</html>