// 모달 가져오기
let modal = document.getElementById('myModal');

/* 모달 안에 이미지 가져오기
    : 이미지의 alt를 캡션으로 사용 */
let img = document.getElementById('myImg');
let modalImg = document.getElementById('img-1');
let captionText = document.getElementById('caption');

img.onclick = function() {
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// 모달 닫는 버튼 가져오기
let span = document.getElementsByClassName('close')[0];

// 모달 닫는 버튼 클릭하면 모달이 닫힘
span.onclick = function() {
  modal.style.display = "none";
}