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

function incrementVote(){
  document.getElementById("forumtexttest").innerHTML = "test";
  var upvotes = document.getElementById("upvoteNumber").value;
  upvotes += 1;
  document.getElementById("upvoteNumber").value = upvotes;
}
