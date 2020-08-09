<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-reset.css">
  <link rel="stylesheet" href="../css/style-flex.css">
  <link rel="stylesheet" href="../css/style-view_form.css">
  <title>게시글 보기</title>
  <style>





    /* 첫번째 요소에 너비 고정 */
    .view_form .form_box .id p:first-of-type,
    .view_form .form_box .date p:first-of-type,
    .view_form .form_box .file p:first-of-type
    {
      width: 100px;
    }

    /* 각 요소 사이즈 */
    .view_form .form_box .id {
      width: 50%;
    }
    .view_form .form_box .date {
      width: 50%;
    }
    .view_form .form_box .subject {
      width: 100%;
      font-weight: bold;
    }
    .view_form .form_box .content {
      width: 100%;
    }
    .view_form .form_box .file {
      width: 100%;
    }


    /* 첨부파일 이름 너비 변경 */
    .view_form .form_box div p.file_name {
      width: calc(100% - 400px);
    }
    
    /* 첨부파일 저장 버튼 스타일 */
    .file a {
      display: inline-block;

      background-color: white;
      width: 60px;
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




    <?php
      $num = $_GET["num"];
      $page = $_GET["page"];

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

      $content = str_replace(" ", "&nbsp;", $content);
      $content = str_replace("\n", "<br>", $content);

      $new_hit = $hit+1;
      $sql = "update board set hit=$new_hit where num=$num";
      mysqli_query($con, $sql);
    ?>





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





    <!-- 게시글 보기 섹선 -->
    <section id="board_view" class="view_form">

      <!-- 타이틀 -->
      <h2>게시글 보기</h2>

      <!-- 폼박스 -->
      <div class="form_box minus-style">

        <!-- 글보기 -->
        <div class="id">
          <p>작성자</p>
          <p><?=$userid?></p>
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
      
      <div class="btn">

        <!-- 게시글 수정 버튼 -->
        <input type="button" class="plus-btn" value="수정" onclick="location.href='board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">

        <!-- 게시글 삭제 버튼 -->
          <input type="button" class="plus-btn" class="reset" value="삭제" onclick="delete_board()">
      </div>
      
    </section>
      
      




    <!-- 푸터 -->
    <footer id="footer">
      <?php include "footer.php"; ?>
    </footer>
  </div>





  <!-- 자바스크립트 -->
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