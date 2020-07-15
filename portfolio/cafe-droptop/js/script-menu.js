/* 
해당 파일내에서만 사용할 수 있는 익명 함수를 사용한다.
문법 (function(){
  전부 이 안에 작성
})(); 
*/

console.log( "-----------menu.js-------------");
console.log( strMenuName );


(function(){



// modal
const imgItem = document.querySelectorAll('.menu ul.content>.slide>.flex')
const modalTag = document.querySelector('.modal');
const closeBtn = modalTag.children[0];

for( let i=0; i<imgItem.length; i++ ) {
  imgItem[i].addEventListener('click', function(e){
    console.log(imgItem);
    let target = e.target;
    console.log(target);
    let src = target.getAttribute('src');
    if( src === null ) {
      return;
    }
    modalTag.style.display = "block";
    modalTag.children[1].src = src;
  });
}

closeBtn.addEventListener('click', function(e){
  modalTag.style.display = "none";
});


// menu button 
let btnMenu = document.querySelector('.menu .btn>.flex');

let btnMenuChild = btnMenu.children;
let ulItem = document.querySelectorAll('.menu ul.content');
let tabName = document.querySelector('.menu .title p');
let index = 0;



btnMenu.addEventListener('click', function(e){    
  goTab(e.target);
});

function goTab(t){  // t=e.target;
  if( t == null ) return;
  let value = t.getAttribute('value');
  let showItem = document.getElementsByClassName(value);
  let changeText = t.textContent;
  
  for( let j=0; j<btnMenuChild.length; j++ ){
    ulItem[j].classList.remove('show');
    btnMenuChild[j].classList.remove('click');
  }
  
  tabName.textContent = `메뉴\n>\n${changeText}`;
  showItem[0].classList.add('show');
  t.classList.add('click');    
}




})();