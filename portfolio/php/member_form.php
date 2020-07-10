<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>회원가입</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrap">
		<header class="header">
			<?php include "header.php"; ?>
		</header>
		<section class="section">
			<div class="form">
				<form name="member_form" method="post" action="member_insert.php">
					<h2>Join</h2>
					<div class="id flex">
						<!-- value=""가 생략되어있음 -->
						<input type="text" name="id" placeholder="아이디">
						<input class="check" type="button" value="중복확인" onclick="check_id()">
					</div>
					<div>
						<input type="password" name="pass" placeholder="비밀번호">
					</div>
					<div>
						<input type="password" name="pass_confirm" placeholder="비밀번호 확인">
					</div>
					<div>
						<input type="text" name="name" placeholder="이름">
					</div>
					<div>
						<input type="text" name="email" placeholder="이메일">
					</div>
					<div class="btn flex">
						<input class="button" type="button" value="가입하기" onclick="check_input()">
						<input class="button reset" type="button" value="취소하기" onclick="reset_form()">
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
			if( !document.member_form.id.value ) {
				alert( "아이디를 입력하세요" );
				document.member_form.id.focus();
				return;
			}
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
			document.member_form.id.value = "";
			document.member_form.pass.value = "";
			document.member_form.pass_confirm.value = "";
			document.member_form.name.value = "";
			document.member_form.email.value = "";
			document.member_form.id.focus();
			return;
		}
		function check_id() {
			window.open( "member_check_id.php?id="+document.member_form.id.value, "IDcheck", "left=200, top=200, width=350, height=250, scrollbars=no, resizable=yes" );
		}
	</script>
</body>
</html>