// Javacript lié :
console.log("Hello, World, carousel!");

document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('.carousel');
    const cards = document.querySelectorAll('.card');
    let currentIndex = 0;

    function showNextReview() {
        cards[currentIndex].style.display = 'none';
        currentIndex = (currentIndex + 1) % cards.length;
        cards[currentIndex].style.display = 'block';
    }

    // Affichez le premier avis
    cards[currentIndex].style.display = 'block';

    setInterval(showNextReview, 5000); // Affichez le prochain avis toutes les  secondes
});