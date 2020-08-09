<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style-reset.css">
	<link rel="stylesheet" href="style-flex.css">
	<title>Home</title>
</head>
<body>
	  <!-- 전체를 감싸는 wrap -->
	<div class="wrap">

		<!-- 헤더 -->
		<header id="header">
			<?php include "header.php"; ?>
		</header>

		<!-- 메인 -->
		<section id="section">
			<?php include "main.php"; ?>
		</section>
		
		<!-- 푸터 -->
		<footer id="footer">
			<?php include "footer.php"; ?>
		</footer>
	</div>
</body>
</html>