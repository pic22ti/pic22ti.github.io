(function(){

  const wrapElem = document.querySelector("#wrap");

  /* Math.random()
     0 ~ 1사이의 실수를 출력
     범위를 1 ~ 5로 변경
  */

  function getRandom(){
    let number = Math.floor(Math.random()*5);
    return number+1;
  }

  wrapElem.style.backgroundImage = `url('./images/${getRandom()}.jpg')`;


})();