<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-reset.css">
  <link rel="stylesheet" href="../css/style-flex.css">
  <link rel="stylesheet" href="../css/style-list_form.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>관리자 모드 - 회원 관리</title>
  <style>
    /* 타이틀 밑에 블루 라인 */
    .list_form h2::after {
      width: 190px;
    }

    /* 목록 요소 각 너비 지정 */
    .list_form .number {
      width: 10%;
    }
    .list_form .regist_day {
      width: 10%;
    }
    .list_form .id {
      width: 15%;
    }
    .list_form .name {
      width: 15%;
    }
    .list_form .level {
      width: 15%;
    }
    .list_form .point {
      width: 15%;
    }
    .list_form .update {
      width: 10%;
    }
    .list_form .delete {
      width: 10%;
    }

    /* input 있는 부분만 여백 변경 */
    .list_form ul form p.level,
    .list_form ul form p.point,
    .list_form ul form p.update,
    .list_form ul form p.delete {
      padding: 9px 0;
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
      <input type="button" class="point-btn" value="회원 관리" onclick="location.href='admin_member.php'">

      <!-- 게시판 관리 버튼 -->
      <input type="button" class="plus-btn" value="게시판 관리" onclick="location.href='admin_board.php'">
      
    </aside>







    <!-- 회원 관리 섹선 -->
    <section id="admin_member" class="list_form">

        <!-- 회원 관리 타이틀 -->
        <h2>회원 관리</h2>

        <!-- 회원 관리 리스트 -->
        <ul class="member_list">

          <!-- 리스트 타이틀 -->
          <li class="list sub plus-btn">
            <p class="number">번호</p>
            <p class="regist_day">가입일</p>
            <p class="id">아이디</p>
            <p class="name">이름</p>
            <p class="level">레벨</p>
            <p class="point">포인트</p>
            <p class="update">수정</p>
            <p class="delete">삭제</p>
          </li>



          <!-- 회원 데이터 리스트 불러오기 -->
          <!-- DB connect -->
          <?php
            $con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
            $sql = "select * from member order by num desc";
            $result = mysqli_query($con, $sql);
            
            $total_record = mysqli_num_rows($result); 

            // 전체 회원 수
            $number = $total_record;

            // 회원 정보 데이터 가져오기
            while( $row = mysqli_fetch_array($result) ) {
              $num = $row["num"];
              $id = $row["id"];
              $name = $row["name"];
              $level = $row["level"];
              $point = $row["point"];
              $regist_day = $row["regist_day"];
              $regist_day_short = substr($regist_day, 0, 10);
          ?>


        


          <!-- 회원 데이터 리스트 출력 -->
          <form name="admin_member_form" method="post" action="admin_member_update.php?num=<?=$num?>">
            <li class="list">
              <p class="number"><?=$num?></p>
              <p class="regist_day"><?=$regist_day_short?></p>
              <p class="id"><?=$id?></p>
              <p class="name"><?=$name?></p>
              <p class="level"><input type="text" name="level" value="<?=$level?>"></p>
              <p class="point"><input type="text" name="point" value="<?=$point?>"></p>

              <!-- 회원 수정 버튼 -->
              <!-- <p class="update"><input type="button" value="수정" onclick="check_input()"></p> -->
              <p class="update"><input type="submit" value="수정"></p>

              <!-- 회원 삭제 버튼 -->
              <!-- <p class="delete"><input type="button" value="삭제" onclick="setfuncdelete()"></p> -->
              <p class="delete"><input type="button" value="삭제" onclick="location.href='admin_member_delete.php?num=<?=$num?>'">
            </p>
            </li>
          </form>





          <?php
              $number--;
            }
            // while문 종료

            mysqli_close($con);
          ?>
          <!-- DB close -->





        </ul>
    </section>
      
      




    <!-- 푸터 -->
    <footer id="footer">
      <?php include "footer.php"; ?>
    </footer>
  </div>





  <!-- 자바스크립트 -->
  <!-- <script type="text/javascript">
    function check_inputt() {
      if( !document.admin_member_form.level.value ) {
        alert("레벨을 입력하세요.");
        document.admin_member_form.level.focus();
        return;
      }
      if( !document.admin_member_form.point.value ) {
        alert("포인트를 입력하세요.");
        document.admin_member_form.point.focus();
        return;
      }
      document.admin_member_form.submit();
    } -->
  </script>
</body>
</html>