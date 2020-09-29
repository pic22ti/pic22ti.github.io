


      <!-- 왼쪽 최근 게시글 영역 -->
      <article class="latest list_form">

        <!-- 타이틀 -->
        <h3>최근 게시글</h3>

        <ul class="latest_list">
          <li class="list sub plus-btn">
            <p class="subject">제목</p>
            <p class="id">아이디</p>
            <p class="date">등록일</p>
          </li>

        <!-- 최근 게시글 db 불러오기 -->
        <?php
          $con = mysqli_connect('localhost', 'pic22ti', 'myport000!', 'pic22ti');
          $sql = "select * from board order by num desc limit 5";
          $result = mysqli_query($con, $sql);

          // result값이 있다고 떠서 if문 아니고 else 가 출력됨***************************************
          if( !$result ) {
            echo "<p class='no-board'>작성된 게시글이 없습니다.</p>";
          }
          else {
            while( $row = mysqli_fetch_array($result) ) {
              $regist_day = substr($row["regist_day"], 0 , 10);
        ?>







          <li class="list">
            <p class="subject"><?=$row["subject"]?></p>
            <p class="id"><?=$row["name"]?></p>
            <p class="date"><?=$regist_day?></p>
          </li>



          <!-- *********** php 추가하기 ********** -->
          <!-- 글이 없을 때 안내문구 -->
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
          <li class="list sub plus-btn">
            <p class="rank">랭크</p>
            <p class="id">아이디</p>
            <p class="name">이*름</p>
            <p class="point">포인트</p>
          </li>

        <!-- 포인트 랭킹 db 불러오기 -->
        <?php
          $rank = 1;
          $sql = "select * from member order by point desc limit 5";
          $result = mysqli_query($con, $sql);

          if( !$result ) {
            echo "<p>가입된 회원이 없습니다.</p>";
          }
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
        </ul>

      </article>
