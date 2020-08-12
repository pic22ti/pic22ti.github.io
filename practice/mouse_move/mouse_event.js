(function(){




/**************** 박스 객체 가져오기 */
const boxElem = document.querySelector("#box");





/****************클릭 */
boxElem.addEventListener("click", mouseClick);
function mouseClick(e){
  // console.log(e);
  // console에 MouseEvent 객체가 표시됨
  // clientX,Y offsetX,Y 쓸 예정
  
  // 이벤트객체 e (MouseEvent) 안에 shiftKey값이 true라면 실행 (디폴트 false)
  // if( e.shiftKey ) {
  //   alert("click event");
  // }

  alert("click event");
}





/*****************mouse down, mouse up */ 
boxElem.addEventListener("mousedown", mouseDown);
function mouseDown(e) {
  boxElem.style.backgroundColor = "paleturquoise";
}

boxElem.addEventListener("mouseup", mouseUp);
function mouseUp(e) {
  boxElem.style.backgroundColor = "palevioletred";
}

/* 
  이벤트 발생순서 : mousedown > click > mouseup
  키보드도 마찬가지임
  mousedown, mouseup은 마우스로 드래그할때 보통 사용되고 나머지는 그냥 click 사용 (모바일이나 타블릿에서 잘 사용안되기 때문)
*/





/**************** mouse 우클릭 (contextmenu) */
boxElem.addEventListener("contextmenu", contextMenu);
function contextMenu(e) {
  alert("마우스 우클릭 금지");

  // 디폴트 기능을 막아버리는 메소드
  e.preventDefault();

  /* 
    이 함수의 리턴값 (디폴트는 true) 
    return 리턴값; 
    이 값을 false로 세팅
  */
  e.returnValue = false;
}









})();