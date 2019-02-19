const jumbotron = document.querySelector("section.jumbotron");

window.addEventListener('scroll', function(e) {
    updateParallax();
});

updateParallax();

function updateParallax() {
    jumbotron.style.backgroundPositionY = -150 + (window.pageYOffset / 2) + "px";
}