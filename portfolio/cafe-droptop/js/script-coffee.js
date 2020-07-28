(function(){

/* ------------------ 모바일 스크롤 ------------------ */

/*
아래 사이트 참고해서 만듬

https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_scroll_to_top

https://stackoverflow.com/questions/9439725/javascript-how-to-detect-if-browser-window-is-scrolled-to-bottom
*/



// 스크롤 아이콘 가져오기
var scrollIcon = document.querySelector("#mobile-scroll i");


// 맨 위로 올라가는 함수 만들기
function goToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


// 스크롤 될때 실행
window.onscroll = function(e) {

  /* 각 값이 스크롤 위에 출력되게 해서 확인하기 */
  // document.querySelector('#scrolltest').textContent = (window.innerHeight + document.documentElement.scrollTop)+"  >=  "+(document.body.offsetHeight - 10);
  

  
  // 스크롤이 화면 맨 밑에 있다면
  if ((window.innerHeight + document.documentElement.scrollTop) >= (document.body.offsetHeight - 10)) {
    
    // reverse 클래스 추가
    scrollIcon.classList.add('reverse');

    // 아이콘을 클릭하면 go to top 함수 호출하는 이벤트 설정
    scrollIcon.addEventListener('click', goToTop);
  }

  // 화면 맨 밑이 아닐때는 reverse 클래스 삭제
  else {
    scrollIcon.classList.remove('reverse');
  }
};



})();