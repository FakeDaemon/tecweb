document.getElementById("email_input_label").classList.remove("up");
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
