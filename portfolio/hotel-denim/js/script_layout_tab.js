
// *********************** 이미지 슬라이드
function slideImage(arr) {

  // 현재 이미지 넘버 추출
  const showImage = document.querySelector(".slide_img .show_img");
  let getUrl = showImage.getAttribute("src");
  let imgNumber = Number(getUrl.substring(20, 21));

  // 도트 객체 가져오기
  // const dotElem = document.querySelectorAll(".slide_img .dot");
  
  if( arr === "left" ) {
    // console.log(imgNumber-1);
    // console.log(dotElem[imgNumber-1]);
    // dotElem[imgNumber].classList.add("select");
    
    if( imgNumber === 1 ) return;
    showImage.setAttribute("src", `../images/03rooms_1_${imgNumber-1}.jpg`);
    
  }
  
  if( arr === "right" ) {
    // console.log(imgNumber+1);
    // console.log(dotElem[imgNumber+1]);

    if( imgNumber === 3 ) return;
    showImage.setAttribute("src", `../images/03rooms_1_${imgNumber+1}.jpg`);
  }

}







/* ********************인덱스 이용하는 거로 수정하기 */

// const tabLiElem = document.querySelectorAll(".tab_container p");
// const articleElems = document.querySelectorAll(".layout_tab article");
// for( let i=0 ; i<tabLiElem.length ; i++ ){
//   tabLiElem.addEventListener("click",function(){
    
//   });
// }







// *********************** 선택한 탭을 보여줌
function showArticle(article_name) {

  const articleElems = document.querySelectorAll(".layout_tab article");

  for( let i = 0; i<articleElems.length; i++) {
    if( articleElems[i].className == article_name ){
      articleElems[i].style.display = "block";
    }
    else {
      articleElems[i].style.display = "none";
    }
  }  
}

(function(){

  // *********************** 선택한 탭 스타일 변경
  const tabContainer = document.querySelector(".tab_container");
  
  function selectStyle(e) {
    
    for( let i = 0; i<tabContainer.children.length; i++) {
      tabContainer.children[i].classList.remove("select");
    }

    e.target.classList.add("select");
  }

  tabContainer.addEventListener("click", selectStyle);
  




  // const arrLeft = document.querySelector(".slide_img .left");
  // const arrRight = document.querySelector(".slide_img .right");



})();