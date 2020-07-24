/* 게시판 리스트 클릭하면 게시글 내용이 나타나기 */

// 게시판 리스트 가져오기
const gnbMenu = document.querySelector('#header .gnb-menu');
const nav = document.querySelector('#header .nav');
const header = document.querySelector('#header');


// for( let i = 0; i < boardList.length; i++ ) {
  gnbMenu.addEventListener('click', function(e){

    // 게시판 리스트 스타일 클래스를 toggle로 줌
    // this.classList.toggle('open');

    // 선택된 게시판 리스트의 다음 형제를 가져오기
    // let boardContent = this.nextElementSibling;

    // 게시글 내용의 최대 높이값이 있다면 0으로, 없다면 필요한 스크롤 만큼 높이값을 주어 나타나게 한다
    console.log(nav);

    if( nav.style.maxHeight ) {
      nav.style.maxHeight = null;
      // header.style.position = null;
      // header.style.zIndex = null;
    }
    else {
      nav.style.maxHeight = nav.scrollHeight + "px";
      // header.style.position = "fixed";
      // header.style.zIndex = "2";
    }
    
  });
// }