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

function submitPost(){
  postSubmitButton.innerHTML = "Loading...";
  window.location.href='skeletonPostPage.html';
}

function generateTable(table, data) {
  for (let element of data) {
    let row = table.insertRow();
    for (key in element) {
      let cell = row.insertCell();
      let text = document.createTextNode(element[key]);
      cell.appendChild(text);
    }
  }
}

var mountains = [
  { name: "Monte Falco", height: 1658, place: "Parco Foreste Casentinesi" },
  { name: "Monte Falterona", height: 1654, place: "Parco Foreste Casentinesi" },
  { name: "Poggio Scali", height: 1520, place: "Parco Foreste Casentinesi" },
  { name: "Pratomagno", height: 1592, place: "Parco Foreste Casentinesi" },
  { name: "Monte Amiata", height: 1738, place: "Siena" }
];
