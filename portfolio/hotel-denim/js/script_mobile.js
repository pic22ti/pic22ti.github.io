(function(){

  const gnbElem = document.querySelector("#header .gnb");
  const navElem = document.querySelector("#header .nav");

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