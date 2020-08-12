(function(){


const inputTag = document.querySelector("input");





/******************* keypress 실제 입력되는 키만, (shift, alt 등 기능키는 인식 안됨) */
inputTag.addEventListener("keypress", keyPress);
function keyPress(e) {
  document.querySelector("p").innerHTML = e.keyCode;
  alert("keypress!!!!");
}






/******************** keydown (shift, alt 등의 특수키 값을 가져옴) */
inputTag.addEventListener("keydown", keyDown);
function keyDown(e) {
  document.querySelector("p").innerHTML = e.keyCode;
  // document.querySelector("p").style.backgroundColor = "pink";
}





/****************** keyup enter등 주로 이걸 사용 */
inputTag.addEventListener("keyup", keyUp);
function keyUp(e) {
  document.querySelector("p").innerHTML = e.keyCode;
  // document.querySelector("p").style.backgroundColor = "lavender";
}






})();