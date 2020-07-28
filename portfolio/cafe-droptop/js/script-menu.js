(function(){

/* ------------------ 버튼 탭 시작 ------------------ */
/* 탭 버튼을 클릭하면 선택한 메뉴가 노출되고 나머지는 숨김 */

// 메뉴 탭 버튼 부모
const btnMenu = document.querySelector('#menu .btn>.flex');
// 메뉴 탭 버튼 배열
const btnMenuChild = btnMenu.children;
// 버튼마다 보여줄 각 메뉴 컨텐츠 배열
const menuContent = document.querySelectorAll('#menu .content');
// 메뉴 컨텐츠의 타이틀 텍스트
let contentTitle = document.querySelector('#menu .title p');








/* 선택된 탭 버튼의 메뉴가 보여지는 함수 */
function openTabMenu(t)
{
  // 선택된 버튼이 없다면 리턴
  if( t == null ) {
    return;
  }
  
  // 인자로 들어온 t의 value 속성의 값을 변수로 가져옴
  let value = t.getAttribute('value');

  // value 속성 값과 일치하는 클래스를 가진 메뉴 컨텐츠를 찾아 배열의 첫번째 값을 넣어줌 
  let showContent = document.getElementsByClassName(value)[0];

  // 버튼 이름의 텍스트를 가져와서 선택한 메뉴 컨텐츠에 따라 타이틀을 바꿈
  let changeTitle = t.textContent;


  /* 일단 모든 메뉴 컨텐츠의 show 클래스 삭제해 숨기고,
     모든 버튼에 스타일 효과 클래스를 삭제 */
  for( let j = 0; j < menuContent.length; j++ ) {
    menuContent[j].classList.remove('show');
    btnMenuChild[j].classList.remove('click');
  }

  // 보여줄 메뉴 컨텐츠에 클래스 추가하여 노출시킨다
  showContent.classList.add('show');

  // 타이틀 텍스트 자리에 선택한 메뉴 이름으로 교체
  contentTitle.textContent = `메뉴\n❯\n${changeTitle}`;

  // 선택된 버튼 탭의 스타일을 변경하는 클래스를 추가한다
  t.classList.add('click');
}






/* 탭 버튼 부모에 클릭 이벤트를 설정
   openTabMenu() 함수를 실행 */
btnMenu.addEventListener('click', function(e){
  // 선택된 자식 탭 버튼이 매개변수로 들어가 함수를 실행
  openTabMenu(e.target);
});







/* 다른 html 페이지에서 선택한 메뉴 탭 버튼 보여주기 */

/* 버튼의 인덱스값을 추출하는 함수
   넘어올때 선택한 버튼의 링크 URL의 문자열을 인자로 가져옴 */
function getMenuIdx(strURL)
{
  /* 인자로 들어온 URL문자열을 ? 중심으로 앞뒤로 잘라 배열로 넣는다
     ex) strURL : menu.html?index:0
         temp[0]는 menu.html
         temp[1]는 index:0 */
  let temp = location.href.split('?')[1];
  let data = temp.split(':')[1];

  

  /* parseInt는 Number와 같이 문자열을 숫자로 바꿔주는 함수
     return을 사용해서 얻은 숫자를 함수를 호출한 곳에 값으로 보낸다. */
  return parseInt(data);
}



/* openTabMenu 함수를 실행하는데 매개변수는
   btnMenuChlid의 값중에 하나가 들어가야하니까
   btnMenuChlid[ 인덱스값을 구하기 위한 함수() ]로 넣어 함수를 호출
   ( 버튼 탭의 배열 [ 인덱스 추출 (현재 열려있는 주소) ] ) */
openTabMenu(btnMenuChild[getMenuIdx(window.location.href)]);

/* ------------------ 버튼 탭 끝 ------------------ */






/* ------------------ 모달창 시작 ------------------ */

/* 아이템 이미지를 클릭하면 이미지 확대하여 보여주는 모달창 */

// 클릭하는 아이템 이미지 객체를 배열로 가져오기
let itemImg = document.querySelectorAll('#menu .item');
// 모달창
const modalTag = document.querySelector('.modal');
// 모달창 닫기 버튼
const closeModal = modalTag.children[0];






/* 아이템 이미지에 클릭 이벤트 설정 */
for( let i = 0; i < itemImg.length; i++ ){
  itemImg[i].addEventListener('click', function(e){
    
    // 클릭한 아이템 이미지를 가져온다
    let target = e.target;

    // 클릭한 아이템 이미지 주소를 추출
    let src = target.getAttribute('src');

    // 이미지 주소를 갖고 있지 않다면 리턴
    if( src === null ) { return; }

    // 추출한 아이템 이미지 주소를 모달창 이미지 주소로 변경
    modalTag.children[1].src = src;

    // 모달창을 보여준다
    modalTag.style.display = "block";
  });
}




/* 모달창 닫기 버튼 클릭하면 모달창이 숨겨짐 */
closeModal.addEventListener('click', function(e){
  modalTag.style.display = "none";
});





/* ------------------ 모달창 끝 ------------------ */

})();