let thumTag = document.querySelector('.thum');
let colorTag = document.querySelector('.color');
let colorName = document.querySelector('.name>p');
let imgIdx = 0;

let preTarget = null;

thumTag.addEventListener('click',function(e){
  let target = e.target;
  let src = target.getAttribute('src');
  colorTag.style.backgroundImage = `url(${src})`;
  let alt = target.getAttribute('alt');
  colorName.textContent = `color-${alt}`;

  imgIdx = Number(target.getAttribute('value'));
  pageText.textContent = `${imgIdx+1} / 6`;

  if(preTarget != null){ 
    preTarget.classList.remove('opacity');
  }
  preTarget = target;
  if(target == this){
    return;
  }
  target.classList.add('opacity');
});

let btnPre = document.querySelector('.pre');
let btnNext = document.querySelector('.next');
let thumChild = thumTag.children;
let pageText = document.querySelector('.page>p');

function slideImage( btn ){
  if( btn ){
    thumChild[imgIdx].classList.remove('opacity');
    imgIdx++;
    if( imgIdx > thumChild.length-1 ){
      imgIdx = 0;
    }
  }
  else {
    thumChild[imgIdx].classList.remove('opacity');
    if( imgIdx <= 0 ){
      imgIdx = thumChild.length;
    }
    imgIdx--;
  }
  let src = thumChild[imgIdx].getAttribute('src');
  colorTag.style.backgroundImage = `url(${src})`;
  let alt = thumChild[imgIdx].getAttribute('alt');
  colorName.textContent = `color-${alt}`;
  pageText.textContent = `${imgIdx+1} / 6`;

  thumChild[imgIdx].classList.add('opacity');
}
