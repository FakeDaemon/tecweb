if(document.getElementById("searchBar").value.length == 0) document.getElementById("searchBarLabel").classList.remove("up");
document.getElementById("searchBar").addEventListener('focus', function(){
  if(!(document.getElementById("searchBarLabel").classList.contains("up"))){
    document.getElementById("searchBarLabel").classList.add("up");
  }
})
document.getElementById("searchBar").addEventListener('focusout', function(){
  if(document.getElementById("searchBar").value.length == 0){
    document.getElementById("searchBarLabel").classList.remove("up");
  }
});

document.getElementById("email_input").addEventListener('input', function () {
  document.getElementById("email_input").setCustomValidity("");
});
document.getElementById("text_input").addEventListener('input', function () {
  document.getElementById("text_input").setCustomValidity("");
});
document.querySelector("form").addEventListener('submit', function (evt) {
  if (document.getElementById("email_input")) {
    if (document.getElementById("email_input").value.length == 0) {
      document.getElementById("email_input").setCustomValidity("Insersci una email.");
      document.getElementById("email_input").reportValidity();
      evt.preventDefault();
      return;
    }else{
      const specialChars = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (!specialChars.test(document.getElementById("email_input").value)) {
      document.getElementById("email_input").setCustomValidity("Formato email non valido!");
      document.getElementById("email_input").reportValidity();
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