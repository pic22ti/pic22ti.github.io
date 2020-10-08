<!-- 왼쪽 최근 게시글 영역 -->
<article class="latest list_form">

  <!-- 타이틀 -->
  <h3>최근 게시글</h3>

  <ul class="latest_list">
    <li class="list sub">
      <p class="subject">제목</p>
      <p class="id">아이디</p>
      <p class="date">등록일</p>
    </li>

  <!-- 최근 게시글 데이터 5개 불러오기 -->
  <!-- DB connect -->
  <?php
    $con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
    $sql = "select * from board order by num desc limit 5";
    $result = mysqli_query($con, $sql);

    // 작성된 게시글이 없을 때 안내문구 출력
    // *************************************** 수정사항: 실제로 게시글이 없어도 result값이 있다고 떠서 if문 아니고 else가 출력됨
    if( !$result ) {
      echo "<p class='no-board'>작성된 게시글이 없습니다.</p>";
    }

    // 작성된 게시글이 있을 때 최근 게시글들을 목록으로 출력
    else {
      while( $row = mysqli_fetch_array($result) ) {
        $regist_day = substr($row["regist_day"], 0 , 10);
  ?>

      <li class="list">
        <p class="subject"><?=$row["subject"]?></p>
        <p class="id"><?=$row["name"]?></p>
        <p class="date"><?=$regist_day?></p>
      </li>

      <!-- *************************************** 수정사항: 글이 없을 때 안내문구  -->
      <!-- <p class='no-board'>작성된 게시글이 없습니다.</p> -->
    
    <?php
      } // while문 끝
    } // else문 끝
    ?>
  </ul>
</article>






<!-- 오른쪽 포인트 랭킹 영역 -->
<article class="point_rank list_form">

  <!-- 타이틀 -->
  <h3>포인트 랭킹</h3>

  <ul class="point_rank_list">
    <li class="list sub">
      <p class="rank">랭크</p>
      <p class="id">아이디</p>
      <p class="name">이름</p>
      <p class="point">포인트</p>
    </li>

  <!-- 포인트 랭킹 상위 5개의 데이터 불러오기 -->
  <?php
    $rank = 1;
    $sql = "select * from member order by point desc limit 5";
    $result = mysqli_query($con, $sql);

    // 가입된 회원이 없을 때 안내문구 출력
    // *************************************** 수정사항: 위에 게시글처럼 안나올 수 있으니 확인해보기
    if( !$result ) {
      echo "<p>가입된 회원이 없습니다.</p>";
    }

    // 포인트 랭킹 상위 5개 회원의 데이터를 목록으로 출력
    else {
      while( $row = mysqli_fetch_array($result) ) {
        $name = $row["name"];
        $id = $row["id"];
        $point = $row["point"];
        $name = mb_substr($name, 0, 1)."*".mb_substr($name, 2, 1);
  ?>

        <li class="list">
          <p class="rank"><?=$rank?></p>
          <p class="id"><?=$id?></p>
          <p class="name"><?=$name?></p>
          <p class="point"><?=$point?></p>
        </li>

  <?php
      $rank++;
      } // while문 끝
    } // else문 끝

    mysqli_close($con);
  ?>
  <!-- DB close -->
  </ul>
</article>