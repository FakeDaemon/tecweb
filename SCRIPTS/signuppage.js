document.getElementById("username_input_label").classList.remove("up");
document.getElementById("email_input_label").classList.remove("up");
document.getElementById("password_input_label").classList.remove("up");
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
});
document.getElementById("password_visibility").addEventListener('click', function(){
  if(document.getElementById("password_visibility").checked){
    document.getElementById("password_input").type = 'text';
    document.getElementById("password_confirm_input").type = 'text';
  }else{
    document.getElementById("password_input").type = 'password';
    document.getElementById("password_confirm_input").type = 'password';
  }
});