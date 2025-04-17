"use strict";

import {menuData} from "./HomeMenuData.js";

function createMenu(menu) {     // Funktion zum Erstellen des Menüs
    const ul = document.createElement("ul");

    menu.forEach(function(item) {
        const li = document.createElement("li");    // Fuer jedes element der Liste ein li tag erstellen
        li.textContent = item.title;


        if(item.url){    // Falls das element ein url attribut hat, passenden link erstellen.
            li.onclick = () => window.location.href = item.url;
        }

        if (item.children) {    // Falls das element Kinder hat, rekursiv das passende menu erstellen
            li.classList.add("toggle");
            li.classList.add("has-submenu"); // Für Hover

            const childUl = createMenu(item.children);  // Rekursiv das menü für untermenüs erstellen
            childUl.classList.add("submenu");
            li.appendChild(childUl);

            li.onclick = function(e) {
                e.stopPropagation();    // Verhindert das in bubbling phase parent auch gecklickt wird
                let visibility = childUl.style.display === "none" ? "block" : "none";
                setVisibilityForAll(childUl, visibility);   // Damit alle untermenüs wieder geschlossen werden wenn man das obermenü schließt
            };

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

document.getElementById("nav").appendChild(createMenu(menuData));
