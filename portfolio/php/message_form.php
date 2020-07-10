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
        <div class="form modify">
          <!-- <form name="message_form" method="post" action="message_insert.php"> -->
          <form class="message_form" name="message_form" method="post" action="message_insert.php?send_id=<?=$userid?>">
            <h2>쪽지 보내기</h2>
            <div>
              <p>보내는 사람</p>
              <div class="id">
                <?=$userid?>
              </div>
            </div>
            <div>
              <p>받는 사람</p>
              <input type="text" name="rv_id">
            </div>
            <div>
              <p>제목</p>
              <input type="text" name="subject">
            </div>
            <div>
              <p>내용</p>
              <textarea class="textarea" name="content"></textarea>
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
      function reset_form() {
        document.message_form.rv_id.value = "";
        document.message_form.subject.value = "";
        document.message_form.content.value = "";
        document.message_form.rv_id.focus();
        return;
      }
    </script>
	</div>
</body>
</html>