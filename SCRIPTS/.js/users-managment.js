document.getElementById("searchBar").addEventListener('input', function () {
    document.getElementById("searchBar").setCustomValidity("");
});
document.getElementById("text_input").addEventListener('input', function () {
    document.getElementById("text_input").setCustomValidity("");
});
console.log("ciao");
document.querySelector("form").addEventListener('submit', function (evt) {
    if (document.getElementById("searchBar")) {
        if (document.getElementById("searchBar").value.length == 0) {
            console.log("ciao");
            document.getElementById("searchBar").setCustomValidity("Insersci una email.");
            document.getElementById("searchBar").reportValidity();
            evt.preventDefault();
            return;
        } else {
            const specialChars = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (!specialChars.test(document.getElementById("searchBar").value)) {
                document.getElementById("searchBar").setCustomValidity("Formato email non valido.");
                document.getElementById("searchBar").reportValidity();
                evt.preventDefault();
                return;
            }
        }
    }
    if (document.getElementById("text_input")) {
        if (document.getElementById("text_input").value.length == 0) {
            document.getElementById("text_input").setCustomValidity("Motiva la tua scelta.");
            document.getElementById("text_input").reportValidity();
            evt.preventDefault();
            return;
        }
    }
});