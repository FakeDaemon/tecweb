var initialization = false;

function searchv2(){
  let input = document.getElementById('search_bar').value
  input=input.toLowerCase();

  let x = document.querySelectorAll("#topic_list > span > dt");
  let y = document.querySelectorAll("#topic_list > span");

  for (i = 0; i < x.length; i++) {
    if (!x[i].innerHTML.toLowerCase().includes(input)) {
      y[i].style.display="none";
    }
    else {
      y[i].style.display="flex";
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
function openList(){
  if(!scrolled){
    scrolled=1;
    $("#topic_list").toggleClass("opened");
  }
};
