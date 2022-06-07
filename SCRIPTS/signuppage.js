if(document.getElementById("username_input")){
  if(document.getElementById("username_input").value.length == 0) document.getElementById("username_input_label").classList.remove("up");
  if(document.getElementById("email_input").value.length == 0) document.getElementById("email_input_label").classList.remove("up");
  if(document.getElementById("password_input").value.length == 0) document.getElementById("password_input_label").classList.remove("up");
  if(document.getElementById("password_confirm_input").value.length == 0) document.getElementById("password_confirm_input_label").classList.remove("up");
  document.getElementById("radio_label").classList.remove("noJs");
  document.getElementById("username_input").addEventListener('focus', function(){
    if(!(document.getElementById("username_input_label").classList.contains("up"))){
      document.getElementById("username_input_label").classList.add("up");
    }
  });
  document.getElementById("username_input").addEventListener('focusout', function(){
    if(document.getElementById("username_input").value.length == 0){
      document.getElementById("username_input_label").classList.remove("up");
    }
  });
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
  document.getElementById("password_confirm_input").addEventListener('focus', function(){
    if(!(document.getElementById("password_confirm_input_label").classList.contains("up"))){
      document.getElementById("password_confirm_input_label").classList.add("up");
    }
  });
  document.getElementById("password_confirm_input").addEventListener('focusout', function(){
    if(document.getElementById("password_confirm_input").value.length == 0){
      document.getElementById("password_confirm_input_label").classList.remove("up");
    }
  });

  document.getElementById("reset_button").addEventListener('click', function(){
    document.getElementById("username_input_label").classList.remove("up");
    document.getElementById("email_input_label").classList.remove("up");
    document.getElementById("password_input_label").classList.remove("up");
    document.getElementById("password_confirm_input_label").classList.remove("up");
    document.getElementById("username_input_label").focus();
  });
  document.getElementById("password_visibility").addEventListener('click', function(){
    if(document.getElementById("password_visibility").checked){
      document.getElementById("password_input").type = 'text';
      document.getElementById("password_confirm_input").type = 'text';
      document.getElementById("password_input").focus();
    }else{
      document.getElementById("password_input").type = 'password';
      document.getElementById("password_confirm_input").type = 'password';
    }
  });

  document.getElementById("password_confirm_input").addEventListener('input', function(){
    document.getElementById("password_input").setCustomValidity("");
  });
  document.getElementById("password_input").addEventListener('input', function(){
    document.getElementById("password_input").setCustomValidity("");
  });
  document.getElementById("username_input").addEventListener('input', function(){
    document.getElementById("username_input").setCustomValidity("");
  });

  document.getElementById("auth_widget").addEventListener('submit', function(evt){
    if((document.getElementById("username_input").value.split(" ")).length > 1){
      document.getElementById("username_input").setCustomValidity("Il nome utente deve essere composto di una sola parola.");
      document.getElementById("username_input").reportValidity();
      evt.preventDefault();
      return;
    }
    if(document.getElementById("password_confirm_input").value != document.getElementById("password_input").value){
      document.getElementById("password_input").setCustomValidity("Password diverse tra loro.");
      document.getElementById("password_input").reportValidity();
      evt.preventDefault();
      return;
    }else{
      //controllo rispetto vincoli password
      const re = new RegExp('^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])[a-zA-Z0-9]{8,15}$');
      if(!re.test(document.getElementById("password_input").value)){
        document.getElementById("password_input").setCustomValidity("Formato password non corretto.");
        document.getElementById("password_input").reportValidity();
        evt.preventDefault();
      }
    }
  }, true);
}
document.getElementById("email_input").addEventListener('input', function(){
  document.getElementById("email_input").setCustomValidity("");
})
document.getElementById("email_input").addEventListener('invalid', function(){
  document.getElementById("email_input").setCustomValidity("Formato email non corretto. Utilizzare una email valida.");
  document.getElementById("email_input_label").classList.add("up");
})
