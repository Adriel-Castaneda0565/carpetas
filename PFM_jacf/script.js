let slideIndex = 0;
const slides = document.getElementsByClassName("carousel-image");
const totalSlides = slides.length;
let slideInterval;

function showSlides(index) {
    if (index >= totalSlides) {
        slideIndex = 0;
    } else if (index < 0) {
        slideIndex = totalSlides - 1;
    } else {
        slideIndex = index;
    }

const offset = -slideIndex * 100;
const carousel = document.querySelector(".carousel");
carousel.style.transform = `translateX(${offset}%)`;
}

function plusSlides(n) {
    showSlides(slideIndex + n);
}

function changeSlide(n) {
    plusSlides(n);
    resetSlideInterval();
}

function resetSlideInterval() {
    clearInterval(slideInterval);
    slideInterval = setInterval(function() {
        plusSlides(1);
    }, 5000);
}

// Iniciar rotación automática cada 5 segundos
document.addEventListener('DOMContentLoaded', function() {
    showSlides(slideIndex);
    slideInterval = setInterval(function() {
        plusSlides(1);
 },5000);
});