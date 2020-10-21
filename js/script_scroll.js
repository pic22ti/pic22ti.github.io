(function(){
  "use strict";
  

  /*[pan and wrap CSS scrolls]*/
  let pnls = document.querySelectorAll('.panel').length, scdir, hold = false;
  let slength, plength, pan, step;

  function _scrollY(obj) {
    slength, plength, pan, step = 100;
    let vh = window.innerHeight / 100,
        vmin = Math.min(window.innerHeight, window.innerWidth) / 100;

    // this가 있고 this가 wrap 일때, 또는 인자가 있고 인자가 wrap일때 실행
    // pan은 this 이거나 obj
    // 패널 높이 새로 설정
    if ((this !== undefined && this.id === 'wrap') || (obj !== undefined && obj.id === 'wrap')) {
      pan = this || obj;
      plength = parseInt(pan.offsetHeight / vh);
    }

    // pan이 없을 때 리턴
    if (pan === undefined) {
      return;
    }

    // 패널 높이는 패널 넢이 이거나 새로 설정
    // 스크롤 높이를 새로 설정
    plength = plength || parseInt(pan.offsetHeight / vmin);
    slength = parseInt(pan.style.transform.replace('translateY(', ''));

    // 스크롤방향이 up/down
    if (scdir === 'up' && Math.abs(slength) < (plength - plength / pnls)) {
      slength = slength - step;
    } else if (scdir === 'down' && slength < 0) {
      slength = slength + step;
    } 

    // 홀드 값이 false일때, true 값을 넣고 이동하고, 0.5초 이후 다시 false로 돌아감
    if (hold === false) {
      hold = true;
      pan.style.transform = 'translateY(' + slength + 'vh)';
      setTimeout(function() {hold = false;}, 1000);
    }

    console.log(scdir + ':' + slength + ':' + plength + ':' + (plength - plength / pnls));
  }

  /*[assignments]*/
  let wrap = document.getElementById('wrap');
  wrap.style.transform = 'translateY(0)';
  wrap.addEventListener('wheel', function(e) {
    // WheelEvent의 deltaY 속성: 아래로 스크롤 양수, 위로 스크롤 음수 또는 0 반환
    if (e.deltaY < 0) {
      scdir = 'down';
    }
    if (e.deltaY > 0) {
      scdir = 'up';
    }
    e.stopPropagation();
  });
  
  wrap.addEventListener('wheel', _scrollY);








  
  
  // 메뉴 여는 함수
  const nav = document.querySelector('.nav');
  const navBG = document.querySelector('.nav_bg');
  function openNav() {
    nav.style.width = "50vw";
    nav.style.opacity = 1;
    navBG.style.display = "block";
  }

  // 메뉴 닫는 함수
  function closeNav() {
    nav.style.width = "0";
    nav.style.opacity = 0;
    navBG.style.display = "none";
  }

  // 클릭한 패널로 이동하는 함수
  function goNav(e) {
    let target = e.target.className;
    
    if(target === 'nav_home' || target === 'gototop_btn' || target === 'logo') {
      slength = 0;
    }
    if(target === 'nav_portfolio') {
      slength = -100;
    }
    if(target === 'nav_about') {
      slength = -200;
    }
    if(target === 'nav_contact') {
      slength = -300;
    }
  
    pan = wrap;  
    pan.style.transform = 'translateY(' + slength + 'vh)';
  }

  // 메뉴 오픈 버튼 클릭 이벤트
  const openNavBtn = document.querySelector('.open_nav');
  openNavBtn.addEventListener('click', openNav);

  // 메뉴 클릭 이벤트
  nav.addEventListener('click', function(e) {
    if(!e.target.className || e.target.className === 'nav') {
      return;
    }
    goNav(e);
    closeNav();
  });

  // 메뉴 배경 클릭 이벤트
  navBG.addEventListener('click', closeNav);

  // 사이트맵 클릭 이벤트
  const siteMap = document.querySelector('.site_map');
  siteMap.addEventListener('click', function(e){
    goNav(e);
  });

  // 위로 가기 버튼 클릭 이벤트
  const goToTop = document.querySelector('.gototop_btn');
  goToTop.addEventListener('click', function(e){
    goNav(e);
  });

  const headerLogo = document.querySelector('#header>.logo');
  headerLogo.addEventListener('click', function(e){
    goNav(e);
  });

})();