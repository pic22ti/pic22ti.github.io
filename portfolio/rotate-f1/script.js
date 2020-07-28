(function(){

// 메뉴 버튼
let btnMenu = document.querySelector('.btnMenu');
// 메뉴 바 
let mainMenu = document.querySelector('.main-menu');
// 메뉴 리스트
let gnb = document.querySelector('.gnb');
// 컨텐츠 컨테이너
let container = document.querySelector('.container');
// 메뉴 리스트 인덱스
let gnbIdx = 0;

// 메뉴 리스트 인덱스를 매개변수로 가져와서 선택한 컨텐츠를 보여주는 함수
function showContainer(index){
  let contents = container.children;

  if( 0>=index || index<=contents.length ){
    mainMenu.classList.add('hideBar');
    btnMenu.classList.add('showbtn');
    container.classList.add('faceContents');
    
    for( let i=0; i<contents.length; i++ ){
      contents[i].classList.remove('showContents');
      btnMenu.children[i].classList.remove('black');
    }
    contents[index].classList.add('showContents');
  }

  // 인덱스가 2번이면 버튼 메뉴 컬러를 변경
  if( index === 2 ) {
    for( let j=0; j<contents.length; j++ ){
      btnMenu.children[j].classList.add('black');
    }
  }
}

// 메뉴 리스트 클릭 했을때 이벤트 실행
gnb.addEventListener('click', function(e) {
  gnbIdx = e.target.getAttribute('value');
  gnbIdx = parseInt(gnbIdx);

  showContainer(gnbIdx);
});

// 컨테이너 클릭 했을 때 이벤트 실행
container.addEventListener('click', function(e) {
  showContainer(gnbIdx);
});

// 메뉴 버튼 클릭 했을 때 이벤트 실행
btnMenu.addEventListener('click', function(){
  mainMenu.classList.remove('hideBar');
  btnMenu.classList.remove('showbtn');
  container.classList.remove('faceContents');
});

})();