<?php

	// 세션 스타트하고
	session_start();

	// delete.php와 같은 수정사항
	// *********************** 수정사항: 유저 아이디와 유저 네임 변수를 삭제해서 세션 종료인게 맞는지 다시 확인하기
	unset($_SESSION["userid"]);
	unset($_SESSION["username"]);

	// 메인페이지로 돌아가기
	echo "
		<script>
			location.href = 'index.php';
		</script>
	";
?>