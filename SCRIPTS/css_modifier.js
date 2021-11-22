var user_creation_background="url(../IMAGES/register_icon.png";
var login_background="url(../IMAGES/login_icon.png)";
$(document).ready(function(){
  $("#user_creation").toggleClass("undisplayed");
  $("#login").toggleClass("undisplayed");
  $("#login_wrapper").css("background-image", login_background);
  $("#user_creation_wrapper").css("background-image", user_creation_background);
});
var usr_cr_clicked=0;
var login_clicked=0;
var first_click=true;
$(document).on('click', '#user_creation_wrapper', function() {
  if(!usr_cr_clicked){
    usr_cr_clicked=1;
    login_clicked=0;
    if(first_click){
      first_click=false;
    }else{
      $("#login").toggleClass("undisplayed");
      $("#login_wrapper").css("background-image", login_background);
    }
    $("#user_creation_wrapper").css("background-image", "none");
    setTimeout(function(){$("#user_creation").toggleClass("undisplayed");}, 400);
    $("#user_creation_wrapper").css("width", "70%");
    $("#login_wrapper").css("width", "20%");
  }
});

$(document).on('click', '#login_wrapper', function() {
  if(!login_clicked){
    login_clicked=1;
    usr_cr_clicked=0;
    if(first_click){
      first_click=false;
    }else{
      $("#user_creation").toggleClass("undisplayed");
      $("#user_creation_wrapper").css("background-image", user_creation_background);
    }
    setTimeout(function(){$("#login").toggleClass("undisplayed");}, 400);
    $("#login_wrapper").css("background-image", "none");
    $("#login_wrapper").css("width", "70%");
    $("#user_creation_wrapper").css("width", "20%");
  }
});
