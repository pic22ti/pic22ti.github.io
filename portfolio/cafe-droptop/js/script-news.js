/* 
해당 파일내에서만 사용할 수 있는 익명 함수를 사용한다.
문법 (function(){
  전부 이 안에 작성
})(); 
*/
(function(){



// news button 
let btnNews = document.querySelector('.news .btn>.flex');
let btnNewsChild = btnNews.children;
let boardItem = document.querySelectorAll('.news>div.container');
let tabNameNews = document.querySelector('.news .title p');




console.log("-----------------news.js--------------");
console.log(window.location.href);

function getNewsIdx(strURL)
{
  temp = location.href.split("?");
  data = temp[1].split(":");
  console.log("index="+data[1]);
  return parseInt(data[1]);
}

goTabNews(btnNewsChild[getNewsIdx(window.location.href)]);







btnNews.addEventListener('click', function(e){
  goTabNews(e.target);
});

function goTabNews(t) // t=e.target;
{
  if( t == null ) {
    return;
  }
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
}




})();