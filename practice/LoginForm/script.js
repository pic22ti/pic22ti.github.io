// 모달 객체 가져오기
let modal = document.getElementById('id01');

// 모달창 밖 빈 공간을 클릭하면 모달창이 닫힘
window.onclick = function(e) {
  if(e.target == modal) {
    modal.style.display = "none";
  }
}