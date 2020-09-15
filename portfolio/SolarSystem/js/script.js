(function(){

  // ***************** 객체
  const stageElem = document.querySelector("#stage");
  const navElem = document.querySelector(".nav");
  let maxScrollHeight = 0;

  // ***************** 내비게이션
  function goPlanet(e) {

    // 스테이지 위치
    let scrollPos = 200*(e.target.getAttribute("value")-1);
    stageElem.style.transform = `translateZ(${scrollPos}vw)`;
    
    // 스크롤바 위치
    let nowPos = maxScrollHeight / 1700 * scrollPos;
    window.scrollTo(0,nowPos);
  }
  navElem.addEventListener("click", goPlanet);

  // ***************** 스크롤
  function onStageScroll() {

    // 스테이지 위치
    let scrollPer = pageYOffset / (document.body.offsetHeight - window.innerHeight);
    let zMove = scrollPer * 1700;
    stageElem.style.transform = `translateZ(${zMove}vw)`;
    
    // 선택된 위치 폰트 스타일
    let value = Math.floor( (zMove+25)/200 +1);
    if( value <= 0 ) { value = 1; }

    for( let i=0; i<navElem.children.length; i++ ) {
      if( navElem.children[i].getAttribute("value") == value ) {
        navElem.children[i].style.fontSize = "40px";
      }
      else {
        navElem.children[i].style.fontSize = "20px";
      }
    }
  }
  window.addEventListener("scroll", onStageScroll);

  // ***************** 리사이즈
  function onWindowResize() {
    maxScrollHeight = document.body.offsetHeight - window.innerHeight;
  }
  window.addEventListener("resize", onWindowResize);
  onWindowResize();

  // ***************** 마우스무브
  let mousePos = {x:0,y:0};
  const containerElem = document.querySelector("#container");

  function onMouseMove(e) {
    // top: 0, left: 0 --> (0,0)
    // 화면의 정 가운데가 (0,0)
    mousePos.x = -1 + (e.clientX/window.innerWidth)*2;
    mousePos.y = 1 - (e.clientY/window.innerHeight)*2;

    containerElem.style.transform = `rotateY(${mousePos.x*2}deg) rotateX(${mousePos.y*2}deg)`;
  }
  window.addEventListener("mousemove", onMouseMove);

}());