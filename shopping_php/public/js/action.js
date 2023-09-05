// スクロールトップボタン
scrollTop('js-scroll-top', 150); 

function scrollTop(el, duration) {
  const target = document.getElementById(el);
  target.addEventListener('click', function() {
    let currentY = window.scrollY; 
    let step = duration/currentY > 1 ? 10 : 100; 
    let timeStep = duration/currentY * step; 
    let intervalId = setInterval(scrollUp, timeStep);
    

    function scrollUp(){
      scrolly = window.scrollY;
      if(scrolly === 0) {
          clearInterval(intervalId); 
      } else {
          scrollBy( 0, -step ); 
      }
    }
  });
}

let pageTopBtn = document.getElementById('js-scroll-top');

window.addEventListener("scroll", () => {
  const currentY = window.scrollY;
  if ( currentY > 100){
    setTimeout(function(){
      pageTopBtn.style.opacity = 1;
    }, 1);
    pageTopBtn.classList.remove('is-hide');
  } else {
    setTimeout(function(){
      pageTopBtn.style.opacity = 0;
    }, 1);
    pageTopBtn.classList.add('is-hide');
  }
});

/*ハンバーガー*/

const ham = document.querySelector('#js-hamburger');
const nav = document.querySelector('#js-nav');

ham.addEventListener('click', function () {

  ham.classList.toggle('active');
  nav.classList.toggle('active');

});