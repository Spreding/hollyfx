let lastColorChoose = null;
let colorInput;
let btnSubmit
window.onload = function () {
    colorInput = document.getElementById('product_cart_Color');
    btnSubmit = document.getElementById('product_cart_Submit');
    btnSubmit.addEventListener("click", clickBtn);
    showSlides(slideIndex);
}

function choiceColor(id, btn) {
    btn.classList.add("active");
    if (lastColorChoose) lastColorChoose.classList.remove('active');
    lastColorChoose = btn;
    colorInput.value = id;
}

function clickBtn() {
    if (colorInput.value == "") {
        // METTRE UNE DIV ERROR ET L AFFICHE POUR REMPLACER ALERTE
        alert('OH CHOISI TA COULEUR');
    }
}