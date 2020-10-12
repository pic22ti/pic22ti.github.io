(function(){

  const gnbElem = document.querySelector("#header .gnb");
  const navElem = document.querySelector("#header .nav");
  
  // 모바일 스크린에서 내비를 열고 닫는 함수
  function toggleNav() {
    if(navElem.style.height == "300px") {
      navElem.style.height = "0px";
    }
    else {
      navElem.style.height = "300px";
    }
  }

  gnbElem.addEventListener("click", toggleNav);

})();