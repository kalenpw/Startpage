// Please see documentation at https://docs.microsoft.com/aspnet/core/client-side/bundling-and-minification
// for details on configuring this project to bundle and minify static web assets.

// Write your JavaScript code.

document.addEventListener("keyup", (e) => {
    let hotkeyEle = document.getElementById("Hotkey-" + e.key)
    if(hotkeyEle) {
        let url = hotkeyEle.parentElement.href;
        window.location = url;
    }
});