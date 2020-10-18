<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-reset.css">
  <link rel="stylesheet" href="../css/style-flex.css">
  <link rel="stylesheet" href="../css/style-list_form.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>게시판 목록</title>
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

    <!-- 게시판 목록 섹선 -->
    <section id="board_list" class="list_form">

      <!-- 타이틀 -->
      <h2>게시판 목록</h2>

      <!-- 게시판 목록 -->
      <ul class="board_list">
        <li class="list sub">
          <p class="number">번호</p>
          <p class="subject">제목</p>
          <p class="file">첨부 파일</p>
          <p class="id">작성자</p>
          <p class="regist_day">등록일</p>
          <p class="views">조회</p>
        </li>

        <?php
          // page로 넘어온게 있는지 확인
          // 넘어온게 있으면 해당 페이지
          if( isset($_GET["page"]) ) {
            $page = $_GET["page"];
          }
          // 넘어온게 없으면 1페이지에서 시작
          else {
            $page = 1;
          }

          // DB connect
          $con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
          $sql = "select * from board order by num desc";
          $result = mysqli_query($con, $sql);
          $total_record = mysqli_num_rows($result);

          // 한 페이지에 보여줄 게시글 수를 설정
          $scale = 5;

          if( $total_record%$scale == 0 ) {
            $total_page = floor( $total_record/$scale );
          }
          else {
            $total_page = floor( $total_record/$scale)+1;
          }
          $start = ($page-1)*$scale;
          $number = $total_record-$start;

          for( $i = $start; $i<$start+$scale && $i<$total_record; $i++ ) {
            mysqli_data_seek($result, $i);
            $row = mysqli_fetch_array($result);
            
            $num = $row["num"];
            $id = $row["id"];
            $hit = $row["hit"];
            $subject = $row["subject"];
            $name = $row["name"];
            $regist_day = $row["regist_day"];
            $regist_day_short = substr($regist_day, 0, 10);

            if( $row["file_name"] ) {
              $file_image = "<img src='./img/file.gif' height='14px'/>";
            }
            else {
              $file_image = "";
            }
        ?>

        <!-- 게시글들을 목록으로 출력 -->
        <a href="board_view.php?num=<?=$num?>&page=<?=$page?>">
          <li class="list">
            <p class="number"><?=$number?></p>
            <p class="subject"><?=$subject?></p>
            <p class="file"><?=$file_image?></p>
            <p class="id"><?=$id?></p>
            <p class="regist_day"><?=$regist_day_short?></p>
            <p class="views"><?=$hit?></p>
          </li>
        </a>

        <?php
              $number--;
            } // for문 종료
            
            // 게시글이 없을 때 안내 문구 출력
            if( !$total_record ) {
              echo "<p class='no_item'>게시글이 없습니다.</p>";
            } 

          mysqli_close($con);
        ?>
        <!-- DB close -->

      </ul>

      <!-- 페이지 -->
      <div class="page">
        <?php
          // 전체 페이지와 현재 페이지가 2보다 클 때 '이전' 버튼 출력
          if( $total_page>=2 && $page>=2 ) {
            $new_page = $page-1;
            echo "<p><a href='board_list.php?page=$new_page'>이전</a></p>";
          }

          for( $i = 1; $i<=$total_page; $i++ ) {
            if( $page == $i ) {
              echo "<p class='active'>$i</p>";
            }
            else {
              echo "<p><a href='board_list.php?page=$i'>$i</a></p>";
            }
          }
          
          // 전체 페이지가 2보다 크고, 현재 페이지가 마지막 페이지가 아닐 때 '다음' 버튼 출력
          if( $total_page>=2 && $page!=$total_page ) {
            $new_page = $page+1;
            echo "<p><a href='board_list.php?page=$new_page'>다음</a></p>";
          }
        ?>
      </div>
    </section>
  </div>
</body>
</html>