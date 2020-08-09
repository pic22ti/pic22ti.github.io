

<!-- 세션 시작 -->
<?php
  session_start();

  if(isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
  }
  else {
    $userid = "";
  }
  if(isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
  }
  else {
    $username = "";
  }
  if(isset($_SESSION["userlevel"])) {
    $userlevel = $_SESSION["userlevel"];
  }
  else {
    $userlevel = "";
  }
  if(isset($_SESSION["userpoint"])) {
    $userpoint = $_SESSION["userpoint"];
  }
  else {
    $userpoint = "";
  }
?>









<!-- 왼쪽에 HOME으로 가는 버튼/로고 -->
<div class="logo">
  <p><a href="index.php" class="plus-btn">HOME</a></p>
</div>

<!-- 로그아웃 상태일때 보임 -->
<?php 
  if( !$userid ) {
?>
<div class="nav login">
  <p><a href="member_form.php" class="plus-btn">Join</a></p>
  <p><a href="login_form.php" class="plus-btn">Login</a></p>
</div>






<!-- 로그인 상태일때 보임 -->
<?php
  } // if문 끝
  
  else { 
    $logged = $username."님 [ 레벨".$userlevel." / ".$userpoint."p ]";
?>

<div class="nav logout">
  <p><?=$logged?></p>
  <p><a href="message_box.php?mode=rv" class="plus-btn">쪽지</a></p>
  <p><a href="board_list.php" class="plus-btn">게시판</a></p>
  <p><a href="member_modify_form.php" class="plus-btn">정보수정</a></p>
  <p><a href="logout.php" class="plus-btn">Logout</a></p>

  <!-- 레벨 1일때 관리자 모드 보임 -->
  <?php
      if( $userlevel == 1) {
  ?>	

  <p><a href="admin_member.php" class="plus-btn">관리자 모드</a></p>
  
  <?php
      } //if문 끝
    } // else문 끝
  ?>
</div>


