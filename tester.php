<?php 
$servername = "localhost";
$username = "root";
$password = "";
//$dbname = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
echo "Connected successfully <br>";

$forumTitleText = $_POST['fTT'];
$forumContentText = $_POST['fContT'];
$forumSubjectTag = $_POST['fST'];
$forumCourseTag = $_POST['fCourT'];
$forumOther = $_POST['fOther'];

//next check this https://codingstatus.com/display-data-in-html-table-using-php-mysql/

?>


<style>
<?php include 'skeletonCSS.css'; ?>
</style>

<?php

echo '<table position = "absolute"><!--table for each post-->
<tr>
    <td colspan = 1>
        <center>
            <button onclick = "incrementVote(0)" > Upvote </button>
        </center> 
    </td>
    <td colspan = 1>
        <input class = "invis" type="number" type = "hidden" id="upvoteNumber0" name="upvoteNumber0" value="0"><br>  
    </td>
    
    <td colspan = 2'; ?>
    
<?php
    $yourURL="skeletonPostPage.html";
    echo ("<script>location.href='$yourURL'</script>");
?>

<?php echo 'forum question (click here to go to post page)
    </td>
</tr>
<tr>
    <td colspan = 4>
        <label for="postDescript0">
            Post Description:<br> 

        </label><br>
        <input class = "invis" type="text" id="postDescript0" name="postDescript0"><br> 
    </td>
</tr>
<tr>
    <td colspan = 4>
        <div>
            <table class = "forumPostTable" class = "scrollable">
                <tr max-height = "30px"><!--these tags will populate depending on the actual post-->
                    <td>
                        <button onclick="window.location.href="skeletonTagsPage.html";" > Tag 1 (click any tag to go to tags page)</button>
                    </td>
                    <td>
                        <button onclick="window.location.href="skeletonTagsPage.html";" > Tag 2 </button>
                    </td>
                    <td>
                        <button onclick="window.location.href="skeletonTagsPage.html";" > Tag 3 </button>
                    </td>
                </tr>
            </table>
        </div>
    </td>
</tr>
</table>';

?>

