
// PopUP
const fundo_popup = document.getElementById('fundo_popup');
const popup_deletar = document.getElementById('popup_deletar');

fundo_popup.addEventListener('click', function (e) {
    if (e.target == this) {
        ocultar_popup();
    }
});

function ocultar_popup() {
    fundo_popup.style.visibility = "hidden";

    popup_deletar.style.marginLeft = "-180vw";
    popup_deletar.style.marginTop = "-150vh";
    popup_deletar.style.visibility = "hidden";
}

function mostrar_popup_deletar() {
    fundo_popup.style.visibility = "visible";
    popup_deletar.style.margin = "0";
    popup_deletar.style.visibility = "visible";
}

//Formatar duas casa deciamal
const formatter = new Intl.NumberFormat('pt-BR',);
// console.log(formatter.format(250000.4300));