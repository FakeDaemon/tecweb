var trama_btn = document.getElementById("I_nested_list_span");
var nested_lst = document.getElementById("nstd_lst");
trama_btn.addEventListener('click', function(){
  nested_lst.classList.toggle("open");
});
