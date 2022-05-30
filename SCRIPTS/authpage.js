document.getElementsByClassName("up")[0].classList.remove("up");
document.getElementsByClassName("up")[0].classList.remove("up");
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
document.getElementById("password_input").addEventListener('focus', function(){
  if(!(document.getElementById("password_input_label").classList.contains("up"))){
    document.getElementById("password_input_label").classList.add("up");
  }
});
document.getElementById("password_input").addEventListener('focusout', function(){
  if(document.getElementById("username_input").value.length == 0){
    document.getElementById("password_input_label").classList.remove("up");
  }
});
document.getElementById("reset_button")addEventListener('click', function(){
  document.getElementById("username_input_label").classList.remove("up");
  document.getElementById("password_input_label").classList.remove("up");
});
