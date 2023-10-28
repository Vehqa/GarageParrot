// Javacript lié :
console.log("Hello, World!")

// Creation d'un MENU HAMBURGER :
document.addEventListener("DOMContentLoaded", function() {
    const hamburgerBtn = document.querySelector(".nav__toggler");
    const navigation = document.querySelector(".header__nav");

    if (hamburgerBtn) {
        hamburgerBtn.addEventListener("click", toggleNav);
    }

    function toggleNav(){
        hamburgerBtn.classList.toggle("active");
        navigation.classList.toggle("active");
    }
});