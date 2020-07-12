let mainImg = document.querySelector('.main-img');
let mainDot = document.querySelector('.main>.flex');

mainDot.addEventListener('click', function(e){
  let target = e.target;
  let dotClass = target.getAttribute('class');
  mainImg.style.backgroundImage = `url('../images/${dotClass}.jpg')`;
});

