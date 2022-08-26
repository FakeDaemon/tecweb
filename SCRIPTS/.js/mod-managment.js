if(document.getElementById("searchBar").value.length == 0) document.getElementById("searchBarLabel").classList.remove("up");
document.getElementById("searchBar").addEventListener('focus', function(){
  if(!(document.getElementById("searchBarLabel").classList.contains("up"))){
    document.getElementById("searchBarLabel").classList.add("up");
  }
})
document.getElementById("searchBar").addEventListener('focusout', function(){
  if(document.getElementById("searchBar").value.length == 0){
    document.getElementById("searchBarLabel").classList.remove("up");
  }
});
