/* STYLE_CHANGE */
if (document.getElementById("username_input")) {
  if (document.getElementById("username_input").value.length == 0) document.getElementById("username_input_label").classList.remove("up");
  if (document.getElementById("email_input").value.length == 0) document.getElementById("email_input_label").classList.remove("up");
  if (document.getElementById("password_input").value.length == 0) document.getElementById("password_input_label").classList.remove("up");
  if (document.getElementById("password_confirm_input").value.length == 0) document.getElementById("password_confirm_input_label").classList.remove("up");
  document.getElementById("radio_label").classList.remove("noJs");
}
document.getElementById("username_input").addEventListener('focus', function () {
  if (!(document.getElementById("username_input_label").classList.contains("up"))) {
    document.getElementById("username_input_label").classList.add("up");
  }
});
document.getElementById("username_input").addEventListener('focusout', function () {
  if (document.getElementById("username_input").value.length == 0) {
    document.getElementById("username_input_label").classList.remove("up");
  }
});
document.getElementById("email_input").addEventListener('focus', function () {
  if (!(document.getElementById("email_input_label").classList.contains("up"))) {
    document.getElementById("email_input_label").classList.add("up");
  }
});
document.getElementById("email_input").addEventListener('focusout', function () {
  if (document.getElementById("email_input").value.length == 0) {
    document.getElementById("email_input_label").classList.remove("up");
  }
});
document.getElementById("password_input").addEventListener('focus', function () {
  if (!(document.getElementById("password_input_label").classList.contains("up"))) {
    document.getElementById("password_input_label").classList.add("up");
  }
});
document.getElementById("password_input").addEventListener('focusout', function () {
  if (document.getElementById("password_input").value.length == 0) {
    document.getElementById("password_input_label").classList.remove("up");
  }
});
document.getElementById("password_confirm_input").addEventListener('focus', function () {
  if (!(document.getElementById("password_confirm_input_label").classList.contains("up"))) {
    document.getElementById("password_confirm_input_label").classList.add("up");
  }
});
document.getElementById("password_confirm_input").addEventListener('focusout', function () {
  if (document.getElementById("password_confirm_input").value.length == 0) {
    document.getElementById("password_confirm_input_label").classList.remove("up");
  }
});

/* RESET-BUTTON */
document.getElementById("reset_button").addEventListener('click', function () {
  document.getElementById("username_input_label").classList.remove("up");
  document.getElementById("email_input_label").classList.remove("up");
  document.getElementById("password_input_label").classList.remove("up");
  document.getElementById("password_confirm_input_label").classList.remove("up");
  document.getElementById("username_input_label").focus();
});

/* MOSTRA-PASSWORD */
document.getElementById("password_visibility").addEventListener('click', function () {
  if (document.getElementById("password_visibility").checked) {
    document.getElementById("password_input").type = 'text';
    document.getElementById("password_confirm_input").type = 'text';
    document.getElementById("password_input").focus();
  } else {
    document.getElementById("password_input").type = 'password';
    document.getElementById("password_confirm_input").type = 'password';
  }
});

/* FORM-VALIDATOR */
document.getElementById("password_confirm_input").addEventListener('input', function () {
  document.getElementById("password_input").setCustomValidity("");
});
document.getElementById("password_input").addEventListener('input', function () {
  document.getElementById("password_input").setCustomValidity("");
});
document.getElementById("username_input").addEventListener('input', function () {
  document.getElementById("username_input").setCustomValidity("");
});
document.getElementById("email_input").addEventListener('input', function () {
  document.getElementById("email_input").setCustomValidity("");
});
document.getElementById("email_input").addEventListener('blur', e => {
  var validityState_object = document.getElementById("email_input").validity;
  console.log(validityState_object);
  if (validityState_object.typeMismatch) {
    input.setCustomValidity('Inserisci un indirizzo valido per proseguire.');
    input.reportValidity();
  } else {
    input.setCustomValidity('');
    input.reportValidity();
  }
});
document.querySelector("form").addEventListener('submit', function (evt) {
  if (document.getElementById("username_input")) {
    if (document.getElementById("username_input").value.length == 0) {
      document.getElementById("username_input").setCustomValidity("Il nome utente è necessario, devi inserire un valore!");
      document.getElementById("username_input").reportValidity();
      evt.preventDefault();
      return;
    }
  }
  if (document.getElementById("email_input")) {
    if (document.getElementById("email_input").value.length == 0) {
      document.getElementById("email_input").setCustomValidity("L'email è necessaria, devi inserire un valore!");
      document.getElementById("email_input").reportValidity();
      evt.preventDefault();
      return;
    }
  }
  if (document.getElementById("password_input")) {
    if (document.getElementById("password_input").value.length == 0) {
      document.getElementById("password_input").setCustomValidity("La password è necessaria, inserisci un valore!");
      document.getElementById("password_input").reportValidity();
      evt.preventDefault();
      return;
    }
  }
  if (document.getElementById("password_confirm_input")) {
    if (document.getElementById("password_confirm_input").value.length == 0) {
      document.getElementById("password_confirm_input").setCustomValidity("La conferma della password è necessaria, inserisci un valore!");
      document.getElementById("password_confirm_input").reportValidity();
      evt.preventDefault();
      return;
    }
  }

  if ((document.getElementById("username_input").value.split(" ")).length > 1) {
    document.getElementById("username_input").setCustomValidity("Il nome utente deve essere composto di una sola parola.");
    document.getElementById("username_input").reportValidity();
    evt.preventDefault();
    return;
  } else {
    const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    if (specialChars.test(document.getElementById("username_input").value)) {
      document.getElementById("username_input").setCustomValidity("Il nome utente non deve contenere caratteri speciali.");
      document.getElementById("username_input").reportValidity();
      evt.preventDefault();
      return;
    }
  }
  
  if (document.getElementById("password_confirm_input").value != document.getElementById("password_input").value) {
    document.getElementById("password_input").setCustomValidity("Password diverse tra loro.");
    document.getElementById("password_input").reportValidity();
    evt.preventDefault();
    return;
  } else {
    const re = new RegExp('^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])[a-zA-Z0-9]{8,15}$');
    if (!re.test(document.getElementById("password_input").value)) {
      document.getElementById("password_input").setCustomValidity("Formato password non corretto.");
      document.getElementById("password_input").reportValidity();
      evt.preventDefault();
    }
  }
}, true);
