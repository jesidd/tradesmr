const menuIcon = document.querySelector(".menu-icon");
const menu = document.querySelector(".menu");

menuIcon.addEventListener("click", () => {
  menu.classList.toggle("show");
});



const slider = document.querySelector('.slider');
const slides = document.querySelectorAll('.slide');
const prevBtn = document.querySelector('.prev-slide');
const nextBtn = document.querySelector('.next-slide');
const slideWidth = slides[0].clientWidth;

let index = 0;

prevBtn.addEventListener('click', () => {
  index--;
  if (index < 0) {
    index = slides.length - 1;
  }
 
