// default : 첫번째 탭을 열어놓기
document.getElementById('defaultOpen').click();

function openCity(evt, cityName) {
  // 모든 변수를 선언
  let i, tabcontent, tablinks;

  // tabcontent 클래스의 요소를 가져와 숨김
  tabcontent = document.getElementsByClassName('tabcontent');
  for( i = 0; i < tabcontent.length; i++ ) {
    tabcontent[i].style.display = "none";
  }

  // tablinks 클래스의 요소를 가져와 active 클래스를 삭제
  tablinks = document.getElementsByClassName('tablinks');
  for( i = 0; i < tablinks.length; i++ ) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  /* 선택된 탭을 보여주고,
    active 클래스를 더해 탭을 오픈한다 */
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}