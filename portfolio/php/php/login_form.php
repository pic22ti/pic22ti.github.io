<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-reset.css">
  <link rel="stylesheet" href="../css/style-flex.css">
  <link rel="stylesheet" href="../css/style-short_form.css">
  <title>로그인</title>
  <style>






  </style>
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

        <!-- 아이디 입력 -->
        <input type="text" name="id" placeholder="아이디">

        <!-- 비밀번호 입력 -->
        <input type="password" name="pass" placeholder="비밀번호">

        <div class="btn">

          <!-- 로그인 버튼 -->
          <input type="button" class="plus-btn" value="로그인" onclick="check_input()">

          <!-- 회원가입 버튼 -->
          <input type="button" class="plus-btn" class="reset" value="회원가입" onclick="signUp()">
        </div>

      </form>

    </section>
      
      










  <!-- 자바스크립트 -->
	<script type="text/javascript">
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
		function signUp() {
			document.location = 'member_form.php';	
		}
	</script>
</body>
</html>