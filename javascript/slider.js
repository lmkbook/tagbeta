let currentSlide = 0;
const slides = document.querySelectorAll('.slider .slide');
const totalSlides = slides.length;

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.remove('active');
        if (i === index) {
            slide.classList.add('active');
        }
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    showSlide(currentSlide);
}

setInterval(nextSlide, 3000); // Cambiar cada 3 segundos

document.addEventListener('DOMContentLoaded', () => {
    showSlide(currentSlide);
});
