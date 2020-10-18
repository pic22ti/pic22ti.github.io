<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-reset.css">
  <link rel="stylesheet" href="../css/style-flex.css">
  <link rel="stylesheet" href="../css/style-view_form.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>게시글 보기</title>
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

    <?php
    	// 게시글 고유번호와 
      // 목록으로 다시 돌아갈때 게시글이 있던 페이지로 돌아가기 위해 페이지도 받아온다
      $num = $_GET["num"];
      $page = $_GET["page"];

      // DB connect
      $con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
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

      // str_replace() 함수: 특수 문자를 HTML 특수 기호로 변환하기 위해 사용
      $content = str_replace(" ", "&nbsp;", $content);
      $content = str_replace("\n", "<br>", $content);

      $new_hit = $hit+1;
      $sql = "update board set hit=$new_hit where num=$num";
      mysqli_query($con, $sql);
      mysqli_close($con);
    ?>
    <!-- DB close -->

    <!-- 게시글 보기 섹선 -->
    <section id="board_view" class="view_form">

      <!-- 타이틀 -->
      <h2>게시글 보기</h2>

      <!-- 폼박스 -->
      <div class="form_box">

        <!-- 글보기 -->
        <div class="id">
          <p>작성자</p>
          <p><?=$id?></p>
        </div>

        <div class="date">
          <p>등록일</p>
          <p><?=$regist_day?></p>
        </div>

        <div class="subject">
          <p>
            <?=$subject?>
          </p>
        </div>

        <div class="content">
          <p>
            <?=$content?>
          </p>
        </div>

        <div class="file">
          <p>첨부 파일</p>
          <?php

            // 첨부된 파일이 있다면 '저장'버튼 노출
            if( $file_name ) {
              $real_name = $file_copied;
              $file_path = "./data/".$real_name;
              $file_size = filesize($file_path);
              echo ("
                <a href='board_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type' class='file_save_button'>저장</a>
                <p class='file_name'>$file_name ($file_size Byte)</p>
              ");
            }
            else {
              echo ("
                <p class='file_name'>(첨부된 파일이 없습니다.)</p>
              ");
            }
          ?>
        </div>
      </div>
      
      <!-- 작성자가 본인일때 수정/삭제 버튼 노출 -->
      <?php
        if($userid == $id) {
      ?>
        <div class="btn">
          <!-- 게시글 수정 버튼 -->
          <input type="button" class="plus-btn" value="수정" onclick="location.href='board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">
  
          <!-- 게시글 삭제 버튼 -->
          <input type="button" class="plus-btn" class="reset" value="삭제" onclick="delete_board()">
        </div>
      <?php
        }
      ?>
    </section>
  </div>

  <!-- javascript -->
  <script type="text/javascript">
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