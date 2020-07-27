<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
	<title>게시판 목록</title>
</head>
<body>
  <div class="wrap">
		<header class="header">
			<?php include "header.php"; ?>
		</header>
		<section class="section message_box">
      <div class="flex">
        <aside class="aside">
          <div class="btn flex">
            <input class="button" type="button" value="게시판 목록" onclick="location.href='board_list.php'">
            <?php
              if($userid) {
            ?>
            <input class="button" type="button" value="글쓰기" onclick="location.href='board_form.php'">
            <?php
              }
              else {
            ?>
            <a href="javascript:alert('로그인 후 이용해주세요.')"><input class="button" type="button" value="글쓰기"></a>
            <?php
              }
            ?>
          </div>
        </aside>
        <div class="form modify board_list">
          <h2>게시판 목록</h2>
          <ul class="ul">
            <li class="list flex tit">
              <p>번호</p>
              <p>제목</p>
              <p>첨부</p>
              <p>글쓴이</p>
              <p>등록일</p>
              <p>조회</p>
            </li>
            <?php
              if( isset($_GET["page"]) ) {
                $page = $_GET["page"];
              }
              else {
                $page = 1;
              }

              $con = mysqli_connect('localhost', 'user1', '12345', 'newdb');
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
                // 날짜만 출력하고 싶음
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
              <li class="list flex hover">
                <p><?=$number?></p>
                <p><?=$subject?></p>
                <p><?=$file_image?></p>
                <p><?=$id?></p>
                <p><?=$regist_day_short?></p>
                <p><?=$hit?></p>
              </li>
            </a>
            <?php
                $number--;
                }
              mysqli_close($con);
            ?>
          </ul>
          <div class="page flex">
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
        </div>

      </div>
		</section>
		<footer class="footer">
      <?php include "footer.php"; ?>
    </footer>
	</section>
</body>
</html>