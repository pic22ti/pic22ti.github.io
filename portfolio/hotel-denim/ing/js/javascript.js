$(function () {
  /* jquery */
  $("header > div:nth-of-type(1) > .menu").click(function () {
    $("header > div:nth-of-type(3) > nav").slideToggle();
  });
});