<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-reset.css">
  <link rel="stylesheet" href="../css/style-flex.css">
  <link rel="stylesheet" href="../css/style-short_form.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>회원가입 완료</title>
</head>
<body>

    <!-- 헤더 -->
    <header id="header">
      <?php include "header.php"; ?>
		</header>

    <!-- 회원가입 완료 섹선 -->
    <section id="member_complete" class="short_form">

      <!-- 타이틀 -->
      <h2>가입해주셔서 감사합니다.</h2>

      <div class="btn">

        <!-- 로그인 하기 버튼 -->
        <input type="button" class="point-btn" value="로그인 하기" onclick="check_input()">

        <!-- 홈으로 가기 버튼 -->
        <input type="button" class="plus-btn" value="홈으로 가기" onclick="go_home()">
      </div>
    </section>

  <!-- javascript -->
  <script type="text/javascript">
		function check_input() {
			location.href = 'login_form.php';
		}
		function go_home() {
			location.href = 'index.php';
		}
	</script>
</body>
</html>