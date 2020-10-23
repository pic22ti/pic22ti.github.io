(function(){
  "use strict";
  
  /*[pan and wrap CSS scrolls]*/
  let pnls = document.querySelectorAll('.panel').length;
  let scdir, hold = false;
  let slength, plength, pan, step;

  function _scrollY(obj) {
    slength, plength, pan, step = 100;
    let vh = window.innerHeight / 100;
    let vmin = Math.min(window.innerHeight, window.innerWidth) / 100;

    if ((this !== undefined && this.id === 'wrap') || (obj !== undefined && obj.id === 'wrap')) {
      pan = this || obj;
      plength = parseInt(pan.offsetHeight / vh);
    }
    if (pan === undefined) {
      return;
    }

    plength = plength || parseInt(pan.offsetHeight / vmin);
    slength = parseInt(pan.style.transform.replace('translateY(', ''));

    if (scdir === 'up' && Math.abs(slength) < (plength - plength / pnls)) {
      slength = slength - step;
    } else if (scdir === 'down' && slength < 0) {
      slength = slength + step;
    } 

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

  // 헤더 로고 버튼 클릭 이벤트
  const headerLogo = document.querySelector('#header>.logo');
  headerLogo.addEventListener('click', function(e){
    goNav(e);
  });

})();