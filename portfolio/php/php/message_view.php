<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-reset.css">
  <link rel="stylesheet" href="../css/style-flex.css">
  <link rel="stylesheet" href="../css/style-view_form.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>메세지 보기</title>
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

      <?php
        // 들어온 모드에 따라 버튼 스타일 변경
        $mode = $_GET["mode"];

        if( $mode == "send" ) {
          $rv_message_style = "plus-btn";
          $send_message_style = "point-btn";
        }
        else {
          $rv_message_style = "point-btn";
          $send_message_style = "plus-btn";
        }
      ?>
      
      <!-- 받은 메세지 버튼 -->
      <input type="button" class="<?=$rv_message_style?>" value="받은 메세지" onclick="location.href='message_box.php?mode=rv'">
      
      <!-- 보낸 메세지 버튼 -->
      <input type="button" class="<?=$send_message_style?>" value="보낸 메세지" onclick="location.href='message_box.php?mode=send'">

      <!-- 메세지 보내기 버튼 -->
      <input type="button" class="plus-btn" value="메세지 보내기" onclick="location.href='message_form.php'">
    </aside>

    <!-- 메세지 보기 섹선 -->
    <section id="message_view" class="view_form">

      <!-- 타이틀 -->
      <?php
        // 메세지 고유번호 받아오기
        $num = $_GET["num"];

        // DB connect
        $con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
        $sql = "select * from messagebox where num=$num";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $send_id = $row["send_id"];
        $rv_id = $row["rv_id"];
        $regist_day = $row["regist_day"];
        $subject = $row["subject"];
        $content = $row["content"];

        $content = str_replace(" ", "&nbsp;", $content);
        $content = str_replace("\n", "<br>", $content);

        if( $mode == "send" ) {
          $result2 = mysqli_query($con, "select name from member where id='$rv_id'");
        }
        else {
          $result2 = mysqli_query($con, "select name from member where id='$send_id'"); 
        }

        $record = mysqli_fetch_array($result2);
        $msg_name = $record["name"];

        if( $mode == "send" ) {
          echo "<h2>보낸 메세지 내용</h2>";
        }
        else {
          echo "<h2>받은 메세지 내용</h2>"; 
        }

        mysqli_close($con);
        // DB close 
      ?>

      <!-- 폼박스 -->
      <div class="form_box">

        <!-- 메세지 내용 보기 -->
        <div class="send_id">
          <p>보낸 사람</p>
          <p><?=$send_id?></p>
        </div>

        <div class="rv_id">
          <p>받은 사람</p>
          <p><?=$rv_id?></p>
        </div>
        
        <div class="date">
          <p>보낸 날짜</p>
          <p><?=$regist_day?></p>
        </div>

        <div class="subject">
          <p>
            <?=$subject?>
          </p>
        </div>

        <div class="content">
          <p>
            <?=$content?>
          </p>
        </div>
      </div>

      <div class="btn">

        <!-- 답장 보내기 버튼 -->
        <?php
          if( $mode == "rv" ) {
        ?>
        <input type="button" class="plus-btn" value="답장 보내기" onclick="location.href='message_response_form.php?num=<?=$num?>'">
        <?php
          } // if문 종료
        ?>

        <!-- 메세지 삭제 버튼 -->
        <input type="button" class="plus-btn" class="reset" value="메세지 삭제" onclick="delete_msg()">
      </div>
    </section>
  </div>

  <!-- javascript -->
  <script type="text/javascript">
    function delete_msg() {
      if( confirm( "메세지를 삭제하시겠습니까?" ) == true ) {
        location.href = 'message_delete.php?num=<?=$num?>&mode=<?=$mode?>';
      }
      else {
        return;
      }
    }
  </script>
</body>
</html>