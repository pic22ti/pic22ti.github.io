/* 
해당 파일내에서만 사용할 수 있는 익명 함수를 사용한다.
문법 (function(){
  전부 이 안에 작성
})(); 
*/
let strMenuName = "";  
/*메뉴의 객체를 저장하는 변수*/

function gomenu() {
  strMenuName = "음료1" ;
  console.log(strMenuName);
  location.href = "menu.html";
}



(function(){


// nav link
// let btnNav = document.getElementsByClassName('menuname');
// console.log(btnNav);



// function gomenu() {
//   strMenuName = "음료2" ;
//   console.log(strMenuName);
// }



})();

