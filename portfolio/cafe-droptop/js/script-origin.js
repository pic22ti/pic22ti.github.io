// // modal
// const imgItem = document.querySelectorAll('.menu ul.content>.slide>.flex')
// const modalTag = document.querySelector('.modal');
// const closeBtn = modalTag.children[0];

// for( let i=0; i<imgItem.length; i++ ) {
//   imgItem[i].addEventListener('click', function(e){
//     console.log(imgItem);
//     let target = e.target;
//     console.log(target);
//     let src = target.getAttribute('src');
//     if( src === null ) {
//       return;
//     }
//     modalTag.style.display = "block";
//     modalTag.children[1].src = src;
//   });
// }

// closeBtn.addEventListener('click', function(e){
//   modalTag.style.display = "none";
// });






// // menu button 
// let btnMenu = document.querySelector('.menu .btn>.flex');

// let btnMenuChild = btnMenu.children;
// let ulItem = document.querySelectorAll('.menu ul.content');
// let tabName = document.querySelector('.menu .title p');


// btnMenu.addEventListener('click', function(e){    
//   goTab(e.target);  
// });

// function goTab(t){  // t=e.target;
//   let value = t.getAttribute('value');
//   let showItem = document.getElementsByClassName(value);
//   let changeText = t.textContent;
  
//   for( let j=0; j<btnMenuChild.length; j++ ){
//     ulItem[j].classList.remove('show');
//     btnMenuChild[j].classList.remove('click');
//   }
  
//   tabName.textContent = `메뉴\n>\n${changeText}`;
//   showItem[0].classList.add('show');
//   t.classList.add('click');    
// }

// nav link
let btnNav = document.querySelectorAll('.header .nav a');
// console.log(btnNav[3]);
let idx = 0;

for( let idx=0; idx<btnNav.length; idx++ ) {
  btnNav[idx].addEventListener('click', function(e){
    // console.log(btnNav[idx]);
    // console.log(e.target);
    goTab(e.target);
  });

}







// news button 
let btnNews = document.querySelector('.news .btn>.flex');
let btnNewsChild = btnNews.children;
let boardItem = document.querySelectorAll('.news>div.container');
let tabNameNews = document.querySelector('.news .title p');


btnNews.addEventListener('click', function(e){
  let t = e.target;
  
  let value = t.getAttribute('value');
  let showItem = document.getElementsByClassName(value);
  let changeText = t.textContent;
  
  for( let j=0; j<btnNewsChild.length; j++ ){
    boardItem[j].classList.remove('show');
    btnNewsChild[j].classList.remove('click');
  }
  
  tabNameNews.textContent = `뉴스\n>\n${changeText}`;
  showItem[0].classList.add('show');
  t.classList.add('click');    
});













btnNews.addEventListener('click', function(e){
  let t = e.target;
  
  let value = t.getAttribute('value');
  let showItem = document.getElementsByClassName(value);
  let changeText = t.textContent;
  
  for( let j=0; j<btnNewsChild.length; j++ ){
    // boardItem[j].classList.remove('show');
    // btnNewsChild[j].classList.remove('click');

    /* 예시 */
    deleteClassList(boardItem[j],'show');
  }
  
  tabNameNews.textContent = `뉴스\n>\n${changeText}`;
  showItem[0].classList.add('show');
  t.classList.add('click');    
});

/*
  이 함수는 클래스 네임을 삭제하는 함수입니다.
  매개변수 :  elem -> 
            classname -> 
*/
function deleteClassList(elem,classname)
{
  elem.classList.remove(classname);
}












// btnMenu.addEventListener('click', function(e){
//   let t = e.target;
  
//   let value = t.getAttribute('value');
//   let showItem = document.getElementsByClassName(value);
//   let changeText = t.textContent;
  
//   for( let j=0; j<btnMenuChild.length; j++ ){
//     ulItem[j].classList.remove('show');
//     btnMenuChild[j].classList.remove('click');
//   }
  
//   tabName.textContent = `메뉴\n>\n${changeText}`;
//   showItem[0].classList.add('show');
//   t.classList.add('click');    
// });





// for문 사용
// let i;

// for( i=0; i<btnMenuChild.length; i++ ){    
//   btnMenuChild[i].addEventListener('click', function(e){
//     let t = e.target;

//     let value = t.getAttribute('value');
//     let showItem = document.getElementsByClassName(value);

//     let btnName = t.textContent;

//     for( let j=0; j<btnMenuChild.length; j++ ){
//       showMenu[j].classList.remove('show');
//       btnMenuChild[j].classList.remove('click');
//     }

//     tabName.textContent = `메뉴\n>\n${btnName}`;
//     console.log(tabName);
//     showItem[0].classList.add('show');
//     t.classList.add('click');    
//   });
// }