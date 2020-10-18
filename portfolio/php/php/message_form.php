<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-reset.css">
  <link rel="stylesheet" href="../css/style-flex.css">
  <link rel="stylesheet" href="../css/style-view_form.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>메세지 보내기</title>
</head>
<body>
  <!-- 전체를 감싸는 wrap -->
  <div class="wrap">

    <!-- 헤더 -->
    <header id="header">
      <?php include "header.php"; ?>
		</header>

    <!-- 메세지 사이드 -->
    <aside id="message_side">
      <!-- 받은 메세지 버튼 -->
      <input type="button" class="plus-btn" value="받은 메세지" onclick="location.href='message_box.php?mode=rv'">
      
      <!-- 보낸 메세지 버튼 -->
      <input type="button" class="plus-btn" value="보낸 메세지" onclick="location.href='message_box.php?mode=send'">

      <!-- 메세지 보내기 버튼 -->
      <?php
        if($userid) {
      ?>
      <input type="button" class="point-btn" value="메세지 보내기" onclick="location.href='message_form.php'">
      <?php
        }
        else {
      ?>
      <a href="javascript:alert('로그인 후 이용해주세요.')"><input type="button" class="point-btn" value="메세지 보내기"></a>
      <?php
        }
      ?>

    </aside>

    <!-- 메세지 보내기 섹선 -->
    <section id="message_form" class="view_form">

      <!-- 타이틀 -->
      <h2>메세지 보내기</h2>

      <!-- 메세지 폼 -->
      <form class="message_form" name="message_form" method="post" action="message_insert.php?send_id=<?=$userid?>">

        <!-- 폼박스 -->
        <div class="form_box">
        
          <div class="send_id">
            <p>보내는 사람</p>
            <p><?=$userid?></p>
          </div>

          <div class="rv_id">
            <p>받는 사람</p>
            <p>
              <input type="text" name="rv_id">
            </p>
          </div>

          <div class="subject">
            <p>제목</p>
            <p>
              <input type="text" name="subject"> 
            </p>
          </div>

          <div class="content">
            <p>내용</p>
            <p>
              <textarea name="content"></textarea>
            </p>
          </div>
        </div>

        <div class="btn">
          <!-- 메세지 보내기 버튼 -->
          <input type="button" class="plus-btn" value="보내기" onclick="check_input()">

          <!-- 다시쓰기 버튼 -->
          <input type="button" class="plus-btn" class="reset" value="다시쓰기" onclick="reset_form()">
        </div>
      </form>
    </section>
  </div>

  <!-- javascript -->
  <script type="text/javascript">
    // 입력된 값이 없다면 리턴
    function check_input() {
      if( !document.message_form.rv_id.value ) {
        alert( "받는 사람을 입력하세요." );
        document.message_form.rv_id.focus();
        return;
      }
      if( !document.message_form.subject.value ) {
        alert( "제목을 입력하세요." );
        document.message_form.subject.focus();
        return;
      }
      if( !document.message_form.content.value ) {
        alert( "내용을 입력하세요." );
        document.message_form.content.focus();
        return;
      }
      document.message_form.submit();
    }

    // 입력값 초기화
    function reset_form() {
      document.message_form.rv_id.value = "";
      document.message_form.subject.value = "";
      document.message_form.content.value = "";
      document.message_form.rv_id.focus();
      return;
    }
  </script>
</body>
</html>