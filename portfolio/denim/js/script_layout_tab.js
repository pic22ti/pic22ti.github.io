


// *********************** 이미지 슬라이드
function slideImage(arr) {

  // 현재 이미지 넘버 추출
  const showImage = document.querySelector(".slide_img .show_img");


  let getUrl = showImage.getAttribute("src");
  let imgNumber = Number(getUrl.substring(20, 21));
  let dotNumber = imgNumber-1;

  // 도트 객체 가져오기
  // const dotElem = document.querySelectorAll(".dot_container>.dot");

  // 선택된 도트 스타일 일단 지움
  function removeDotClass() {
    for( let i = 0; i<dotElem.length; i++ ) {
      dotElem[i].classList.remove("select");
    }
  }

  if( arr === "left" ) {

    // 처음 이미지면 리턴
    if( imgNumber === 1 ) return;

    /***************************주소 부분 바꿔야함 다른 탭에서 안됨 */
    showImage.setAttribute("src", `../images/03rooms_1_${imgNumber-1}.jpg`);
    // removeDotClass();
    // dotElem[dotNumber-1].classList.add("select");
  }
  
  if( arr === "right" ) {

    // 마지막 이미지면 리턴
    if( imgNumber === 3 ) return;

    showImage.setAttribute("src", `../images/03rooms_1_${imgNumber+1}.jpg`);
    // removeDotClass();
    // dotElem[dotNumber+1].classList.add("select");
  }

}





(function(){

// *********************** 선택한 탭 보여주기
const tabElem = document.querySelectorAll(".layout_tab .tab");
const articleElem = document.querySelectorAll(".layout_tab article");

for( let i = 0; i<tabElem.length; i++ ) {
  
  tabElem[i].addEventListener("click", function showArticle(e) {
    
    for( let j = 0; j<articleElem.length; j++ ) {
      tabElem[j].classList.remove("select");
      articleElem[j].style.display = "none";
    }
    
    tabElem[i].classList.add("select");
    articleElem[i].style.display = "block";
  });
}

})();