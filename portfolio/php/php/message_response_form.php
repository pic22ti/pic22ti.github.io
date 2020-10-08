<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-reset.css">
  <link rel="stylesheet" href="../css/style-flex.css">
  <link rel="stylesheet" href="../css/style-view_form.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>답장 메세지 보내기</title>
  <style>
    /* 첫번째 요소에 너비 고정 */
    .view_form .form_box div p:first-of-type
    {
      width: 100px;
    }

    /* 각 요소 사이즈 */
    .view_form .form_box .send_id {
      width: 50%;
    }
    .view_form .form_box .rv_id {
      width: 50%;
    }
    .view_form .form_box .subject {
      width: 100%;
    }
    .view_form .form_box .content {
      width: 100%;
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




    <!-- 메세지 사이드 -->
    <aside id="message_side">
      
      <!-- 받은 메세지 버튼 -->
      <input type="button" class="point-btn" value="받은 메세지" onclick="location.href='message_box.php?mode=rv'">
      
      <!-- 보낸 메세지 버튼 -->
      <input type="button" class="plus-btn" value="보낸 메세지" onclick="location.href='message_box.php?mode=send'">

      <!-- 메세지 보내기 버튼 -->
      <?php
        if($userid) {
      ?>
      <input type="button" class="plus-btn" value="메세지 보내기" onclick="location.href='message_form.php'">
      <?php
        }
        else {
      ?>
      <a href="javascript:alert('로그인 후 이용해주세요.')"><input type="button" value="메세지 보내기"></a>
      <?php
        }
      ?>

    </aside>





    <!-- 답장 메세지 보내기 섹선 -->
    <section id="message_response_form" class="view_form">

      <!-- 타이틀 -->
      <h2>답장 메세지 보내기</h2>

      <?php
        // 메세지 고유번호 가져오기
        $num = $_GET["num"];

        // DB connect
        $con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
        $sql = "select * from messagebox where num=$num";
        $result = mysqli_query($con, $sql);

        $row = mysqli_fetch_array($result);

        $send_id = $row["send_id"];
        $rv_id = $row["rv_id"];
        $subject = $row["subject"];
        $content = $row["content"];

        $subject = "RE : ".$subject;
        $content = "> ".$content;
        $content = str_replace("\n", "\n>", $content);
        $content = "\n\n\n\n---------------------------------\n".$content;

        // ********************************* 개선사항: sql2를 사용하면 위 result와 같은 형태로 수정할 수 있을 거같음...
        $result2 = mysqli_query($con, "select name from member where id='$send_id'");
        $record = mysqli_fetch_array($result2);
        $send_name = $record["name"];

        // ********************************* 수정사항: DB 종료가 없음!!!!!!!!!! 확인 후 추가하기
        // DB close
      ?>







      <!-- 답장 메세지 폼 -->
      <form class="message_form" name="message_form" method="post" action="message_insert.php?send_id=<?=$userid?>">

        <!-- 폼박스 -->
        <div class="form_box minus-style">

          <!-- ********************************* 개선사항: 설명수정: 메세지를 보냈던 사람을 받는 사람으로 저장하는 것 -->
          <!-- 받는 사람 value값을 보내기 위해 숨긴 input -->
          <input type="hidden" name="rv_id" value="<?=$send_id?>">

          <div class="send_id">
            <p>보내는 사람</p>
            <p><?=$userid?></p>
          </div>

          <div class="rv_id">
            <p>받는 사람</p>
            <p><?=$send_id?></p>
          </div>

          <div class="subject">
            <p>제목</p>
            <p>
              <input type="text" name="subject" value="<?=$subject?>"> 
            </p>
          </div>

          <div class="content">
            <p>내용</p>
            <p>
              <textarea name="content"><?=$content?></textarea>
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
      
      




    <!-- 푸터 -->
    <footer id="footer">
      <?php include "footer.php"; ?>
    </footer>
  </div>





  <!-- 자바스크립트 -->
  <script>

    // 입력된 값이 없다면 리턴
    function check_input() {
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
      document.message_form.subject.value = "";
      document.message_form.content.value = "";
      document.message_form.subject.focus();
      return;
    }
  </script>
</body>
</html>