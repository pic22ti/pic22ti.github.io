<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>게시글 보기</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrap">
		<header class="header">
      <?php include "header.php"; ?>
		</header>
    <?php
      $num = $_GET["num"];
      $page = $_GET["page"];

      $con = mysqli_connect('localhost', 'user1', '12345', 'newdb');
      $sql = "select * from board where num=$num";
      $result = mysqli_query($con, $sql);

      $row = mysqli_fetch_array($result);

      $id = $row["id"];
      $name = $row["name"];
      $regist_day = $row["regist_day"];
      $subject = $row["subject"];
      $content = $row["content"];
      $file_name = $row["file_name"];
      $file_type = $row["file_type"];
      $file_copied = $row["file_copied"];
      $hit = $row["hit"];

      $content = str_replace(" ", "&nbsp;", $content);
      $content = str_replace("\n", "<br>", $content);

      $new_hit = $hit+1;
      $sql = "update board set hit=$new_hit where num=$num";
      mysqli_query($con, $sql);
    ?>
		<section class="section message_box">
      <div class="flex">
        <aside class="aside">
          <div class="btn flex">
            <input class="button" type="button" value="게시판 목록" onclick="location.href='board_list.php?page=<?=$page?>'">
            <input class="button" type="button" value="글쓰기" onclick="location.href='board_form.php'">
          </div>
        </aside>
        <div class="form modify message_view">
          <h2>게시글 보기</h2>
          <div class="flex">
            <p>작성자 |</p>
            <p><?=$id?></p>
            <p></p>
            <p></p>
            <p>등록일 |</p>
            <p><?=$regist_day?></p>
          </div>
          <div class="flex">
            <p>제목</p>
            <p class="text"><?=$subject?></p>
          </div>
          <div class="flex content">
            <p>내용</p>
            <p class="scroll">
              <?=$content?>
            </p>
          </div>
          <div class="flex attach_file">
          <?php
            if( $file_name ) {
              $real_name = $file_copied;
              $file_path = "./data/".$real_name;
              $file_size = filesize($file_path);
              echo ("
                <p>첨부 파일</p>
                <a href='board_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type' class='btn_save'>저장</a>
                <p class='file_text'>$file_name ($file_size Byte)</p>
              ");
            }
            else {
              echo ("
                <p>첨부 파일</p>
                <p class='file_text'>(첨부된 파일이 없습니다.)</p>
              ");
            }
          ?>
          </div>
          <div class="btn">
            <input class="button" type="button" value="수정" onclick="location.href='board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">
            <input class="button reset" type="button" value="삭제" onclick="delete_board()">
          </div>
        </div>
      </div>
		</section>

		<footer class="footer">
      <?php include "footer.php"; ?>
    </footer>
	</div>
  <script type="text/javascript">
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