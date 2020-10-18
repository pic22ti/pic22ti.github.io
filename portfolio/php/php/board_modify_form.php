<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-reset.css">
  <link rel="stylesheet" href="../css/style-flex.css">
  <link rel="stylesheet" href="../css/style-view_form.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>게시글 수정</title>
</head>
<body>
  <!-- 전체를 감싸는 wrap -->
  <div class="wrap">

    <!-- 헤더 -->
    <header id="header">
      <?php include "header.php"; ?>
		</header>

    <!-- 게시판 사이드 -->
    <aside id="board_side">
      <!-- 게시판 목록 버튼 -->
      <input type="button" class="point-btn" value="게시판 목록" onclick="location.href='board_list.php'">

      <!-- 게시글 쓰기 버튼 -->
      <input type="button" class="plus-btn" value="게시글 쓰기" onclick="location.href='board_form.php'">
    </aside>

    <!-- 게시글 수정 섹선 -->
    <section id="board_modify_form" class="view_form">

      <!-- 타이틀 -->
      <h2>게시글 수정</h2>

      <?php
        // 게시글 정보 받아오기
        $num = $_GET["num"];
        $page = $_GET["page"];

        // DB connect
        $con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
        $sql = "select * from board where num='$num'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $id = $row["id"];
        $subject = $row["subject"];
        $content = $row["content"];
        $file_name = $row["file_name"];

        mysqli_close($con);
        // DB close
      ?>

      <!-- 글쓰기 폼 -->
      <form name="board_form" method="post" action="board_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">

        <!-- 폼박스 -->
        <div class="form_box">
        
          <div class="id">
            <p>작성자</p>
            <p><?=$id?></p>
          </div>

          <div class="subject">
            <p>제목</p>
            <p>
              <input type="text" name="subject" value="<?=$subject?>"> 
            </p>
          </div>

          <div class="content">
            <p>내용</p>
            <p>
              <textarea name="content"><?=$content?></textarea>
            </p>
          </div>

          <!-- 첨부파일은 수정이 안되고 새로 등록하는 것만 가능 -->
          <div class="file">
            <p>첨부 파일</p>
            <p>
              <input type="file" name="upfile">
              <?=$file_name?>
            </p>
          </div>
        </div>
      
        <div class="btn">
          <!-- 게시글 수정 버튼 -->
          <input type="button" class="plus-btn" value="등록" onclick="check_input()">

          <!-- 취소 버튼 -->
          <input type="button" class="plus-btn" class="reset" value="취소" onclick="history.go(-1)">

          <!-- 게시글 삭제 버튼 -->
          <input type="button" class="plus-btn" class="reset" value="삭제" onclick="delete_board()">
        </div>
      </form>
    </section>
  </div>

  <!-- javascript -->
  <script type="text/javascript">
    // 입력된 값이 없다면 리턴
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

    // 정말로 삭제할건지 확인하기
    function delete_board() {
      if( confirm( "정말로 삭제하시겠습니까?" ) == true ) {
        location.href = 'board_delete.php?num=<?=$num?>&page=<?=$page?>';
      }
      else {
        return;
      }
    }
  </script>
</body>
</html>