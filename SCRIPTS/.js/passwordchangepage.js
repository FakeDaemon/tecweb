document.getElementById("OldPasswordLabel").classList.remove("up");
document.getElementById("NewPasswordLabel").classList.remove("up");
document.getElementById("PasswordConfirmLabel").classList.remove("up");
document.getElementById("radio_label").classList.remove("noJs");
document.getElementById("password_visibility").addEventListener('click', function(){
  if(document.getElementById("password_visibility").checked){
    document.getElementById("LastPassword").type = 'text';
    document.getElementById("NewPassword").type = 'text';
    document.getElementById("NewPasswordConfirm").type = 'text';
    document.getElementById("LastPassword").focus();
  }else{
    document.getElementById("LastPassword").type = 'password';
    document.getElementById("NewPassword").type = 'password';
    document.getElementById("NewPasswordConfirm").type = 'password';
  }
});

document.getElementById("LastPassword").addEventListener('focus', function(){
  if(!(document.getElementById("OldPasswordLabel").classList.contains("up"))){
    document.getElementById("OldPasswordLabel").classList.add("up");
  }
});
document.getElementById("LastPassword").addEventListener('focusout', function(){
  if(document.getElementById("LastPassword").value.length == 0){
    document.getElementById("OldPasswordLabel").classList.remove("up");
  }
});

document.getElementById("NewPassword").addEventListener('focus', function(){
  if(!(document.getElementById("NewPasswordLabel").classList.contains("up"))){
    document.getElementById("NewPasswordLabel").classList.add("up");
  }
});
document.getElementById("NewPassword").addEventListener('focusout', function(){
  if(document.getElementById("NewPassword").value.length == 0){
    document.getElementById("NewPasswordLabel").classList.remove("up");
  }
});

document.getElementById("NewPasswordConfirm").addEventListener('focus', function(){
  if(!(document.getElementById("PasswordConfirmLabel").classList.contains("up"))){
    document.getElementById("PasswordConfirmLabel").classList.add("up");
  }
});
document.getElementById("NewPasswordConfirm").addEventListener('focusout', function(){
  if(document.getElementById("NewPasswordConfirm").value.length == 0){
    document.getElementById("PasswordConfirmLabel").classList.remove("up");
  }
});

document.getElementById("ResetButton").addEventListener('click', function(){
  document.getElementById("OldPasswordLabel").classList.remove("up");
  document.getElementById("NewPasswordLabel").classList.remove("up");
  document.getElementById("PasswordConfirmLabel").classList.remove("up");
  document.getElementById("OldPasswordLabel").focus();
});
