function show_form() {
    let button = document.getElementById('log-out_button');
    button.setAttribute("hidden", "");

    let form = document.getElementById('pop-up-form');
    form.removeAttribute("hidden");
}


function close_form() {
    let form = document.getElementById('pop-up-form');
    form.setAttribute("hidden", "");

    let button = document.getElementById('log-out_button');
    button.removeAttribute("hidden");
}
