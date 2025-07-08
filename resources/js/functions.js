const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
if (isMobile) {
  document.body.setAttribute("data-mobile", "");
}

Element.prototype.disable = function (hide = true) {
  if (hide) {
    this.style.display = "none";
  }
  this.setAttribute("aria-disabled", "true");
  this.setAttribute("disabled", "true");
};

Element.prototype.enable = function () {
  this.style.display = "";
  this.removeAttribute("aria-disabled");
  this.removeAttribute("disabled");
};
