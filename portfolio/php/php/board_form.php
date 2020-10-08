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
  <style>
    /* 첫번째 요소에 너비 고정 */
    .view_form .form_box div p:first-of-type {
      width: 100px;
    }

    /* 각 요소 사이즈 */
    .view_form .form_box .id {
      width: 100%;
    }
    .view_form .form_box .subject {
      width: 100%;
    }
    .view_form .form_box .content {
      width: 100%;
    }
    .view_form .form_box .file {
      width: 100%;
    }

    /* 나중에 정리.. */
    /* *********************** 수정사항: 파일 버튼 스타일 지정인듯 */
    .view_form .form_box .file p:last-of-type
    {
      padding: 0px;
      padding-left: 5px;
      padding-top: 9px;
    }

    .file label {
      cursor: pointer;
      display: inline-block;
      background-color: white;
      width: 80px;
      height: 25px;
      padding: 5px;
      border: 1px solid #ddd;

      line-height: 13px;
      text-align: center;
    }
  </style>
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
      <input type="button" class="plus-btn" value="게시판 목록" onclick="location.href='board_list.php'">

      <!-- 게시글 쓰기 버튼 -->
      <?php
        if($userid) {
      ?>
      <input type="button" class="point-btn" value="게시글 쓰기" onclick="location.href='board_form.php'">
      <?php
        }
        else {
      ?>
      <a href="javascript:alert('로그인 후 이용해주세요.')"><input type="button" value="글쓰기"></a>
      <?php
        }
      ?>
    </aside>





    <!-- 게시글 쓰기 섹선 -->
    <section id="board_form" class="view_form">

      <!-- 타이틀 -->
      <h2>게시글 쓰기</h2>

      <!-- 글쓰기 폼 -->
      <form name="board_form" method="post" action="board_insert.php" enctype="multipart/form-data">

        <!-- 폼박스 -->
        <div class="form_box minus-style">
          
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
      
        <div class="btn">

          <!-- 글쓰기 완료 버튼 -->
          <input type="button" class="plus-btn" value="완료" onclick="check_input()">

          <!-- 게시글 목록 버튼 -->
          <input type="button" class="plus-btn" value="목록" onclick="location.href='board_list.php'">
        </div>
      
      </form>
    </section>
      
      




    <!-- 푸터 -->
    <footer id="footer">
      <?php include "footer.php"; ?>
    </footer>
  </div>





  <!-- 자바스크립트 -->
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