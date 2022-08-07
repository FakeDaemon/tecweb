document.getElementById("email_input_label").classList.remove("up");
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
