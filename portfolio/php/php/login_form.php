<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-reset.css">
  <link rel="stylesheet" href="../css/style-flex.css">
  <link rel="stylesheet" href="../css/style-short_form.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>로그인</title>
</head>
<body>

    <!-- 헤더 -->
    <header id="header">
      <?php include "header.php"; ?>
		</header>

    <!-- 로그인 폼 섹선 -->
    <section id="login_form" class="short_form">

      <!-- 타이틀 -->
      <h2>로그인</h2>

      <!-- 로그인 폼 -->
      <form method="post" name="login_form" action="login.php">

        <!-- 아이디 입력 (sample id: admin) -->
        <input type="text" name="id" placeholder="아이디" value="admin">

        <!-- 비밀번호 입력 (sample pw: admin) -->
        <input type="password" name="pass" placeholder="비밀번호" value="admin">

        <div class="btn">

          <!-- 로그인 버튼 -->
          <input type="button" class="point-btn" value="로그인" onclick="check_input()">

          <!-- 회원가입 버튼 -->
          <input type="button" class="plus-btn" class="reset" value="회원가입" onclick="signUp()">
        </div>
      </form>
    </section>

  <!-- javascript -->
  <script type="text/javascript">
    // 입력된 내용이 없다면 리턴하는 함수
		function check_input() {
			if( !document.login_form.id.value ) {
				alert("아이디를 입력하세요.");
				document.login_form.id.focus();
				return;
			}
			if( !document.login_form.pass.value ) {
				alert("비밀번호를 입력하세요.");
				document.login_form.pass.focus();
				return;
			}
			document.login_form.submit();
    }
    
    // 회원가입 페이지로 이동하는 함수
		function signUp() {
			location.href = 'member_form.php';	
		}
	</script>
</body>
</html>