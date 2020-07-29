<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>게시글 수정</title>
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
            <input class="button" type="button" value="게시판 목록" onclick="location.href='board_list.php'">
            <input class="button" type="button" value="글쓰기" onclick="location.href='board_form.php'">
          </div>
        </aside>
        <?php
          $num = $_GET["num"];
          $page = $_GET["page"];

          $con = mysqli_connect('localhost', 'user1', '12345', 'newdb');
          $sql = "select * from board where num='$num'";
          $result = mysqli_query($con, $sql);
          $row = mysqli_fetch_array($result);

          $id = $row["id"];
          $subject = $row["subject"];
          $content = $row["content"];
          $file_name = $row["file_name"];

          mysqli_close($con);
        ?>
        <div class="form modify message_view board_form">
          <form name="board_form" method="post" action="board_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">
            <h2>글쓰기</h2>
            <div class="flex">
              <p>아이디</p>
              <p class="board_id"><?=$userid?></p>
            </div>
            <div class="flex subject">
              <p>제목</p>
              <p>
                <input type="text" name="subject" class="subject" value="<?=$subject?>">
              </p>
            </div>
            <div class="flex content">
              <p>내용</p>
              <p>
                <textarea name="content"><?=$content?></textarea>
              </p>
              <!-- <p class="scroll"></p> -->
            </div>
            <div class="flex file">
              <p>첨부 파일</p>
              <p><?=$file_name?>
                <!-- <input type="file" name="upfile"> -->
              </p>
            </div>
            <div class="btn">
              <input class="button" type="button" value="수정하기" onclick="check_input()">
              <input class="button reset" type="button" value="취소" onclick="history.go(-1)">
              <input class="button reset" type="button" value="삭제" onclick="delete_board()'">
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
    function delete_board() {
      if( confirm( "정말로 삭제하시겠습니까?" ) == true ) {
        document.location.href = 'board_delete.php?num=<?=$num?>&page=<?=$page?>';
      }
      else {
        return;
      }
    }
  </script>
</body>
</html>