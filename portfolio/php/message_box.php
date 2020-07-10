<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>쪽지함</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="wrap">
		<header class="header">
			<?php include "header.php"; ?>
		</header>
		<section class="section message_box">
      <div class="flex">
        <aside class="aside">
          <div class="btn flex">
            <input class="button" type="button" value="쪽지 보내기" onclick="location.href='message_form.php'">
            <input class="button" type="button" value="받은 쪽지함" onclick="location.href='message_box.php?mode=rv'">
            <input class="button" type="button" value="보낸 쪽지함" onclick="location.href='message_box.php?mode=send'">
          </div>
        </aside>
        <div class="form modify message_list">
          <?php
            if( isset($_GET["page"]) ) {
              $page = $_GET["page"];
            }
            else {
              $page = 1;
            }

            $mode = $_GET["mode"];
            if( $mode == "send" ) {
              echo "<h2>보낸 쪽지함</h2>";
            }
            else {
              echo "<h2>받은 쪽지함</h2>"; 
            }
          ?>
          <!-- <h2>보낸 쪽지함</h2> -->
          <ul class="ul">
            <li class="list flex tit">
              <p>번호</p>
              <?php
                if( $mode == "send" ) {
                  echo "<p>받은 날짜</p>";
                }
                else {
                  echo "<p>보낸 날짜</p>";
                }
              ?>
              <!-- <p>보낸 날짜</p> -->
              <?php
                if( $mode == "send" ) {
                  echo "<p>받은 사람</p>";
                }
                else {
                  echo "<p>보낸 사람</p>";
                }
              ?>
              <!-- <p>받은 사람</p> -->
              <p>제목</p>
            </li>


            <!-- 쪽지가 없을때 쪽지가 없습니다. 안내문구 띄우기 -->
            <?php
              $con = mysqli_connect('localhost', 'user1', '12345', 'newdb');

              if( $mode == "send" ) {
                $sql = "select * from messagebox where send_id='$userid' order by num desc";
              }
              else {
                $sql = "select * from messagebox where rv_id='$userid' order by num desc";
              }

              $result = mysqli_query($con, $sql);
              $total_record = mysqli_num_rows($result);
              $scale = 5;

              if( $total_record%$scale == 0 ) {
                $total_page = floor( $total_record/$scale );
              }
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
            <a href="message_view.php?mode=<?=$mode?>&num=<?=$num?>">
              <li class="list flex hover">
                <p><?=$number?></p>
                <p><?=$regist_day?></p>
                <p><?=$msg_id?></p>
                <p><?=$subject?></p>
              </li>
            </a>
            <?php
                $number--;
                }
              mysqli_close($con);
            ?>
          </ul>
          <div class="page flex">
            <?php
              if( $total_page>=2 && $page>=2 ) {
                $new_page = $page-1;
                echo "<p><a href='message_box.php?mode=$mode&page=$new_page'>이전</a></p>";
              }
              else {
                echo "&nbsp";
              }

              for( $i = 1; $i<=$total_page; $i++ ) {
                if( $page == $i ) {
                  echo "<p class='active'>$i</p>";
                }
                else {
                  echo "<p><a href='message_box.php?mode=$mode&page=$i'>$i</a></p>";
                }
              }
              
              if( $total_page>=2 && $page!=$total_page ) {
                $new_page = $page+1;
                echo "<p><a href='message_box.php?mode=$mode&page=$new_page'>다음</a></p>";
              }
              else {
                echo "&nbsp";
              }
            ?>
            <!-- <p><a href='message_box.php?mode=$mode&page=$new_page'>이전</a></p>
            <p>1</p>
            <p><a href='message_box.php?mode=$mode&page=$i'>2</a></p>
            <p><a href='message_box.php?mode=$mode&page=$new_page'>다음</a></p> -->





          </div>
        </div>

      </div>
		</section>
		<footer class="footer">
      <?php include "footer.php"; ?>
    </footer>
	</section>
</body>
</html>