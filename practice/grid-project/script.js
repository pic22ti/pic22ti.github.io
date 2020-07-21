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
console.log(contents);

let gnbIdx;


/* 메인 메뉴바 메뉴리스트를 클릭하면 
   메인 메뉴바는 숨기고, 메뉴 버튼이 나타남 */
gnb.addEventListener('click', function(e){
  let target = e.target;
 
  // 선택된 타겟의 인덱스 값이 문자열로 들어오게 됨
  gnbIdx = target.getAttribute('value');
  // parseInt()함수를 사용하여 문자열을 숫자로 바꿔줌
  gnbIdx = parseInt(gnbIdx);
  // typeof() 함수를 사용하면 데이터타입을 알 수 있음
  console.log(typeof(gnbIdx));

  // 인덱스 값이 있어야 실행됨
  if( gnbIdx != null ){
    mainMenu.classList.add('hideBar');
    btnMenu.classList.add('showbtn');
    container.classList.add('showContents');
    contents[gnbIdx].classList.add('show');
  }
});



/* 메뉴 버튼을 클릭하면 
   메인 메뉴바는 나타나고, 메뉴 버튼이 숨김 */
btnMenu.addEventListener('click', function(e){
  mainMenu.classList.remove('hideBar');
  btnMenu.classList.remove('showbtn');
  container.classList.remove('showContents');

  // if 문 i=Idx
  for( let i=0; i<contents.length; i++) {
    contents[i].classList.remove('show');
  }
  contents[gnbIdx].classList.add('show');
});









})();