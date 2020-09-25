(function(){

// 초기 설정
// 첫번째 article만 노출, 나머지는 숨김
const articleElem = document.querySelectorAll(".layout_tab article");

function setArticle() {
  for( let l = 0; l<articleElem.length; l++ ) {
    articleElem[l].style.display = "none";
  }
  articleElem[0].style.display = "block";
}
setArticle();
  
// 탭을 선택하면 
// 해당 이미지와 article을 보여준다
// 탭이 클릭될 때마다 이미지와 도트는 첫번째로 재설정
const tabElem = document.querySelectorAll(".layout_tab .tab_container>.tab");
const showImage = document.querySelector(".slide_img .room_img");
const dotElem = document.querySelectorAll(".dot_container>.dot");
let imgIdx = 1;

for(let i = 0; i < tabElem.length; i++) {

  tabElem[i].addEventListener("click", function showArticle(e) {

    imgIdx = 1;
    showImage.setAttribute("src", `../images/03rooms_${i+1}_${imgIdx}.jpg`);
    for(let dotIdx = 0; dotIdx < dotElem.length; dotIdx++){
      dotElem[dotIdx].classList.remove("select");  
    }
    dotElem[imgIdx-1].classList.add("select");

    for( let j = 0; j<articleElem.length; j++ ) {
      tabElem[j].classList.remove("select");
      articleElem[j].style.display = "none";
    }
    
    tabElem[i].classList.add("select");
    articleElem[i].style.display = "block";
  });
}

// 좌우 화살표를 클릭하면
// 이미지와 도트 색상이 바뀐다
const leftBtn = document.querySelector(".layout_tab .arr_left");
const rightBtn = document.querySelector(".layout_tab .arr_right");


// 왼쪽 버튼
leftBtn.addEventListener("click", function leftImg() {
  imgIdx = imgIdx-1;
  if( imgIdx === 0 ) imgIdx = 3;
  
  for(let k = 0; k < articleElem.length; k++) {
    if(articleElem[k].style.display == "block") {
      showImage.setAttribute("src", `../images/03rooms_${k+1}_${imgIdx}.jpg`);
    }
  }
  
  for(let dotIdx = 0; dotIdx < dotElem.length; dotIdx++){
    dotElem[dotIdx].classList.remove("select");  
  }
  dotElem[imgIdx-1].classList.add("select");
});

// 오른쪽 버튼
rightBtn.addEventListener("click", function rightImg() {
  if( imgIdx === 3 ) imgIdx = 0;
  imgIdx = imgIdx+1;
  
  for(let k = 0; k < articleElem.length; k++) {
    if(articleElem[k].style.display == "block") {
      showImage.setAttribute("src", `../images/03rooms_${k+1}_${imgIdx}.jpg`);
    }
  }

  for(let dotIdx = 0; dotIdx < dotElem.length; dotIdx++){
    dotElem[dotIdx].classList.remove("select");  
  }
  dotElem[imgIdx-1].classList.add("select");
});

})();