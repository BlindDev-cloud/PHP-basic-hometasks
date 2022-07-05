function show_form() {
    let button = document.getElementById('logout-button');
    button.setAttribute("hidden", "");

    let form = document.getElementById('popup-form');
    form.removeAttribute("hidden");
}

function close_form() {
    let form = document.getElementById('popup-form');
    form.setAttribute("hidden", "");

    let button = document.getElementById('logout-button');
    button.removeAttribute("hidden");
}
