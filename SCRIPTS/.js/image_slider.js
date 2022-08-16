function doNothing(event){
  event.preventDefault();
};
document.getElementById("prev_icon_2").click(function(e){
  document.getElementById("image_slider_2").style.transform = "translate(calc(var(--local-translate)*(-1)))";
});
