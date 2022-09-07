if(document.getElementById("email_input").getAttribute('value').length == 0) document.getElementById("email_input_label").classList.remove("up");
document.getElementById("password_input_label").classList.remove("up");
document.getElementById("radio_label").classList.remove("noJs");
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
document.getElementById("password_input").addEventListener('focus', function(){
  if(!(document.getElementById("password_input_label").classList.contains("up"))){
    document.getElementById("password_input_label").classList.add("up");
  }
});
document.getElementById("password_input").addEventListener('focusout', function(){
  if(document.getElementById("password_input").value.length == 0){
    document.getElementById("password_input_label").classList.remove("up");
  }
});
document.getElementById("reset_button").addEventListener('click', function(){
  document.getElementById("email_input_label").classList.remove("up");
  document.getElementById("password_input_label").classList.remove("up");
  document.getElementById("username_input_label").focus();
});
document.getElementById("password_visibility").addEventListener('change', function(){
  if(document.getElementById("password_visibility").checked){
    document.getElementById("password_input").type = 'text';
    document.getElementById("password_input").focus();
  }else{
    document.getElementById("password_input").type = 'password';
  }
});

/* FORM-VALIDATION */
document.getElementById("password_input").addEventListener('input', function () {
  document.getElementById("password_input").setCustomValidity("");
});
document.getElementById("email_input").addEventListener('input', function () {
  document.getElementById("email_input").setCustomValidity("");
});
document.querySelector("form").addEventListener('submit', function (evt) {
  console.log("okay");
  if (document.getElementById("email_input")) {
    if (document.getElementById("email_input").value.length == 0) {
      document.getElementById("email_input").setCustomValidity("Inserisci una email.");
      document.getElementById("email_input").reportValidity();
      evt.preventDefault();
      return;
    }
  }
  if (document.getElementById("password_input")) {
    if (document.getElementById("password_input").value.length == 0) {
      document.getElementById("password_input").setCustomValidity("Inserisci una password.");
      document.getElementById("password_input").reportValidity();
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
});
