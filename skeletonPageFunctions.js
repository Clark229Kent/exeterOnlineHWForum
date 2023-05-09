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

function createTable()
{
  /*right now it prompts the user for number of rows and columns but eventually
  that number will be determined by the number of comments*/
rn = window.prompt("Input number of rows", 1);
cn = window.prompt("Input number of columns",1);
  
 for(var r=0;r<parseInt(rn,10);r++)
  {
   var x=document.getElementById("myTable").insertRow(r);
   for(var c=0;c<parseInt(cn,10);c++)  
    {
     var y=  x.insertCell(c);
     y.innerHTML="Row-"+r+" Column-"+c; 
    }
   }
}

function createReplyForm(){
 for(let r=0;r<2;r++)
  {
   let x=document.getElementById("replyFormTable").insertRow(r);
   for(let c=0;c<2;c++)  
    {
      if (r == 0){
        let y=  x.insertCell(c);
        y.id = "contentRow";
        document.getElementById("contentRow").colSpan = "2";
        document.getElementById("contentRow").innerHTML =
         '<textarea placeholder="What you are curious about:" id="replyContentText" name="replyContentText"></textarea><br><br>';
        break;
      }
      else{
        let y=  x.insertCell(c);
        y.id = "NOTcontentRow";
        document.getElementById("NOTcontentRow").colSpan = "1";
        if (r == 1 && c == 0){
          y.innerHTML = '<button class = "submittable" id = "replySubmitButton" onclick = "createSingleComment()" > Submit </button>';
        }
      }
    //y.innerHTML="Row-"+r+" Column-"+c; 
    }
   }
}



function createSingleComment()
{
 for(let r=0;r<3;r++)
  {
   let x=document.getElementById("postedRepliesTable").insertRow(r);
   for(let c=0;c<4;c++)  
    {
      if (r == 1){
        let y=  x.insertCell(c);
        y.id = "contentRow";
        document.getElementById("contentRow").colSpan = "4";
        break;
      }
      else{
        let y =  x.insertCell(c);
        y.id = "NOTcontentRow";
        document.getElementById("NOTcontentRow").colSpan = "1";
        if (r == 0 && c == 0){
          y.innerHTML = "Resolved/Unresolved";
        }
        if (r == 2 && c == 0){
          y.innerHTML = "upvote";
        }
      }
     //y.innerHTML="Row-"+r+" Column-"+c; 
    }
   }
}

/*
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
];*/
