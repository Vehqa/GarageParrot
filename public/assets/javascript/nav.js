// Javacript lié :
console.log("Hello, World!")

// Creation d'un MENU HAMBURGER :
const hamburgerBtn = document.querySelector(".nav__toggler");
const navigation = document.querySelector(".header__nav");

hamburgerBtn.addEventListener("click", toggleNav);

function toggleNav(){
    hamburgerBtn.classList.toggle("active");
    navigation.classList.toggle("active");
}