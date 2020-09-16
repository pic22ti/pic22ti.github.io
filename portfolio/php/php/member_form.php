<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-reset.css">
  <link rel="stylesheet" href="../css/style-flex.css">
  <link rel="stylesheet" href="../css/style-short_form.css">
  <title>회원가입</title>
</head>
<body>


    <!-- 헤더 -->
    <header id="header">
      <?php include "header.php"; ?>
		</header>






    <!-- 회원가입 섹선 -->
    <section id="member_form" class="short_form">

      <!-- 타이틀 -->
      <h2>회원가입</h2>

      <!-- 회원가입 폼 -->
      <form method="post" name="member_form" action="member_insert.php">
        
        <!-- 아이디 입력 -->
        <input type="text" id="chk_id1" name="id" placeholder="아이디">

        <!-- 아이디 중복 체크 버튼 -->
        <input type="button" class="check plus-btn" value="중복확인" onclick="check_id()">

        <!-- 아이디 중복 체크를 위한 보이지 않는 iframe -->
        <iframe src="" id="ifrm1" scrolling="no" frameborder="no" width="0" height="0" name="ifrm1"></iframe>

        <!-- 아이디 중복 체크를 위한 보이지 않는 input, 
             디폴트 : value="0" -->
        <input type="hidden" id="chk_id2" name="chk_id2" value="0">




        <!-- 비밀번호 입력 -->
        <input type="password" name="pass" placeholder="비밀번호">

        <!-- 비밀번호 확인 입력 -->
        <input type="password" name="pass_confirm" placeholder="비밀번호 확인">

        <!-- 이름 입력 -->
        <input type="text" name="name" placeholder="이름">

        <!-- 이메일 입력 -->
        <input type="text" name="email" placeholder="이메일">


        

        <div class="btn">

          <!-- 가입 버튼 -->
          <input type="button" class="plus-btn" value="가입하기" onclick="check_input()">

          <!-- 취소 버튼 -->
          <input type="button" class="plus-btn" class="reset" value="취소하기" onclick="reset_form()">
        </div>

      </form>

    </section>
      
      









  <!-- 자바스크립트 -->
	<script type="text/javascript">
		function check_input() {
			if( !document.member_form.id.value ) {
				alert( "아이디를 입력하세요." );
				document.member_form.id.focus();
				return;
			}
			if( !document.member_form.pass.value ) {
				alert( "비밀번호를 입력하세요." );
				document.member_form.pass.focus();
				return;
			}
			if( !document.member_form.pass_confirm.value ) {
				alert( "비밀번호 확인을 입력하세요." );
				document.member_form.pass_confirm.focus();
				return;
			}
			if( !document.member_form.name.value ) {
				alert( "이름을 입력하세요." );
				document.member_form.name.focus();
				return;
			}
			if( !document.member_form.email.value ) {
				alert( "이메일 입력하세요." );
				document.member_form.email.focus();
				return;
			}
			if( document.member_form.pass.value != document.member_form.pass_confirm.value ) {
				alert( "비밀번호가 일치하지 않습니다." );
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
			document.getElementById("chk_id2").value = 0;
			let id = document.getElementById("chk_id1").value;

			if( id == "" ){
				alert("아이디를 입력해주세요.");
				return;
			}
			ifrm1.location.href = "member_check_id.php?id="+document.member_form.id.value;
		}
	</script>
</body>
</html>