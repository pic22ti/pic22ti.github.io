<?php

	// 세션 스타트하고
	session_start();

	// 유저 세션을 삭제해서 세션 종료
	unset($_SESSION["userid"]);
	unset($_SESSION["username"]);
	unset($_SESSION["userlevel"]);
	unset($_SESSION["userpoint"]);

	// 메인페이지로 돌아가기
	echo "
		<script>
			location.href = 'index.php';
		</script>
	";
?>