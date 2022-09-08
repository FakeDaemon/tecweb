document.getElementById("password_visibility").addEventListener('change', function(){
  if(document.getElementById("password_visibility").checked){
    document.getElementById("Password").type = 'text';
    document.getElementById("Password").focus();
  }else{
    document.getElementById("Password").type = 'password';
  }
});
