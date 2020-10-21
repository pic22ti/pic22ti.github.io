(function(){

  // 비디오 일시정지 버튼 이벤트
  const pauseBtn = document.querySelector('.pause_btn');
  pauseBtn.addEventListener('click', function() {
    const mainVideo = document.querySelector('.main_video');
    const pauseBtnText = document.querySelector('.pause_btn>i');
    if (mainVideo.paused) {
      mainVideo.play();
      pauseBtnText.textContent = "pause";
    } else {
      mainVideo.pause();
      pauseBtnText.textContent = "play_arrow";
    }
  })
})();