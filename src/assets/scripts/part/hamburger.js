export default function hamburger() {
  const burger = document.getElementById("hamburger");
  const mainMenu = document.querySelector(".nav__offscreen");
  const htmlElement = document.querySelector("html");
  burger.addEventListener("click", function(e) {
    mainMenu.classList.toggle("open");
    burger.classList.toggle("is-active");

    // prevent content scrolling
    htmlElement.classList.toggle("noscroll");
  });
}
