import "../js/particles-options";

import "../js/sliders";

let html = document.querySelector("html");

let burger = document.querySelector(".header__burger"),
  nav = document.querySelector(".header__nav");

burger.addEventListener("click", openCloseMenu);

function openCloseMenu(e) {
  e.preventDefault();
  burger.classList.toggle("close");
  html.classList.toggle("stop-scrolling");
  nav.classList.toggle("active");
}

let nextPost = document.querySelector('a[rel="next"]'),
  prevPost = document.querySelector('a[rel="prev"]');

if (nextPost)
  nextPost.classList.add("btn", "single-page__nav-btn", "single-page__next");
if (prevPost)
  prevPost.classList.add("btn2", "single-page__nav-btn", "single-page__prev");

let toTop = document.querySelector(".toTop");
window.onscroll = function () {
  if (
    document.body.scrollTop > 100 ||
    document.documentElement.scrollTop > 100
  ) {
    // toTop.style.opacity = "1";
    toTop.classList.add("visible");
  } else {
    // toTop.style.opacity = "0";
    toTop.classList.remove("visible");
  }
};

$(".toTop").click(function () {
  $("html, body").animate(
    {
      scrollTop: 0,
    },
    300
  );
});
