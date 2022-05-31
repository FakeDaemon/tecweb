document.getElementById("username_input_label").classList.remove("up");
document.getElementById("email_input_label").classList.remove("up");
document.getElementById("password_input_label").classList.remove("up");
document.getElementById("radio_label").classList.remove("noJs");
document.getElementById("password_confirm_input_label").classList.remove("up");
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
document.getElementById("password_confirm_input").addEventListener('input', function(){
  document.getElementById("password_confirm_input").setCustomValidity("");
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
function validateForm(){
  if(document.getElementById("password_confirm_input").value != document.getElementById("password_input").value){
    document.getElementById("password_confirm_input").setCustomValidity("Password diverse tra loro");
    document.getElementById("password_confirm_input").reportValidity();
    return false;
  }else{
    console.log("ciao");
    document.getElementById("password_confirm_input").setCustomValidity("");
    return true;
  }
};
