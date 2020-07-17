/* 다른 html 필요 */
/* Class the members of each slideshow group with different CSS classes */

let slideIndex = [1,1];

let slideId = ["mySlide1", "mySlide2"];
showSlide(1, 0);
showSlide(1, 1);

function plusSlides(n, no) {
  showSlides(slideIndex[no] += n, no);
}

function showSlides(n, no) {
  let i;
  let x = document.getElementsByClassName(slideId[no]);

  if(n > x.length) {slideIndex[no] = 1}
  if(n < 1) {slideIndex[no] = x.length}

  for(i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex[no]-1].style.display = "block";
}