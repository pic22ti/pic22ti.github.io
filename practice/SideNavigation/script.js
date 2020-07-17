/* 사이드 내비를 열면 너비를 250px로 설정 */
function openNav() {
  // 너비를 full-width로 채우려면 width: 100%
  document.getElementById('mySidenav').style.width = "250px";

  // 페이지 컨텐츠의 margin-left: 250px으로 밀기
  document.getElementById('main').style.marginLeft = "250px";

  // body의 배경색을 블랙으로 덮기
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

/* 사이드 내비를 닫으면 너비를 0으로 설정 */
function closeNav() {
  document.getElementById('mySidenav').style.width = "0";

  // 페이지 컨텐츠의 margin-left: 0으로 삭제
  document.getElementById('main').style.marginLeft = "0";

  // body의 배경색을 화이트로 바꾸기
  document.body.style.backgroundColor = "white";
}
