<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>header</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		session_start();

		if(isset($_SESSION["userid"])) {
			$userid = $_SESSION["userid"];
		}
		else {
			$userid = "";
		}
		if(isset($_SESSION["username"])) {
			$username = $_SESSION["username"];
		}
		else {
			$username = "";
		}
	?>
	<div class="wrap">
		<header class="header">
			<div class="flex">
				<div class="logo">
					<p><a href="index.php">HOME</a></p>
				</div>
				<?php 
					// $userid가 값이 있다면 실행
					if( !$userid ) {
				?>
				<div class="nav login">
					<div class="flex">
						<p><a href="member_form.php">Join</a></p>
						<p><a href="login_form.php">Login</a></p>
					</div>
				</div>

				<!-- 태그로 묶인게 없어서 color 안먹음 -->
				<?php
					} // if문 끝
					// $userid가 없다면 실행
					else { $logged = $username."님";
				?>

				<div class="nav logout">
					<div class="flex">
						<p><?=$logged?></p>
						<p><a href="message_form.php">쪽지</a></p>
						<p><a href="board_form.php">게시판</a></p>
						<p><a href="member_modify_form.php">정보수정</a></p>
						<p><a href="logout.php">Logout</a></p>
					</div>
				</div>
				<?php
					} // else문 끝
				?>
			</div>
		</header>
	</div>
</body>
</html>