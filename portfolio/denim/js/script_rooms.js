(function(){

// ********************* 초기 설정
// 첫번째 article만 노출, 나머지는 숨긴다
const articleElem = document.querySelectorAll(".layout_tab article");

function setArticle() {
  for( let l = 0; l<articleElem.length; l++ ) {
    articleElem[l].style.display = "none";
  }
  articleElem[0].style.display = "block";
}
setArticle();


// ///////////////////////////// for문 중복 함수로 빼고 객체화, length 인자값 받아서 넣기
// ///////////////////////////// for문을 돌리는거는 3~4개기 때문에 괜찮음


  
// ********************* 탭을 선택하면 해당 이미지와 article을 보여준다
// 탭이 클릭될 때마다 이미지와 도트의 순서 첫번째로 재설정된다
const tabElem = document.querySelectorAll(".layout_tab .tab_container>.tab");
const showImage = document.querySelector(".slide_img .room_img");
const dotElem = document.querySelectorAll(".dot_container>.dot");
let imgIdx = 1;

for(let i = 0; i < tabElem.length; i++) {
  tabElem[i].addEventListener("click", function showArticle(e) {

    // 탭이 클릭되면 첫번째 이미지로 재설정
    imgIdx = 1;
    showImage.setAttribute("src", `../images/03rooms_${i+1}_${imgIdx}.jpg`);

    // 첫번째 도트만 스타일 클래스 추가
    for(let dotIdx = 0; dotIdx < dotElem.length; dotIdx++){
      dotElem[dotIdx].classList.remove("select");  
    }
    dotElem[imgIdx-1].classList.add("select");

    // 탭 스타일 클래스를 전부 지우고
    // article을 전부 숨긴다
    for( let j = 0; j<articleElem.length; j++ ) {
      tabElem[j].classList.remove("select");

      // ///////////////////////////// if 문 걸어서 값이 있을때만 실행, 아니면 리턴
      articleElem[j].style.display = "none";
    }
    
    // 선택된 탭에 스타일 추가
    // 선택된 article 노출
    tabElem[i].classList.add("select");
    articleElem[i].style.display = "block";

  });
}



// ********************* 좌우 화살표를 클릭하면 이미지와 도트 색상이 바뀐다
const leftBtn = document.querySelector(".layout_tab .arr_left");
const rightBtn = document.querySelector(".layout_tab .arr_right");


// ///////////////////////////// 왼쪽/오른쪽 버튼 인자값, 클래스 등을 받아서 중복 없애기

// *********** 왼쪽 버튼
leftBtn.addEventListener("click", function leftImg() {

  // 이미지 인덱스 -1
  imgIdx = imgIdx-1;
  if( imgIdx === 0 ) imgIdx = 3;
  
  // 보여지고 있는 article의 이미지를 노출
  for(let k = 0; k < articleElem.length; k++) {
    if(articleElem[k].style.display == "block") {
      showImage.setAttribute("src", `../images/03rooms_${k+1}_${imgIdx}.jpg`);
    }
  }
  
  // 도트 스타일 클래스 설정
  for(let dotIdx = 0; dotIdx < dotElem.length; dotIdx++){
    dotElem[dotIdx].classList.remove("select");  
  }
  dotElem[imgIdx-1].classList.add("select");

});

// *********** 오른쪽 버튼
rightBtn.addEventListener("click", function rightImg() {

  // 이미지 인덱스 +1
  if( imgIdx === 3 ) imgIdx = 0;
  imgIdx = imgIdx+1;
  
  // 보여지고 있는 article의 이미지를 노출
  for(let k = 0; k < articleElem.length; k++) {
    if(articleElem[k].style.display == "block") {
      showImage.setAttribute("src", `../images/03rooms_${k+1}_${imgIdx}.jpg`);
    }
  }

  // 도트 스타일 클래스 설정
  for(let dotIdx = 0; dotIdx < dotElem.length; dotIdx++){
    dotElem[dotIdx].classList.remove("select");  
  }
  dotElem[imgIdx-1].classList.add("select");
  
});

})();