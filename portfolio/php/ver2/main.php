<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Main</title>
</head>
<body>
  
    <!-- 메인 -->
    <section id="main">
      
      <!-- 메인 이미지 -->
      <div class="main-img"></div>
            <!-- 최근 게시글 -->
      <div id="latest">

        <!-- 제목 -->
        <h2>최근 게시글</h2>
        <ul class="ul">

<!-- 최근 게시글 db 불러오기 -->
<?php
	$con =  mysqli_connect('localhost', 'user1', '12345', 'newdb');
	$sql = "select * from board order by num desc limit 5";
	$result = mysqli_query($con, $sql);

	if( !$result ) {
		echo "<p>게시글이 없습니다.</p>";
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
<?php
		}
	}
?>
        </ul>
      </div>

      <!-- 포인트 랭킹 -->
      <div id="point_rank">
        <h2>포인트 랭킹</h2>
        <ul>
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
          <li>
            <p class="rank"><?=$rank?></p>
            <p class="id"><?=$id?></p>
            <p class="name"><?=$name?></p>
            <p class="point"><?=$point?></p>
          </li>
<?php
			$rank++;
		}
	}
	mysqli_close($con);
?>
        </ul>
      </div>
    </section>

</body>
</html>