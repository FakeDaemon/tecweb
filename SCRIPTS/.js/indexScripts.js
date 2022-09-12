document.getElementById("SearchBar").addEventListener('input', function () {
    document.getElementById("SearchBar").setCustomValidity("");
  });
  document.getElementById("searchBar").addEventListener('submit', function (evt) {
    if (document.getElementById("SearchBar")) {
      if (document.getElementById("SearchBar").value.length == 0) {
        document.getElementById("SearchBar").setCustomValidity("Inserisci una ricerca valida.");
        document.getElementById("SearchBar").reportValidity();
        evt.preventDefault();
        return;
      }
    }
  });