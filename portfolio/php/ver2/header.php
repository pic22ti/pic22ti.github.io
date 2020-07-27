<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		if(isset($_SESSION["userlevel"])) {
			$userlevel = $_SESSION["userlevel"];
		}
		else {
			$userlevel = "";
		}
		if(isset($_SESSION["userpoint"])) {
			$userpoint = $_SESSION["userpoint"];
		}
		else {
			$userpoint = "";
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
					else { 
						
						
						echo "<p>$logged = $username."님 [ 레벨".$userlevel." / ".$userpoint."p ]"</p>;
						";
						
						
				?>

				<div class="nav logout">
					<div class="flex">
						<p><?=$logged?></p>
						<p><a href="message_box.php?mode=rv">쪽지</a></p>
						<p><a href="board_list.php">게시판</a></p>
						<p><a href="member_modify_form.php">정보수정</a></p>
						<p><a href="logout.php">Logout</a></p>

				<?php
					if( $userlevel == 1) {
				?>	
						<p><a href="admin.php">관리자 모드</a></p>
				<?php
					}
				?>
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