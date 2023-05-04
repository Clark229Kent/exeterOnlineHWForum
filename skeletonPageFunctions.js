//just writing a shit ton of functions here
function submitLogin(){
    var username = document.getElementById("inputUsername").innerHTML;
    var password = document.getElementById("inputPassword").innerHTML;
    document.getElementById("inputUsername").innerHTML = "";
    document.getElementById("inputPassword").innerHTML = "";
    //if (username === )
    //check if username is one in the database
    //check if password corresponds to that username
}

function incrementVote(whichPost){
  //if we have time we can work on making upvotes only clickable once, not high on priorities though.
  var upvotes = document.getElementById("upvoteNumber" + String(whichPost)).value;
  upvotes ++;
  document.getElementById("upvoteNumber" + String(whichPost)).value = upvotes;
  
}


function addSearchTag(subject){
  var newSearchText = document.getElementById("searchText").value
  newSearchText += String("'" + subject + ",'");
  document.getElementById("searchText").value = newSearchText;
}

function runSearch(e){if (e.keyCode == 13){
  console.log("Enter key is pressed");
  document.getElementById("searchEnterButton").click();
  //this updates the search results page what was searched
  var searchPrompt =  document.getElementById("searchText").value;
  document.getElementById("actualSearchPrompt").value = searchPrompt;
  console.log( document.getElementById("actualSearchPrompt").value);
  //this resets the search textbox
  document.getElementById("searchText").value = "";
}}