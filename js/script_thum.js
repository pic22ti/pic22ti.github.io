(function(){
  
  // 썸네일 전체 넘버 세팅하는 함수
  const container = document.querySelector('#portfolio>.container');
  const totalNum = container.children.length;
  function setTotalNum(){
    document.querySelector('.total_num').textContent = totalNum;
  }
  setTotalNum();
  
  // 보고 있는 썸네일은 투명도 1, 그 외는 투명도 0.4 설정하는 함수
  let thumIdx = 0;
  function thumOpacity() {
    for(let i = 0; i < totalNum; i++) {
      container.children[i].style.opacity = 0.4;
    }
    container.children[thumIdx].style.opacity = 1;
  }
  thumOpacity();
  
  // 보고 있는 썸네일 넘버를 보여주는 함수
  function setShowNum() {
    let showNum = document.querySelector('.show_num');
    showNum.textContent = thumIdx + 1;
  }

  // 썸네일 박스의 위치값이 변하는 함수
  function moveContainer(arr) {
    let thumPos;

    if(arr == 'pre_btn') {
      if(thumIdx == 0) thumIdx = totalNum;
      thumIdx = thumIdx - 1;
    }
    if(arr == 'next_btn') {
      thumIdx = (thumIdx + 1) % totalNum;
    }

    thumPos = 20 + (thumIdx * -60);
    container.style.left = thumPos+'%';
  }
  
  // 좌우 이동 버튼 클릭 이벤트
  const arrBtn = document.querySelector('.arr');
  arrBtn.addEventListener('click', function(e){
    moveContainer(e.target.className);
    thumOpacity();
    setShowNum();
  });

  


  // 모달창이 열리는 함수
  const modalDetail = document.querySelector('#modal_detail');
  const detailPage = document.querySelectorAll('.detail_page');
  function openModal(i) {
    modalDetail.style.display = 'block';
    detailPage[i].style.display = 'block';
  }

  // 썸네일 이미지, 상세설명 버튼 클릭 이벤트 설정
  const thumImg = document.querySelectorAll('.thum_img');
  const detailBtn = document.querySelectorAll('.detail_link');
  for(let i = 0; i < thumImg.length; i++) {
    thumImg[i].addEventListener('click', function(){
      openModal(i);
    });
    detailBtn[i].addEventListener('click', function(){
      openModal(i);
    });
  }

  // 모달창 맨위로 올라가는 함수
  function goModalTop() {
    modalDetail.scrollTop = 0;
  }

  // 모달창과 상세 페이지를 닫는 함수
  function closeModal() {
    goModalTop();
    modalDetail.style.display = 'none';
    for(let i = 0; i < detailPage.length; i++) {
      detailPage[i].style.display = 'none';
    }
  }

  // 모달창 닫기 버튼 클릭 이벤트 
  const closeModalBtn = document.querySelector('.close_modal');
  closeModalBtn.addEventListener('click', closeModal);

  // 모달창 여백 클릭 이벤트
  modalDetail.addEventListener('click', function(e) {
    if(e.target.className === this.className) {
      closeModal();
    }
  });

})();