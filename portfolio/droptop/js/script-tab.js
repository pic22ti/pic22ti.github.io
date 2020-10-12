(function(){

  let pageNameKor, tabBox, tabElems, contentElems, contentTitle;

  // 페이지 구분해서 컨텐츠 객체가져오기
  function pageNameSet() {
    let pageName = document.querySelector("section").getAttribute("id");

    if(pageName == "menu") pageNameKor = "메뉴";
    if(pageName == "board") pageNameKor = "뉴스";

    tabBox = document.querySelector(`#${pageName} .btn>.flex`);
    tabElems = tabBox.children;
    contentElems = document.querySelectorAll(`#${pageName} .content`);
    contentTitle = document.querySelector(`#${pageName} .title p`);
  }
  pageNameSet();

  // 선택한 탭의 컨텐츠를 보여주는 함수
  function openTabContent(tab) {
    if( tab == null ) return;

    let value = tab.getAttribute('value');
    let showContent = document.getElementsByClassName(value)[0];
    
    for( let i = 0; i < contentElems.length; i++ ) {
      contentElems[i].classList.remove('show');
      tabElems[i].classList.remove('click');
    }
    showContent.classList.add('show');
    tab.classList.add('click');

    // 타이틀
    let changeTitle = tab.textContent;
    contentTitle.textContent = `${pageNameKor}\n❯\n${changeTitle}`;
  }

  // 탭 클릭 이벤트 설정
  tabBox.addEventListener('click', function(e){
    openTabContent(e.target);
  });

  // url에서 인덱스 데이터 추출하기
  function getContentIdx(strURL) {
    let temp = strURL.split('?')[1];
    if( !temp ) return;
    let data = temp.split(':')[1];

    return parseInt(data);
  }
  openTabContent(tabElems[getContentIdx(window.location.href)]);

})();