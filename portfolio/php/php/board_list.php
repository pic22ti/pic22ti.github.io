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
  <style>


    /* 목록 요소 각 너비 지정 */
    .list_form .number {
      width: 5%;
    }
    .list_form .subject {
      width: 60%;
      text-align: left;
    }
    .list_form .file {
      width: 10%;
    }
    .list_form .id {
      width: 10%;
    }
    .list_form .regist_day {
      width: 10%;
    }
    .list_form .views {
      width: 5%;
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
      <input type="button" class="point-btn" value="게시판 목록" onclick="location.href='board_list.php'">

      <!-- 게시글 쓰기 버튼 -->
      <?php
        if($userid) {
      ?>
      <input type="button" class="plus-btn" value="게시글 쓰기" onclick="location.href='board_form.php'">
      <?php
        }
        else {
      ?>
      <a href="javascript:alert('로그인 후 이용해주세요.')"><input type="button" value="글쓰기"></a>
      <?php
        }
      ?>
    </aside>



    <!-- 게시판 목록 섹선 -->
    <section id="board_list" class="list_form">

      <!-- 타이틀 -->
      <h2>게시판 목록</h2>

      <!-- 게시판 목록 -->
      <ul class="board_list">
        <li class="list sub plus-btn">
          <p class="number">번호</p>
          <p class="subject">제목</p>
          <p class="file">첨부 파일</p>
          <p class="id">작성자</p>
          <p class="regist_day">등록일</p>
          <p class="views">조회</p>
        </li>

        <?php
          if( isset($_GET["page"]) ) {
            $page = $_GET["page"];
          }
          else {
            $page = 1;
          }

          $con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
          $sql = "select * from board order by num desc";
          $result = mysqli_query($con, $sql);
          $total_record = mysqli_num_rows($result);
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
              // 이미지 크기가 커서 일단 사이즈 줄임
              $file_image = "<img src='./img/file.gif' height='14px'/>";
            }
            else {
              $file_image = "";
            }
        ?>




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


        <!-- 작성글없을때 안내문구 추가하기 **************************** -->


        <?php
              $number--;
            }
          mysqli_close($con);
        ?>
      </ul>







      <!-- 페이지 -->
      <div class="page">
        <?php
          if( $total_page>=2 && $page>=2 ) {
            $new_page = $page-1;
            echo "<p><a href='board_list.php?page=$new_page'>이전</a></p>";
          }
          else {
            echo "&nbsp";
          }

          for( $i = 1; $i<=$total_page; $i++ ) {
            if( $page == $i ) {
              echo "<p class='active'>$i</p>";
            }
            else {
              echo "<p><a href='board_list.php?page=$i'>$i</a></p>";
            }
          }
          
          if( $total_page>=2 && $page!=$total_page ) {
            $new_page = $page+1;
            echo "<p><a href='board_list.php?page=$new_page'>다음</a></p>";
          }
          else {
            echo "&nbsp";
          }
        ?>
      </div>

    </section>
      
      




    <!-- 푸터 -->
    <footer id="footer">
      <?php include "footer.php"; ?>
    </footer>
  </div>



</body>
</html>