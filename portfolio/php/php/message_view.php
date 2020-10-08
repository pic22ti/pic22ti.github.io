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
  <style>
    /* 첫번째 요소에 너비 고정 */
    .view_form .form_box .send_id p:first-of-type,
    .view_form .form_box .rv_id p:first-of-type,
    .view_form .form_box .date p:first-of-type
    {
      width: 100px;
    }

    /* 각 요소 사이즈 */
    .view_form .form_box .send_id {
      width: calc(100% / 3);
    }
    .view_form .form_box .rv_id {
      width: calc(100% / 3);
    }
    .view_form .form_box .date {
      width: calc(100% / 3);
    }
    .view_form .form_box .subject {
      width: 100%;
      font-weight: bold;
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

      <!-- ************************* 수정사항: 중복되는 부분 최소화하기
      message_box.php와 message_view.php 둘다  -->
      <?php
        $mode = $_GET["mode"];
        if( $mode == "send" ) {
      ?>
      <!-- 받은 메세지 버튼 -->
      <input type="button" class="plus-btn" value="받은 메세지" onclick="location.href='message_box.php?mode=rv'">
      
      <!-- 보낸 메세지 버튼 -->
      <input type="button" class="point-btn" value="보낸 메세지" onclick="location.href='message_box.php?mode=send'">
      <?php
        }
        else {
      ?>
      <!-- 받은 메세지 버튼 -->
      <input type="button" class="point-btn" value="받은 메세지" onclick="location.href='message_box.php?mode=rv'">
      
      <!-- 보낸 메세지 버튼 -->
      <input type="button" class="plus-btn" value="보낸 메세지" onclick="location.href='message_box.php?mode=send'">
      <?php
        }
      ?>




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

        // **************************** 수정사항: 데이터 종료 없음!!!!!!!!!!!!!
        // DB close 
      ?>







      <!-- 폼박스 -->
      <div class="form_box minus-style">

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
      
      




    <!-- 푸터 -->
    <footer id="footer">
      <?php include "footer.php"; ?>
    </footer>
  </div>





  <!-- 자바스크립트 -->
  <script type="text/javascript">
    function delete_msg() {
      if( confirm( "메세지를 삭제하시겠습니까?" ) == true ) {
        document.location.href = 'message_delete.php?num=<?=$num?>&mode=<?=$mode?>';
      }
      else {
        return;
      }
    }
  </script>
</body>
</html>