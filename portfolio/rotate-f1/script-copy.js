// 익명함수
(function(){

  
/* DOM 객체 가져오기 */
// 메뉴 버튼
let btnMenu = document.querySelector('.btnMenu');
// 메인 메뉴바
let mainMenu = document.querySelector('.main-menu');
// 메뉴 리스트
let gnb = document.querySelector('.gnb');
// 컨테이너
let container = document.querySelector('.container');
let contents = container.children;

let gnbIdx;
console.log(gnbIdx);


/* 메인 메뉴바 메뉴리스트를 클릭하면 
   메인 메뉴바는 숨기고, 메뉴 버튼이 나타남 */
gnb.addEventListener('click', function(e){

  /* 전에 선택된게 있다면 (인덱스값이 비어있지 않다면)
     전에 선택되어 노출하던 컨텐츠는 숨김 */
  // if( gnbIdx != null ) {
  //   contents[gnbIdx].classList.remove('showContents');
  // }


  let target = e.target;
 
  // 선택된 타겟의 인덱스 값이 문자열로 들어오게 됨
  gnbIdx = target.getAttribute('value');

  // parseInt()함수를 사용하여 문자열을 숫자로 바꿔줌
  gnbIdx = parseInt(gnbIdx);
  
  // typeof() 함수를 사용하면 데이터타입을 알 수 있음
  // console.log(typeof(gnbIdx));

  // 인덱스 값이 있어야 실행됨
  if( gnbIdx != null ){
    mainMenu.classList.add('hideBar');
    btnMenu.classList.add('showbtn');
    container.classList.add('faceContents');
    contents[gnbIdx].classList.add('showContents');
  }
});



/* 메뉴 버튼을 클릭하면 
   메인 메뉴바는 나타나고, 메뉴 버튼이 숨김 */
btnMenu.addEventListener('click', function(){
  mainMenu.classList.remove('hideBar');
  btnMenu.classList.remove('showbtn');
  container.classList.remove('faceContents');
});











})();