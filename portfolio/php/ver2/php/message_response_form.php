<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>답장 보내기</title>
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
            <input class="button" type="button" value="받은 쪽지함" onclick="location.href='message_box.php?mode=rv'">
            <input class="button" type="button" value="보낸 쪽지함" onclick="location.href='message_box.php?mode=send'">
            <input class="button" type="button" value="쪽지 보내기" onclick="location.href='message_form.php'">
          </div>
        </aside>
        <div class="form modify">
          <?php
            $num = $_GET["num"];

            $con = mysqli_connect('localhost', 'user1', '12345', 'newdb');
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

            $result2 = mysqli_query($con, "select name from member where id='$send_id'");
            $record = mysqli_fetch_array($result2);
            $send_name = $record["name"];
          ?>
          <form class="message_form" name="message_form" method="post" action="message_insert.php?send_id=<?=$userid?>">
            <h2>답장 보내기</h2>
            <input type="hidden" name="rv_id" value="<?=$send_id?>">
            <div>
              <p>보내는 사람</p>
              <div class="id">
                <?=$userid?>
              </div>
            </div>
            <div>
              <p>받는 사람</p>
              <div class="id">
                <?=$send_id?>
              </div>
            </div>
            <div>
              <p>제목</p>
              <input type="text" name="subject" value="<?=$subject?>">
            </div>
            <div>
              <p>내용</p>
              <textarea class="textarea" name="content"><?=$content?></textarea>
            </div>
            <div class="btn flex">
              <input class="button" type="button" value="보내기" onclick="check_input()">
              <input class="button reset" type="button" value="다시쓰기" onclick="reset_form()">
            </div>
          </form>
        </div>
      </div>
		</section>

		<footer class="footer">
      <?php include "footer.php"; ?>
    </footer>
    <script>
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
      function reset_form() {
        document.message_form.subject.value = "";
        document.message_form.content.value = "";
        document.message_form.subject.focus();
        return;
      }
    </script>
	</div>
</body>
</html>