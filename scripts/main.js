// ----SCROLL----

const anchors = document.querySelectorAll('a[href*="#"]');

for (let anchor of anchors) {
  anchor.addEventListener("click", scroll);
  function scroll(event) {
    event.preventDefault();
    const blockId = anchor.getAttribute("href");
    document.querySelector('' + blockId).scrollIntoView({
      behavior: "smooth",
      block: "start"
    })
  }
}

// ----MENU----

let menuButton = document.getElementById("nav"),
    menu = document.getElementById("menu");
let menuActive = false;

function menuClick () {
  if (menuActive === false) {
    menu.style = "display: flex;"
    menuActive = true;
  } else if (menuActive === true) {
    menu.style = "display: none;"
    menuActive = false;
  }
}

menuButton.addEventListener("click", menuClick);