"use strict";

function getCookie(name) {
    let value = `; ${document.cookie}`;
    let parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(";").shift();
    return null;
}

function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

window.addEventListener("load", () => {
    if (!getCookie("cookieConsent")) {
        let banner = document.createElement("div");
        banner.style.position = "fixed";
        banner.style.bottom = "0";
        banner.style.left = "0";
        banner.style.width = "100%";
        banner.style.background = "#333";
        banner.style.color = "#fff";
        banner.style.padding = "10px";
        banner.style.textAlign = "center";
        banner.innerHTML = 'Diese Website verwendet Cookies. <button id="acceptCookies">OK</button>';
        document.body.appendChild(banner);

        document.getElementById("acceptCookies").onclick = function() {
            setCookie("cookieConsent", "true", 365);
            banner.remove();
        };
    }
});
