(function(){

/************** 객체 가져오기 */
const boxElem = document.querySelector("#box");




/************** 마우스 무브 이벤트 */
// boxElem.addEventListener("mousemove", mouseMove);
function mouseMove(e) {

  /* 뷰포트에서, 브라우저 영역 안에서의 좌표값 (스크롤이 포함되지 않음) */
  let posX = e.clientX;
  let posY = e.clientY;
  let posValue = `client(x,y) → ${posX}, ${posY}`;

  document.querySelector(".client").innerHTML = posValue;




  /* 이벤트가 발생되는 객체 기준의 좌표값 */
  let offsetX = e.offsetX;
  let offsetY = e.offsetY;
  let offsetValue = `offset(x,y) → ${offsetX}, ${offsetY}`;

  document.querySelector(".offset").innerHTML = offsetValue;
  
}



})();