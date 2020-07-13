<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>쪽지 내용</title>
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
            <input class="button" type="button" value="글쓰기" onclick="location.href='board_form.php'">
            <input class="button" type="button" value="게시판 목록" onclick="location.href='board_list.php'">
          </div>
        </aside>
        <div class="form modify message_view board_form">
          <form name="board_form" method="post" action="board_insert.php" enctype="multipart/form-data">
            <h2>글쓰기</h2>
            <div class="flex">
              <p>아이디</p>
              <!-- <p class="board_id">aaa</p> -->
              <p class="board_id"><?=$userid?></p>
            </div>
            <div class="flex subject">
              <p>제목</p>
              <p>
                <input type="text" name="subject" class="subject"> 
              </p>
              <!-- <p class="text">aaa</p> -->
            </div>
            <div class="flex content">
              <p>내용</p>
              <p>
                <textarea name="content"></textarea>
              </p>
              <!-- <p class="scroll"></p> -->
            </div>
            <div class="flex file">
              <p>첨부 파일</p>
              <p>
                <input type="file" name="upfile">
              </p>
            </div>
            <div class="btn">
              <input class="button" type="button" value="완료" onclick="check_input()">
              <input class="button" type="button" value="목록" onclick="location.href='board_list.php'">
            </div>
          </form>
        </div>
      </div>
		</section>

		<footer class="footer">
      <?php include "footer.php"; ?>
    </footer>
	</div>
  <script type="text/javascript">
    function check_input() {
      if( !document.board_form.subject.value ) {
        alert("제목을 입력하세요.");
        document.board_form.subject.focus();
        return;
      }
      if( !document.board_form.content.value ) {
        alert("내용을 입력하세요.");
        document.board_form.content.focus();
        return;
      }
      document.board_form.submit();
    }
  </script>
</body>
</html>