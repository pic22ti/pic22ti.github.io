<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-reset.css">
  <link rel="stylesheet" href="../css/style-flex.css">
  <link rel="stylesheet" href="../css/style-short_form.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>회원 정보 수정</title>
</head>
<body>
  <!-- 전체를 감싸는 wrap -->
  <div class="wrap">

    <!-- 헤더 -->
    <header id="header">
      <?php include "header.php"; ?>
		</header>

    <!-- 회원 정보 수정 섹선 -->
    <section id="member_form" class="short_form">

      <!-- 회원 정보 데이터 불러오기 -->
      <!-- DB connect -->
      <?php
        $con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
        $sql = "select * from member where id='$userid'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $pass = $row["pass"];
        $name = $row["name"];
        $email = $row["email"];

        mysqli_close($con);
      ?>
      <!-- DB close -->

      <!-- 타이틀 -->
      <h2>회원 정보 수정</h2>

      <!-- 회원 정보 수정 폼 -->
      <form method="post" name="member_form" action="member_modify.php?id=<?=$userid?>">
        
        <!-- 아이디 불러오기 -->
        <div class="id">
          <p class="call_id"><?=$userid?></p>
        </div>

        <!-- 비밀번호 수정 -->
        <input type="password" name="pass" value="<?=$pass?>">

        <!-- 비밀번호 확인 수정 -->
        <input type="password" name="pass_confirm" value="<?=$pass?>">

        <!-- 이름 수정 -->
        <input type="text" name="name" value="<?=$name?>">

        <!-- 이메일 수정 -->
        <input type="text" name="email" value="<?=$email?>">

        <div class="btn">

          <!-- 수정 저장 버튼 -->
          <input type="button" class="point-btn check" value="저장하기" onclick="check_input()">

          <!-- 취소 버튼 -->
          <input type="button" class="plus-btn" class="reset" value="취소하기" onclick="reset_form()">

          <!-- 회원탈퇴 버튼 -->
          <input type="button" class="plus-btn" value="회원탈퇴" onclick="delete_id()">
        </div>
      </form>
    </section>
  </div>

  <!-- javascript -->
  <script type="text/javascript">
    // 입력된 값이 없다면 리턴
		function check_input() {
			if( !document.member_form.pass.value ) {
				alert( "비밀번호를 입력하세요" );
				document.member_form.pass.focus();
				return;
			}
			if( !document.member_form.pass_confirm.value ) {
				alert( "비밀번호 확인을 입력하세요" );
				document.member_form.pass_confirm.focus();
				return;
			}
			if( !document.member_form.name.value ) {
				alert( "이름을 입력하세요" );
				document.member_form.name.focus();
				return;
			}
			if( !document.member_form.email.value ) {
				alert( "이메일 입력하세요" );
				document.member_form.email.focus();
				return;
			}
			if( document.member_form.pass.value != document.member_form.pass_confirm.value ) {
				alert( "비밀번호가 일치하지 않습니다" );
				document.member_form.pass.focus();
				document.member_form.pass.select();
				return;
			}
			document.member_form.submit();
    }
    
    // 입력값 초기화
		function reset_form() {
			document.member_form.pass.value = "";
			document.member_form.pass_confirm.value = "";
			document.member_form.name.value = "";
			document.member_form.email.value = "";
			document.member_form.id.focus();
			return;
		}
    
    // 정말로 탈퇴할건지 확인하기
		function delete_id() {
			if( confirm( "정말로 탈퇴하시겠습니까?" ) == true ){
				location.href = 'delete.php';
			}
			else {
				return;
			}
		}
	</script>
</body>
</html>