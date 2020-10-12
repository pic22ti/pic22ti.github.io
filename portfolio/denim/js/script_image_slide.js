(function(){

// 선택한 요소만 노출하고 나머지는 숨기는 함수
function blockDisplay(Elem, select) {
  for(let i = 0; i < Elem.length; i++) {
    Elem[i].style.display = "none";
  }
  Elem[select].style.display = "block";
}

// 선택한 요소만 클래스를 추가하고 나머지는 삭제하는 함수
function classAdd(Elem, select) {
  for(let i = 0; i < Elem.length; i++) {
    Elem[i].classList.remove("select");
  }
  Elem[select].classList.add("select");
}

// 이미지 주소를 설정하는 함수
function showImg(i, imgIdx) {
  let showImage, location; 

  if(document.querySelector(".slide_img .room_img") != null) {
    showImage = document.querySelector(".slide_img .room_img");
    location = "03rooms";
  }
  if(document.querySelector(".slide_img .dining_img") != null) {
    showImage = document.querySelector(".slide_img .dining_img");
    location = "02dining";
  }

  showImage.setAttribute("src", `../images/${location}_${i+1}_${imgIdx}.jpg`);
}

// ********************* 초기 설정
let imgIdx = 1;
const tabElem = document.querySelectorAll(".layout_tab .tab_container>.tab");
const dotElem = document.querySelectorAll(".dot_container>.dot");
const articleElem = document.querySelectorAll(".layout_tab article");
blockDisplay(articleElem, 0);

// 탭에 클릭 이벤트 설정
for(let i = 0; i < tabElem.length; i++) {
  tabElem[i].addEventListener("click", function showArticle(e) {

    // 탭이 클릭되면 첫번째 이미지와 도트로 재설정
    imgIdx = 1;
    showImg(i, imgIdx);
    classAdd(dotElem, imgIdx-1);

    // 선택한 탭만 보여주고 스타일 추가
    blockDisplay(articleElem, i);
    classAdd(tabElem, i);

  });
}

// 좌우 화살표를 클릭하면 이미지와 도트 색상이 바뀌는 함수
function imgSlide(dir) {
  // 왼쪽 버튼
  if(dir == "left") {
    imgIdx = imgIdx-1;
    if( imgIdx === 0 ) imgIdx = dotElem.length;
  }

  // 오른쪽 버튼
  if(dir == "right") {
    if( imgIdx === dotElem.length ) imgIdx = 0;
  imgIdx = imgIdx+1;
  }

  // 현재 보고 있는 탭의 이미지를 열기
  for(let i = 0; i < articleElem.length; i++) {
    if(articleElem[i].style.display == "block") {
      showImg(i, imgIdx);
    }
  }

  classAdd(dotElem, imgIdx-1);
}

// 좌우 버튼 클릭 이벤트 설정
const leftBtn = document.querySelector(".layout_tab .arr_left");
const rightBtn = document.querySelector(".layout_tab .arr_right");
leftBtn.addEventListener("click", function() {
  imgSlide("left");
});
rightBtn.addEventListener("click", function() {
  imgSlide("right");
});

})();