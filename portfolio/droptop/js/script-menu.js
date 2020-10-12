(function(){

// 아이템 이미지를 클릭하면 이미지 확대하여 보여주는 모달창
let itemImg = document.querySelectorAll('#menu .item');
for( let i = 0; i < itemImg.length; i++ ){
  itemImg[i].addEventListener('click', function(e){
    
    let target = e.target;
    let src = target.getAttribute('src');
    if( src === null ) { return; }

    modalTag.children[1].src = src;
    modalTag.style.display = "block";
  });
}

// 모달창 닫기 버튼 클릭 이벤트 설정
const modalTag = document.querySelector('.modal');
const closeModal = modalTag.children[0];
closeModal.addEventListener('click', function(e){
  modalTag.style.display = "none";
});

})();