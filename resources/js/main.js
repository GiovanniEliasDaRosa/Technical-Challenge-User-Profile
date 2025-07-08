let documentElement = document.documentElement;
let fontSize = parseFloat(window.getComputedStyle(documentElement).fontSize);
let maxScrollHeaderChange = fontSize * 2;
let header = document.querySelector("header");

resizeRecalculate();
window.resizeRecalculate = resizeRecalculate;

window.onscroll = () => {
  if (window.scrollY < maxScrollHeaderChange) {
    header.setAttribute("data-scroll", false);
  } else {
    header.setAttribute("data-scroll", true);
  }
};

window.onresize = () => {
  resizeRecalculate();
};

function resizeRecalculate() {
  fontSize = parseFloat(window.getComputedStyle(documentElement).fontSize);
  maxScrollHeaderChange = fontSize * 2;
}

let popup = document.querySelector(".popup");
if (popup != null) {
  // We have a popup!
  let closedPopup = false;
  let popupTimeout = "";
  let popupButton = popup.querySelector(".popup_button");

  popupButton.onclick = () => {
    closedPopup = true;
    popup.setAttribute("data-animate-out", true);
    clearTimeout(popupTimeout);
    setTimeout(() => {
      popup.remove();
    }, 1000);
  };

  popup.setAttribute("data-animate-in", true);

  // 1 second of the animation coming in, then wait 10 seconds, and close
  popupTimeout = setTimeout(() => {
    popupButton.click();
  }, 12000);
}
