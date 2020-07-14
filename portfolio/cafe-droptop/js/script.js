// // modal
// const imgItem = document.querySelector('.newitem>.flex')
// const modalTag = document.querySelector('.modal');
// const closeBtn = modalTag.children[0];

// imgItem.addEventListener('click', function(e){
//   let target = e.target;
//   let src = target.getAttribute('src');
//   if( src === null ) {
//     return;
//   }
//   modalTag.style.display = "block";
//   modalTag.children[1].src = src;
// });

// closeBtn.addEventListener('click', function(e){
//   modalTag.style.display = "none";
// });






// button
let btnMenu = document.querySelector('.btn>.flex');
let btnMenuChild = btnMenu.children;
let showMenu = document.querySelectorAll('ul.content');
let i;
let preTarget = null;

// for문 사용
for( i=0; i<btnMenuChild.length; i++ ){    
  btnMenuChild[i].addEventListener('click', function(e){
    let target = e.target;
    for( let j=0 ; j<btnMenuChild.length ; j++ ){
      btnMenuChild[j].classList.remove('click');
    }
    this.classList.add('click');    
  });
}