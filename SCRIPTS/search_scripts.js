var initialization = false;

function search(){
  let input = document.getElementById('search_bar').value
  input=input.toLowerCase();

  let x = document.querySelectorAll("dt");
  let y = document.querySelectorAll("dd");

  for (i = 0; i < x.length; i++) {
    if (!x[i].innerHTML.toLowerCase().includes(input)) {
      x[i].style.display="none";
      index=i*4;
      for(j=0; j<4; j++){
        y[index+j].style.display="none";
      }
    }
    else {
      x[i].style.display="inline-block";
      index=i*4;
      for(j=0; j<4; j++){
        y[index+j].style.display="inline-block";
      }
    }
  }
};
$(function(){
  $("#search_bar").keypress(function(e){
    var keyCode = (e.keyCode ? e.keyCode : e.which);
    if(keyCode == '13') {
      let x = document.querySelectorAll("dt");
      (x[0].children)[0].focus();
    }
  });
});
var scrolled=0;
function scrollUpSearchBar(){
  console.log("test");
  $('html, body').animate({scrollTop: 300 }, 1500);
};
