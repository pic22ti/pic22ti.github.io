<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>index</title>
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
        
        <div class="form modify message_view">
          <?php
            $mode = $_GET["mode"];
            $num = $_GET["num"];

            $con = mysqli_connect('localhost', 'user1', '12345', 'newdb');
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
              $result2 = mysqli_query($con, "select name from member where id='$rv_id");
            }
            else {
              $result2 = mysqli_query($con, "select name from member where id='$send_id"); 
            }

            $record = mysqli_fetch_array($result2);
            $msg_name = $record["name"];

            if( $mode == "send" ) {
              echo "<h2>보낸 쪽지 내용</h2>";
            }
            else {
              echo "<h2>받은 쪽지 내용</h2>"; 
            }
          ?>
            <!-- <h2>보낸 쪽지 내용</h2> -->
            <div class="flex">
              <p>보낸 사람 |</p>
              <p><?=$send_id?></p>
              <p>받은 사람 |</p>
              <p><?=$rv_id?></p>
              <p>보낸 날짜 |</p>
              <p><?=$regist_day?></p>
            </div>
            <div class="flex">
              <p>제목</p>
              <p class="text"><?=$subject?></p>
            </div>
            <div class="flex content">
              <p>내용</p>
              <p class="scroll"><?=$content?></p>
            </div>
            <div class="btn">
              <input class="button" type="button" value="답장 보내기" onclick="location.href='message_response_form.php?num=<?=$num?>'">
              <input class="button reset" type="button" value="쪽지 삭제" onclick="delete_msg()">
            </div>
        </div>
      </div>
		</section>

		<footer class="footer">
      <?php include "footer.php"; ?>
    </footer>
	</div>
  <script type="text/javascript">
    function delete_msg() {
      if( confirm( "쪽지를 삭제하시겠습니까?" ) == true ) {
        document.location.href = 'message_delete.php?num=<?=$num?>&mode=<?=$mode?>';
      }
      else {
        return;
      }
    }
  </script>
</body>
</html>