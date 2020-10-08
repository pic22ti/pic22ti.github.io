<?php

  // 세선 스타트
  session_start();

  // 로그인되어 있다면 회원 정보를 가져오기
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
  <p>
    <a href="index.php" class="text-btn">
      <i class="material-icons">home</i>
    </a>
  </p>
</div>

<!-- 로그아웃 상태일 때 보임 -->
<?php 
  if( !$userid ) {
?>
<div class="nav login">
  <p><a href="member_form.php" class="text-btn">Join</a></p>
  <p><a href="login_form.php" class="text-btn">Login</a></p>
</div>

<!-- 로그인 상태일 때 보임 -->
<?php
  } // if문 끝
  
  else { 
?>

<div class="nav logout">
  <p><?=$username?>님</p>
  <p>[ 레벨<?=$userlevel?> / <?=$userpoint?>p ]</p>
  <p><a href="message_box.php?mode=rv" class="text-btn">메세지</a></p>
  <p><a href="board_list.php" class="text-btn">게시판</a></p>
  <p><a href="member_modify_form.php" class="text-btn">정보수정</a></p>
  <p><a href="logout.php" class="text-btn">Logout</a></p>

  <!-- 레벨 1일 때 관리자 모드도 보임 -->
  <?php
      if( $userlevel == 1) {
  ?>	
  <p><a href="admin_member.php" class="text-btn">관리자 모드</a></p>
  <?php
      } //if문 끝
    } // else문 끝
  ?>
</div>