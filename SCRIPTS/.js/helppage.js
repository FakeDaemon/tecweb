if(document.getElementById("email_input_label")){
  document.getElementById("email_input_label").classList.remove("up");
}
document.getElementById("message_helper").classList.remove("noJs");
document.getElementById("email_input").addEventListener('focus', function(){
  if(!(document.getElementById("email_input_label").classList.contains("up"))){
    document.getElementById("email_input_label").classList.add("up");
  }
});
document.getElementById("email_input").addEventListener('focusout', function(){
  if(document.getElementById("email_input").value.length == 0){
    document.getElementById("email_input_label").classList.remove("up");
  }
});
document.getElementById("text_input").addEventListener('input', function(){
    document.getElementById("message_length").textContent = document.getElementById("text_input").value.length;
});
document.getElementById("reset_button").addEventListener('click', function(){
  document.getElementById("email_input_label").classList.remove("up");
});

/* FORM-VALIDATION */
document.getElementById("email_input").addEventListener('input', function () {
  document.getElementById("email_input").setCustomValidity("");
});
document.getElementById("text_input").addEventListener('input', function () {
  document.getElementById("text_input").setCustomValidity("");
});
document.getElementById("auth_widget").addEventListener('submit', function (evt) {
  console.log("errore");
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
      document.getElementById("text_input").setCustomValidity("Inserisci un messaggio valido.");
      document.getElementById("text_input").reportValidity();
      evt.preventDefault();
      return;
    }
  }
});
