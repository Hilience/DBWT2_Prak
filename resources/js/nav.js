"use strict";
import { menuData } from "./HomeMenuData.js";

// Funktion zum Erstellen des Menüs
function createMenu(menu) {
    const ul = document.createElement("ul");
    menu.forEach(function(item) {
        const li = document.createElement("li");
        li.textContent = item.title;

        if (item.url) {
            li.onclick = () => window.location.href = item.url;
        }

        if (item.children) {
            const childUl = createMenu(item.children);
            childUl.classList.add("submenu");
            li.appendChild(childUl);
            li.classList.add("has-submenu"); // Für Hover
        }

        ul.appendChild(li);
    });
    return ul;
}

document.addEventListener("DOMContentLoaded", function () {
    const navContainer = document.getElementById("nav");
    if (navContainer) {
        navContainer.appendChild(createMenu(menuData));
    }
});
