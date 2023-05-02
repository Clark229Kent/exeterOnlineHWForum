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
