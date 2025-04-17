window.onload = function () {
    showPopup(); // Popup sofort anzeigen beim Laden
};

function showPopup() {
    document.getElementById("popupOverlay").style.display = "flex";
}

function handleYes() {
    alert("Du hast Ja geklickt!");
    closePopup();
}

function handleNo() {
    alert("Du hast Nein geklickt!");
    closePopup();
}

function closePopup() {
    document.getElementById("popupOverlay").style.display = "none";
}
