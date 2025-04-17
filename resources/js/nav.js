"use strict";

import {menuData} from "./HomeMenuData.js";

// Funktion zum Erstellen des Menüs
function createMenu(menu) {
    const ul = document.createElement("ul");

    menu.forEach(function(item) {
        // Fuer jedes element der Liste ein li tag erstellen
        const li = document.createElement("li");
        li.textContent = item.title;

        // Falls das element ein url attribut hat, passenden link erstellen.
        if(item.url){
            li.onclick = () => window.location.href = item.url;
        }

        // Falls das element Kinder hat, rekursiv das passende menu erstellen
        if (item.children) {
            li.classList.add("toggle");
            const childUl = createMenu(item.children, li);
            childUl.classList.add("submenu");
            li.appendChild(childUl);
            li.onclick = function(e) {
                e.stopPropagation();    // Verhindert das in bubbling phase parent auch gecklickt wird
                let visibility = childUl.style.display === "none" ? "block" : "none";
                setVisibilityForAll(childUl, visibility);   // Damit alle untermenüs wieder geschlossen werden wenn man das obermenü schließt
            };
            li.classList.add("has-submenu"); // Für Hover
        }

        ul.appendChild(li);
    });
    return ul;
}

function setVisibilityForAll(node, visibility){
    node.style.display = visibility;
    if (visibility === "none") {
        node.querySelectorAll('.submenu').forEach(sub => {
            sub.style.display = "none";
        });
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const navContainer = document.getElementById("nav");
    if (navContainer) {
        navContainer.appendChild(createMenu(menuData));
    }
});

document.getElementById("nav").appendChild(createMenu(menuData));
