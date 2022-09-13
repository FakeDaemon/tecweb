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

// FORM VALIDATION
document.getElementById("NextUsername").addEventListener('input', function () {
  document.getElementById("NextUsername").setCustomValidity("");
});
document.querySelector("form").addEventListener('submit', function (evt) {
  if (document.getElementById("NextUsername")) {
    if (document.getElementById("NextUsername").value.length == 0) {
      document.getElementById("NextUsername").setCustomValidity("Devi inserire un valore!");
      document.getElementById("NextUsername").reportValidity();
      evt.preventDefault();
      return;
    }
  }
  if (document.getElementById("NextUsername")) {
    let text = document.getElementById("NextUsername").value.split(" ");
    if (text.length > 1) {
      document.getElementById("NextUsername").setCustomValidity("Inserisci un solo valore!");
      document.getElementById("NextUsername").reportValidity();
      evt.preventDefault();
      return;
    }
  }
}, true);