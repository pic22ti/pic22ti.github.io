(function(){

// 게시판 제목 클릭하면 내용을 보여준다
let boardList = document.querySelectorAll('#board .item');
for( let i = 0; i < boardList.length; i++ ) {
  boardList[i].addEventListener('click', function(e){

    this.classList.toggle('open');
    let boardContent = this.nextElementSibling;

    if( boardContent.style.maxHeight ) {
      boardContent.style.maxHeight = null;
    }
    else {
      boardContent.style.maxHeight = boardContent.scrollHeight + "px";
    }
  });
}

})();