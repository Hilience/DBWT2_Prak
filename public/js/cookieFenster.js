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
        let popup = document.createElement("div");
        popup.style.position = "fixed";
        popup.style.top = "50%";
        popup.style.left = "50%";
        popup.style.transform = "translate(-50%, -50%)";
        popup.style.backgroundColor = "#fff";
        popup.style.color = "#333";
        popup.style.padding = "20px";
        popup.style.borderRadius = "8px";
        popup.style.boxShadow = "0px 4px 12px rgba(0, 0, 0, 0.1)";
        popup.style.zIndex = "9999";
        popup.style.width = "auto";
        popup.style.maxWidth = "400px";
        popup.style.textAlign = "center";

        popup.innerHTML = `
            <p>Diese Website verwendet Cookies, um Ihnen das beste Erlebnis zu bieten. Bitte stimmen Sie der Nutzung von Cookies zu.</p>
            <button id="acceptCookies" style="
                background-color: #4CAF50;
                color: white;
                border: none;
                padding: 10px 20px;
                font-size: 16px;
                cursor: pointer;
                border-radius: 5px;
                transition: background-color 0.3s;
            ">OK</button>
        `;

        document.body.appendChild(popup);

        document.getElementById("acceptCookies").onclick = function() {
            setCookie("cookieConsent", "true", 365);
            popup.remove();
        };
    }
});
