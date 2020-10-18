<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-reset.css">
  <link rel="stylesheet" href="../css/style-flex.css">
  <link rel="stylesheet" href="../css/style-view_form.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>게시글 쓰기</title>
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

    <!-- 게시글 쓰기 섹선 -->
    <section id="board_form" class="view_form">

      <!-- 타이틀 -->
      <h2>게시글 쓰기</h2>

      <!-- 글쓰기 폼 -->
      <form name="board_form" method="post" action="board_insert.php" enctype="multipart/form-data">

        <!-- 폼박스 -->
        <div class="form_box">
          <div class="id">
            <p>작성자</p>
            <p><?=$userid?></p>
          </div>

          <div class="subject">
            <p>제목</p>
            <p>
              <input type="text" name="subject"> 
            </p>
          </div>

          <div class="content">
            <p>내용</p>
            <p>
              <textarea name="content"></textarea>
            </p>
          </div>

          <div class="file">
            <p>첨부 파일</p>
            <p>
              <input type="file" name="upfile">
              <?=$file_name?>
            </p>
          </div>
        </div>
      
        <!-- 하단 우측 버튼 -->
        <div class="btn">
          <!-- 글쓰기 완료 버튼 -->
          <input type="button" class="plus-btn" value="등록" onclick="check_input()">

          <!-- 게시글 목록 버튼 -->
          <input type="button" class="plus-btn" value="목록" onclick="location.href='board_list.php'">
        </div>
      </form>
    </section>
  </div>

  <!-- javascript -->
  <script type="text/javascript">
    // 입력된 내용이 없다면 리턴하는 함수
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