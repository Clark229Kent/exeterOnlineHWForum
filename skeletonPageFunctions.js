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

function deletePostButton(whichPost){

  var jsChosenPost = document.getElementById("deletePostButton");
  window.location.href='skeletonHomePageForum.html';
  alert("Your post has been deleted.");
 /* if (confirm("deletePostButton")) {
    txt = "Your post has been deleted.";
  } else {
    txt = "Your post was not deleted.";
  }*/

}

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
  var table = document.getElementById("replyFormTable");
  if (table.style.display === "none") {
    table.style.display = "block";
  } else {
  table.style.display === "none"
  }
}

function submitPost(){
  
}


function createSingleComment()
{
  var table = document.getElementById("replyFormTable");
  table.style.display = "none";
 for(let r=0;r<3;r++)
  {
   var x=document.getElementById("postedRepliesTable").insertRow(r);
   for(let c=0;c<4;c++)  
    {
      let y=  x.insertCell(c);
      if (r == 1){
        y.id = "commentContentRow";
        document.getElementById("commentContentRow").innerHTML = "comment text will go here"; //the comment text will go here
        document.getElementById("commentContentRow").colSpan = "4";
        break;
      }
      else{
        y.id = "commentNOTcontentRow";
        document.getElementById("commentNOTcontentRow").colSpan = "1";
        if (r == 0 && c == 0){
          y.innerHTML = "Resolved/Unresolved";
        }
        if (r == 2 && c == 0){
          y.innerHTML = "upvote";
        }
      }
    }
   }
}

