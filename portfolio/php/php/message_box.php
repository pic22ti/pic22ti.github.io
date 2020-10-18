<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-reset.css">
  <link rel="stylesheet" href="../css/style-flex.css">
  <link rel="stylesheet" href="../css/style-list_form.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>메세지 박스</title>
</head>
<body>
  <!-- 전체를 감싸는 wrap -->
  <div class="wrap">

    <!-- 헤더 -->
    <header id="header">
      <?php include "header.php"; ?>
		</header>

      <?php
        // page로 넘어온게 있는지 확인
        // 처음에는 버튼 클릭해서 오면 mode만 넘어오고 page는 넘어온게 없음

        // 넘어온게 있으면 해당 페이지
        if( isset($_GET["page"]) ) {
          $page = $_GET["page"];
        }
        // 넘어온게 없으면 1페이지에서 시작
        else {
          $page = 1;
        }
      ?>

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

    <!-- 메세지 목록 섹선 -->
    <section id="message_box" class="list_form">

      <!-- 타이틀 -->
      <?php
        if( $mode == "send" ) {
          echo "<h2>보낸 메세지</h2>";
        }
        else {
          echo "<h2>받은 메세지</h2>";
        }
      ?>

      <!-- 메세지 목록 -->
      <ul class="message_list">
        <li class="list sub">
          <p class="number">번호</p>

          <?php
            if( $mode == "send" ) {
              echo "
                <p class='regist_day'>받은 날짜</p>
                <p class='id'>받은 사람</p>
              ";
            }
            else {
              echo "
                <p class='regist_day'>보낸 날짜</p>
                <p class='id'>보낸 사람</p>
              ";
            }
          ?>

          <p class="subject">제목</p>
        </li>

        <!-- 메세지 데이터 가져오기 -->
        <!-- DB connect -->
        <?php
          $con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');

          if( $mode == "send" ) {
            $sql = "select * from messagebox where send_id='$userid' order by num desc";
          }
          else {
            $sql = "select * from messagebox where rv_id='$userid' order by num desc";
          }

          $result = mysqli_query($con, $sql);
          $total_record = mysqli_num_rows($result);

          // 한 페이지에 보여줄 게시글 수를 설정
          $scale = 5;

          // 글 수가 5의 배수일때
          // floor()함수 : 소수점은 버리는 함수
          if( $total_record%$scale == 0 ) {
            $total_page = floor( $total_record/$scale );
          }
          // 글 수가 5의 배수일때는 +1 페이지
          else {
            $total_page = floor( $total_record/$scale)+1;
          }
          $start = ($page-1)*$scale;
          $number = $total_record-$start;

          for( $i = $start; $i<$start+$scale && $i<$total_record; $i++ ) {
            mysqli_data_seek($result, $i);
            $row = mysqli_fetch_array($result);
            
            $num = $row["num"];
            $subject = $row["subject"];
            $regist_day = $row["regist_day"];
            $regist_day_short = substr($regist_day, 0, 10);

            if( $mode == "send" ) {
              $msg_id = $row["rv_id"];
            }
            else {
              $msg_id = $row["send_id"];
            }

            $result2 = mysqli_query($con, "select name from member where id='$msg_id'");
            $record = mysqli_fetch_array($result2);
            $msg_name = $record["name"];
        ?>

        <!-- 메세지들을 목록으로 출력 -->
        <a href="message_view.php?mode=<?=$mode?>&num=<?=$num?>">
          <li class="list">
            <p class="number"><?=$number?></p>
            <p class="regist_day"><?=$regist_day_short?></p>
            <p class="id"><?=$msg_id?></p>
            <p class="subject"><?=$subject?></p>
          </li>
        </a>

        <?php
              $number--;
            } // for문 종료

            // 메세지가 없을 때 안내 문구 출력
            if( !$total_record ) {
              if( $mode == "send" ) {
                echo "<p class='no_item'>보낸 메세지가 없습니다.</p>";
              }
              else {
                echo "<p class='no_item'>받은 메세지가 없습니다.</p>";
              }
            } 

          mysqli_close($con);
        ?>
        <!-- DB close -->

      </ul>

      <!-- 페이지 -->
      <div class="page">
        <?php
          // 전체 페이지와 현재 페이지가 2보다 클 때 '이전' 버튼 출력
          if( $total_page>=2 && $page>=2 ) {
            $new_page = $page-1;
            echo "<p><a href='message_box.php?mode=$mode&page=$new_page'>이전</a></p>";
          }

          for( $i = 1; $i<=$total_page; $i++ ) {
            if( $page == $i ) {
              echo "<p class='active'>$i</p>";
            }
            else {
              echo "<p><a href='message_box.php?mode=$mode&page=$i'>$i</a></p>";
            }
          }
          
          // 전체 페이지가 2보다 크고, 현재 페이지가 마지막 페이지가 아닐 때 '다음' 버튼 출력
          if( $total_page>=2 && $page!=$total_page ) {
            $new_page = $page+1;
            echo "<p><a href='message_box.php?mode=$mode&page=$new_page'>다음</a></p>";
          }
        ?>
      </div>
    </section>
  </div>
</body>
</html>