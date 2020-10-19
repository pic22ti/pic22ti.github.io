(function(){

  // 시계 객체
  const clockElem = document.querySelector("#header .now>.clock");
  
  // 현재 시간 가져오는 함수
  function getTime() {
    const date = new Date(); // 객체
    const hours = date.getHours(); // 시
    const minutes = date.getMinutes(); // 분
    const seconds = date.getSeconds(); // 초

    // 인자를 넣어 시간 출력 함수 호출
    setViewClock( hours, minutes, seconds );
  }

  // 가져온 현재 시간 출력하기
  function setViewClock( h, m, s ) {

    // 10 미만일 경우 앞에 0 붙여 두자리로 출력
    h<10 ? h=`0${h}` : h;
    m<10 ? m=`0${m}` : m;
    s<10 ? s=`0${s}` : s;

    clockElem.textContent = `${h} : ${m} : ${s}`;
  }

  // 맨처음 한번 실행
  getTime();

  // 1초에 한번씩 실행
  setInterval( getTime, 1000 );

})();