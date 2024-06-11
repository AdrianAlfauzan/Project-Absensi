// Modifikasi fungsi JavaScript Anda
function toggleNavClicked() {
  var navWrapper = document.querySelector(".wrapper");
  navWrapper.classList.add("nav-clicked");
  var halamanUtamaElement = document.querySelector(".halamanUtama");
  halamanUtamaElement.style.opacity = "0";
}
