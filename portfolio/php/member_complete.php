<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>index</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrap">
		<header class="header">
			<?php include "header.php"; ?>
		</header>
		<section class="section">
			<div class="form">
				<form name="login_form">
					<h3>가입해주셔서 감사합니다.</h3>
						<div class="btn flex">
							<input class="button" type="button" value="로그인 하기" onclick="check_input()">
							<input class="button reset" type="button" value="홈으로 가기" onclick="go_home()">
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
			document.location.href = 'login_form.php';
		}
		function go_home() {
			document.location.href = 'index.php';
		}
	</script>
</body>
</html>