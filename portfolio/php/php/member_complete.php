<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-reset.css">
  <link rel="stylesheet" href="../css/style-flex.css">
  <link rel="stylesheet" href="../css/style-short_form.css">
  <title>회원가입 완료</title>
  <style>
    h3 {
      padding-bottom: 30px;
    }
  </style>
</head>
<body>
  <!-- 전체를 감싸는 wrap -->
  <div class="wrap">

    <!-- 헤더 -->
    <header id="header">
      <?php include "header.php"; ?>
		</header>




 

    <!-- 회원가입 완료 섹선 -->
    <section id="member_complete">

      <!-- 타이틀 -->
      <h3>가입해주셔서 감사합니다.</h3>

      <div class="btn">

        <!-- 로그인 하기 버튼 -->
        <input type="button" class="plus-btn" value="로그인 하기" onclick="check_input()">

        <!-- 홈으로 가기 버튼 -->
        <input type="button" class="plus-btn" value="홈으로 가기" onclick="go_home()">
      </div>

    </section>
      
      




    <!-- 푸터 -->
    <footer id="footer">
      <!-- <?php include "footer.php"; ?> -->
    </footer>
  </div>





  <!-- 자바스크립트 -->
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