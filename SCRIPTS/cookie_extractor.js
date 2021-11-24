function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    return decodeURI(dc.substring(begin + prefix.length, end));
}
function redirection() {
    if (getCookie("doom_wiki_username_") == null) {
      console.log("No cookies found. Site need Login or Registration.");
      //window.location.replace("https://www.google.com");
    }else{
      if (getCookie("doom_wiki_password_") == null){
        console.log("Username cookie found. Session expired.");
        //window.location.replace("https://www.google.com");
      }
      console.log("Username and Password cookies found. Redirect to community_homepage.");
      //window.location.replace("https://www.google.com");
    }
}
