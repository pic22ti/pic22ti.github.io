(function(){

let btnMenu = document.querySelector('.btnMenu');
let mainMenu = document.querySelector('.main-menu');
let gnb = document.querySelector('.gnb');
let container = document.querySelector('.container');
let contents = container.children;


gnb.addEventListener('click', function(e){
  let target = e.target;
  let gnbIdx = target.getAttribute('value');
  gnbIdx = parseInt(gnbIdx);
  
  if( 0>=gnbIdx || gnbIdx<=contents.length ){
    mainMenu.classList.add('hideBar');
    btnMenu.classList.add('showbtn');
    container.classList.add('faceContents');
    
    for( let i=0; i<contents.length; i++ ){
      contents[i].classList.remove('showContents');
    }
    contents[gnbIdx].classList.add('showContents');
  }
});

btnMenu.addEventListener('click', function(){
  mainMenu.classList.remove('hideBar');
  btnMenu.classList.remove('showbtn');
  container.classList.remove('faceContents');
});











})();