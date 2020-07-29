<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <div class="wrap">
    <header class="header">
      <?php include "header.php"; ?>
    </header>

    <!-- 관리자 모드 -->
    <div id="admin">

      <!-- 회원 관리 타이틀 -->
      <h2>회원 관리</h2>

      <ul class="member_list">
        <li class="list flex">
          <p>번호</p>
          <p>아이디</p>
          <p>이름</p>
          <p>레벨</p>
          <p>포인트</p>
          <p>가입일</p>
          <p>수정</p>
          <p>삭제</p>
        </li>
        <?php
          $con = mysqli_connect('localhost', 'user1', '12345', 'newdb');
          $sql = "select * from member order by num desc";
          $result = mysqli_query($con, $sql);
          
          $total_record = mysqli_num_rows($result); 

          // 전체 회원 수
          $number = $total_record;

          while( $row = mysqli_fetch_array($result) ) {
            $num = $row["num"];
            $id = $row["id"];
            $name = $row["name"];
            $level = $row["level"];
            $point = $row["point"];
            $regist_day = $row["regist_day"];
        ?>
        <form method="post" action="admin_member_update.php?num=<?=$num?>">
           <li class="list flex">
            <p><?=$number?></p>
            <p><?=$id?></p>
            <p><?=$name?></p>
            <p><input type="text" name="level" value="<?=$level?>"></p>
            <p><input type="text" name="point" value="<?=$point?>"></p>
            <p><?=$regist_day?></p>
            <p><button type="submit" value="수정">수정</button></p>
            <p><input type="button" value="삭제" onclick="location.href='admin_member_delete.php?num=<?=$num?>'"></p>
          </li>
        </form>
        <?php
            $number--;
          }
        ?>
      </ul>

      <!-- 게시판 관리 타이틀 -->
      <h2>게시판 관리</h2>

      <ul class="board_list">
        <li class="list flex">
          <p>선택</p>
          <p>번호</p>
          <p>이름</p>
          <p>제목</p>
          <p>첨부파일명</p>
          <p>작성일</p>
        </li>
        <form method="post" action="admin_board_delete.php">
          <?php
            $sql = "select * from board order by num desc";
            $result = mysqli_query($con, $sql);
            $total_record = mysqli_num_rows($result);
            // 전체 글 수
            $number = $total_record;

            while( $row = mysqli_fetch_array($result) ) {
              $num = $row["num"];
              $id = $row["id"];
              $name = $row["name"];
              $subject = $row["subject"];
              $file_name = $row["file_name"];
              $regist_day = $row["regist_day"];
              $regist_day = substr($regist_day, 0, 10);
          ?>
          <li class="list flex">
            <p><input type="checkbox" name="item[]" value="<?=$num?>"></p>
            <p><?=$number?></p>
            <p><?=$id?></p>
            <p><?=$name?></p>
            <p><?=$subject?></p>
            <p><?=$file_name?>
              <?php
              if(!$file_name) {
                echo "(파일 없음)";
              }
              ?>
            </p>
            <p><?=$regist_day?></p>
          </li>
          <?php
              $number--;
            }
          ?>
          <button type="submit">선택한 글 삭제</button>
          <!-- <input type="button" value="선택한 글 삭제"> -->
        </form>
      </ul>
    </div>

  </div>
  <footer class="footer">
    <?php include "footer.php"; ?>
  </footer>
</body>
</html>