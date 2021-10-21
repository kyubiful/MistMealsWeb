const menu = document.querySelector(".menu");
const btn = document.querySelector(".mistmeals-general-menu-btn");
const nav = document.querySelector("nav");
let i = 0;
let path = window.location.pathname;

btn.addEventListener("click", () => {
  menu.classList.toggle("active");
});

// window.addEventListener('resize', () => {
//   let widthOutput = window.innerWidth;
//   console.log(widthOutput);
// })

if (path == "/usuario/signup" || path == "/menu/dishes") {
  nav.classList.toggle("black");
} else {
  window.addEventListener("scroll", () => {
    let scroll = document.documentElement.scrollTop;

    if (scroll > 100 && i == 0) {
      nav.classList.toggle("black");
      i++;
    } else if (scroll < 100 && i == 1) {
      nav.classList.toggle("black");
      i--;
    }
  });
  if (document.documentElement.scrollTop > 100 && i == 0) {
    nav.classList.toggle("black");
    i = 1;
  }
}
