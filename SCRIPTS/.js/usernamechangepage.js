document.getElementById("NewUsernameLabel").classList.remove("up");
document.getElementById("NextUsername").addEventListener('focus', function(){
  if(!(document.getElementById("NewUsernameLabel").classList.contains("up"))){
    document.getElementById("NewUsernameLabel").classList.add("up");
  }
});
document.getElementById("NextUsername").addEventListener('focusout', function(){
  if(document.getElementById("NextUsername").value.length == 0){
    document.getElementById("NewUsernameLabel").classList.remove("up");
  }
});
document.getElementById("ResetButton").addEventListener('click', function(){
  document.getElementById("NewUsernameLabel").classList.remove("up");
  document.getElementById("NewUsernameLabel").focus();
});
