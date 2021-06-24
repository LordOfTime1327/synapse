let slider = document.querySelector(".home-slider"),
  header = document.querySelector(".header"),
  footer = document.querySelector(".footer");

let homeSlider = new Swiper(".home-slider", {
  direction: "vertical",
  mousewheel: true,
  slidesPerView: 1,
  speed: 1000,
  spaceBetween: 0,

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

let mainSlider = new Swiper(".home-services__slider", {
  slidesPerView: 1,
  spaceBetween: 10,
  effect: "fade",
  loop: true,
  pagination: {
    el: ".home-services__pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".home-services__arrow_next",
    prevEl: ".home-services__arrow_prev",
  },
});

let clientSlider = new Swiper(".clients__slider", {
  slidesPerView: 2,
  spaceBetween: 15,
  loop: true,
  autoplay: {
    delay: 0,
    disableOnInteraction: true,
  },
  speed: 3000,
  allowTouchMove: false,

  breakpoints: {
    550: { slidesPerView: 3 },
    768: { slidesPerView: 4 },
    992: { slidesPerView: 6 },
  },
});
