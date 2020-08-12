(function(){
  const boxElem = document.querySelector("#box");

/**************** 마우스따라 원형이 이동하는 이벤트 */
boxElem.addEventListener("mousemove", circleMove);
function circleMove(e) {

  const circleElem = document.querySelector("#move");

  circleElem.style.opacity = 0.5;
  
  let top = e.offsetY-50+"px";
  let left = e.offsetX-50+"px";
  circleElem.style.top = top;
  circleElem.style.left = left;

  // circleElem.innerHTML = `x:${top} y:${left}`;
}


})();