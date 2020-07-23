(function(){

/* ------------------ 버튼 탭 시작 ------------------ */
/* 탭 버튼을 클릭하면 선택한 게시판이 노출되고 나머지는 숨김 */

// 게시판 탭 버튼 부모
const btnBoard = document.querySelector('#board .btn>.flex');
// 게시판 탭 버튼 배열
const btnBoardChild = btnBoard.children;
// 버튼마다 보여줄 각 게시판 컨텐츠 배열
const boardContent = document.querySelectorAll('#board .content');
// 게시판 컨텐츠의 타이틀 텍스트
let contentTitle = document.querySelector('#board .title p');








/* 선택된 탭 버튼의 게시판이 보여지는 함수 */
function openTabBoard(t)
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
  for( let j = 0; j < boardContent.length; j++ ) {
    boardContent[j].classList.remove('show');
    btnBoardChild[j].classList.remove('click');
  }

  // 보여줄 메뉴 컨텐츠에 클래스 추가하여 노출시킨다
  showContent.classList.add('show');

  // 타이틀 텍스트 자리에 선택한 메뉴 이름으로 교체
  contentTitle.textContent = `뉴스\n❯\n${changeTitle}`;

  // 선택된 버튼 탭의 스타일을 변경하는 클래스를 추가한다
  t.classList.add('click');
}






/* 탭 버튼 부모에 클릭 이벤트를 설정
   openTabBoard() 함수를 실행 */
   btnBoard.addEventListener('click', function(e){
    // 선택된 자식 탭 버튼이 매개변수로 들어가 함수를 실행
    openTabBoard(e.target);
  });
  






/* 다른 html 페이지에서 선택한 게시판 탭 버튼 보여주기 */

/* 버튼의 인덱스값을 추출하는 함수
   넘어올때 선택한 버튼의 링크 URL의 문자열을 인자로 가져옴 */
   function getBoardIdx(strURL)
   {
     /* 인자로 들어온 URL문자열을 ? 중심으로 앞뒤로 잘라 배열로 넣는다
        ex) strURL : board.html?index:0
            temp[0]는 board.html
            temp[1]는 index:0 */
     let temp = location.href.split('?')[1];
     let data = temp.split(':')[1];
   
     /* parseInt는 Number와 같이 문자열을 숫자로 바꿔주는 함수
        return을 사용해서 얻은 숫자를 함수를 호출한 곳에 값으로 보낸다. */
     return parseInt(data);
   }
   
   
   
   /* openTabBoard 함수를 실행하는데 매개변수는
      btnBoardChlid의 값중에 하나가 들어가야하니까
      btnBoardChlid[ 인덱스값을 구하기 위한 함수() ]로 넣어 함수를 호출
      ( 버튼 탭의 배열 [ 인덱스 추출 (현재 열려있는 주소) ] ) */
   openTabBoard(btnBoardChild[getBoardIdx(window.location.href)]);
   
   /* ------------------ 버튼 탭 끝 ------------------ */














/* ------------------ 게시글 열고 닫기 시작 ------------------ */

/* 게시판 리스트 클릭하면 게시글 내용이 나타나기 */

// 게시판 리스트 가져오기
let boardList = document.querySelectorAll('#board .item');
console.log(boardList);


for( let i = 0; i < boardList.length; i++ ) {
  boardList[i].addEventListener('click', function(e){

    // 게시판 리스트 스타일 클래스를 toggle로 줌
    this.classList.toggle('open');

    // 선택된 게시판 리스트의 다음 형제를 가져오기
    let boardContent = this.nextElementSibling;

    // 게시글 내용의 최대 높이값이 있다면 0으로, 없다면 필요한 스크롤 만큼 높이값을 주어 나타나게 한다
    if( boardContent.style.maxHeight ) {
      boardContent.style.maxHeight = null;
    }
    else {
      boardContent.style.maxHeight = boardContent.scrollHeight + "px";
    }
    
  });
}

/* ------------------ 게시글 열고 닫기 ------------------ */






})();