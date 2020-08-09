<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-reset.css">
  <link rel="stylesheet" href="../css/style-flex.css">
  <link rel="stylesheet" href="../css/style-view_form.css">
  <title>게시글 수정</title>
  <style>



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
      <input type="button" class="plus-btn" value="글쓰기" onclick="location.href='board_form.php'">
      <?php
        }
        else {
      ?>
      <a href="javascript:alert('로그인 후 이용해주세요.')"><input type="button" value="글쓰기"></a>
      <?php
        }
      ?>
    </aside>




    <!-- 게시글 수정 섹선 -->
    <section id="board_modify_form" class="view_form">

      <!-- 타이틀 -->
      <h2>게시글 수정</h2>





      <?php
        $num = $_GET["num"];
        $page = $_GET["page"];

        $con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
        $sql = "select * from board where num='$num'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $id = $row["id"];
        $subject = $row["subject"];
        $content = $row["content"];
        $file_name = $row["file_name"];

        mysqli_close($con);
      ?>






      <!-- 글쓰기 폼 -->
      <form name="board_form" method="post" action="board_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">

        <!-- 폼박스 -->
        <div class="form_box minus-style">
        
          <div class="id">
            <p>아이디</p>
            <p><?=$userid?></p>
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

          <div class="file">
            <p>첨부 파일</p>
            <p>
              <label for="upfile">파일 선택</label>
              <input type="file" id="upfile" name="upfile">
              <?=$file_name?>
            </p>
          </div>
        </div>
      
        <div class="btn">

          <!-- 게시글 수정 버튼 -->
          <input type="button" class="plus-btn" value="수정" onclick="check_input()">

          <!-- 취소 버튼 -->
          <input type="button" class="plus-btn" class="reset" value="취소" onclick="history.go(-1)">

          <!-- 게시글 삭제 버튼 -->
          <input type="button" class="plus-btn" class="reset" value="삭제" onclick="delete_board()">
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