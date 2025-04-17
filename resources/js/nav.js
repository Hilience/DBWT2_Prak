"use strict";

import {menuData} from "./HomeMenuData.js";


function createMenu(menu, parent) {
    const ul = document.createElement("ul");
    menu.forEach(function(item) {
        const li = document.createElement("li");
        li.textContent = item.title;

        if(item.url){
            li.onclick = () => window.location.href = item.url;
        }

        if (item.children) {
            li.classList.add("toggle");
            const childUl = createMenu(item.children, li);
            childUl.classList.add("submenu");
            li.appendChild(childUl);
            li.onclick = function(e) {
                e.stopPropagation();    // Verhindert das in bubbling phase parent auch gecklickt wird
                childUl.style.display = childUl.style.display === "none" ? "block" : "none";
            };
        }
        ul.appendChild(li);
    });
    return ul;
}

document.getElementById("nav").appendChild(createMenu(menuData));
