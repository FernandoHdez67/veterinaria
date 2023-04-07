document.addEventListener('contextmenu', event => event.preventDefault());

document.onkeydown = function (event) {
    if (event.keyCode == 123) {
        return false;
    }
}