<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-reset.css">
  <link rel="stylesheet" href="../css/style-flex.css">
  <link rel="stylesheet" href="../css/style-list_form.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>관리자 모드 - 게시판 관리</title>
  <style>
    /* 목록 요소 각 너비 지정 */
    .list_form .check {
      width: 10%;
    }
    .list_form .number {
      width: 10%;
    }
    .list_form .id {
      width: 10%;
    }
    .list_form .name {
      width: 10%;
    }
    .list_form .subject {
      width: 40%;
      text-align: left;
    }
    .list_form .file {
      width: 10%;
    }
    .list_form .regist_day {
      width: 10%;
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




    <!-- 관리자 모드 사이드 -->
    <aside id="board_side">

      <!-- 회원 관리 버튼 -->
      <input type="button" class="plus-btn" value="회원 관리" onclick="location.href='admin_member.php'">

      <!-- 게시판 관리 버튼 -->
      <input type="button" class="point-btn" value="게시판 관리" onclick="location.href='admin_board.php'">
      
    </aside>







    <!-- 게시판 관리 섹선 -->
    <section id="admin_board" class="list_form">

        <!-- 게시판 관리 타이틀 -->
        <h2>게시판 관리</h2>

        <!-- 게시판 관리 리스트 -->
        <ul class="board_list">

          <!-- 리스트 타이틀 -->
          <li class="list sub plus-btn">
            <p class="check">선택</p>
            <p class="number">번호</p>
            <p class="id">아이디</p>
            <p class="name">이름</p>
            <p class="subject">제목</p>
            <p class="file">첨부 파일</p>
            <p class="regist_day">작성일</p>
          </li>

          <!-- 게시글 리스트를 묶는 폼 -->
          <form method="post" action="admin_board_delete.php">




          <!-- 게시글 데이터 리스트 불러오기 -->
          <!-- DB connect -->
          <?php
            $con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
            $sql = "select * from board order by num desc";
            $result = mysqli_query($con, $sql);
            $total_record = mysqli_num_rows($result);

            // 전체 게시글 수
            $number = $total_record;

            // 게시글들의 필요한 데이터를 가져오기
            while( $row = mysqli_fetch_array($result) ) {
              $num = $row["num"];
              $id = $row["id"];
              $name = $row["name"];
              $subject = $row["subject"];
              $file_name = $row["file_name"];
              $regist_day = $row["regist_day"];
              $regist_day_short = substr($regist_day, 0, 10);
          ?>




            <!-- 게시글들을 목록으로 출력 -->
            <li class="list">
              <p class="check">
                <label>
                  <input type="checkbox" name="item[]" value="<?=$num?>">
                  <span class="checkmark"></span>
                </label>
              </p>
              <p class="number"><?=$number?></p>
              <p class="id"><?=$id?></p>
              <p class="name"><?=$name?></p>
              <p class="subject"><?=$subject?></p>
              <p class="file">
                <?=$file_name?>
                <?php
                  // 첨부파일이 없을 때 출력됨
                  if(!$file_name) {
                    echo "(파일 없음)";
                  }
                ?>
              </p>
              <p class="regist_day"><?=$regist_day_short?></p>
            </li>



          
          <?php
              $number--;
            }
            // while문 종료

            mysqli_close($con);
          ?>
          <!-- DB close -->




            <!-- 게시글 삭제 버튼 -->
            <div class="btn">
              <!-- <input type="button" class="plus-btn" value="선택한 글 삭제" onclick="funcdelete()"> -->
              <button type="submit" class="plus-btn">선택한 글 삭제</button>
            </div>
          </form>
        </ul>

    </section>
      
      




    <!-- 푸터 -->
    <footer id="footer">
      <?php include "footer.php"; ?>
    </footer>
  </div>





  <!-- 자바스크립트 -->
  <!-- <script type="text/javascript">
    function check_input() {

      수정해야함**********************

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
  </script> -->
</body>
</html>