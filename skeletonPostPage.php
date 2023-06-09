<?php
    $servername = '127.0.0.1:3306';
    $username = 'root';
    $password = '';
    $dbname = 'poststorageschema';
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if($conn->connect_error){
        die('Connection failed');
    }
    //needs format http://localhost/.../filepath.php?id=n
    $id=$_GET['id'];
    $sql = "SELECT * FROM poststoragetable WHERE id = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $logtime = $row['logtime'];
    $title = $row['title'];
    $content = $row['content'];
    $subj = $row['subj'];
    $courseNum = $row['courseNum'];
    $other = $row['otherTags'];
    $user = $row['userID'];
    $upvotes = $row['score'];

    $sql = "SELECT * FROM poststoragetable WHERE parent = '$id'";
    $result = $conn->query($sql);
    $rows = mysqli_num_rows($result);
    for ($i=0;$i<$rows;$i++){
        $comments[$i] = $result->fetch_assoc();
    }
    $commentsJSON = json_encode($comments);
    $conn->close();
?>
<html>
    <head>
        <link rel="stylesheet" href="skeletonCSS.css">
        <script src="skeletonPageFunctions.js"></script>

    </head>
<body onload="createComments(int <?=$rows?>,str <?=$commentsJSON?>);">
    <div class = "scrollable" height = 800px>
        <table style = "width: 100%">
            <tr> 
                <td width = "12%">1</td>
                <td width = "12%">2</td>
                <td width = "12%">3</td>
                <td width = "12%">4</td>
                <td width = "12%">5</td>
                <td width = "12%">6</td>
                <td width = "12%">7</td>
                <td width = "12%">8</td>
            </tr>
            <tr> 
                <td colspan = 2>logo</td>
                <td colspan = 3 class = "bold" onclick="window.location.href='skeletonHomePageForum.php';">
                    Home
                </td>
                <td colspan = 1 id = "bold">
                    <div class="dropdown">
                        <button class="dropbtn">menu</button>
                        <div class="dropdown-content">
                            <a href="#">menu item 1</a>
                            <a href="#">menu item 2</a>
                            <a href="#">menu item 3</a>
                            <a href="#">menu item 4</a>
                        </div>
                    </div>
                </td>
                <td colspan = 2 id = "bold">
                    <div class="dropdown">
                        <button class="dropbtn">login</button>
                        <div class="dropdown-content-login">
                            <center>
                                <br>
                                <label for="inputUsername">Username:</label><br>
                                <input type="text" id="inputUsername" name="inputUsername"><br><br> 
                                <label for="inputPassword">Password:</label><br>
                                <input type="text" id="inputPassword" name="inputPassword"><br><br> 
                                <button onclick = "submitLogin()" > Submit </button>
                            </center> 
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td rowspan = 10 colspan = 2>left bar</td>
                <td rowspan = 1 colspan = 1><?=$user?></td>
                <td rowspan = 1 colspan = 2><?=$courseNum?>, <?=$other?></td>
                <td rowspan = 1 colspan = 1><?=$upvotes?></td>
                <td rowspan = 1 colspan = 1><form action="deletePost.php?id=<?=$id?>" method="post"><button class ="submittable" id = "deletePostButton">Delete?</button></form></td>

                <td rowspan = 4 colspan = 2>
                    <table class = "fitting">
                        <tr>
                            <td colspan = 2>
                                <table>
                                    <tr>
                                        <td>
                                            related post 1 title
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            related post 1 description here
                                        </td>
                                    </tr>
                                </table>
                            </td> 
                        </tr>
                        <tr>
                            <td colspan = 2>
                                <table>
                                    <tr>
                                        <td>
                                            related post 2 title
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            related post 2 description here
                                        </td>
                                    </tr>
                                </table>
                            </td> 
                        </tr>
                        <tr>
                            <td colspan = 2>
                                <table>
                                    <tr>
                                        <td>
                                            related post 3 title
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            related post 3 description here
                                        </td>
                                    </tr>
                                </table>
                            </td> 
                        </tr>
                        <tr>
                            <td colspan = 2>
                                <table>
                                    <tr>
                                        <td>
                                            related post 4 title
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            related post 4 description here
                                        </td>
                                    </tr>
                                </table>
                            </td> 
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <!--left bar empty-->
                <div class = "scrollable" height = 250px>
                    <td rowspan = 3 colspan = 4><?=$title?><br><?=$content?></td>
                </div>
                <!--right bar empty-->
            </tr>
            <tr>
                <!--left bar empty-->
                <!--mid section scrollable-->
                <!--right bar empty-->
            </tr>
            <tr>
                <!--left bar empty-->
                <!--mid section scrollable-->
                <!--right bar empty-->
            </tr>
            <tr>
                <!--left bar empty-->
                <td rowspan = 2 colspan = 4>
                    <button class = "submittable" id = "postReplyButton" onclick="createReplyForm()"> Reply </button>
                </td>
                <!--replying/loading a new comment will be like building a new row in the table-->
                <td rowspan = 6 colspan = 2>right bar</td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan = 4>
                    <form action="addComment.php?id=<?=$_GET['id']?>" method="post">
                    <table id = "replyFormTable" style="display:none">
                        <tr>
                            <td colspan = 4>
                                <textarea placeholder="What you are curious about:" id="replyContentText" name="replyContentText"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan = 2>
                                <input type = "submit" value = "Submit">
                            </td>
                            <td colspan = 2>
                                empty
                            </td>
                        </tr>
                    </table>
                    </form>
                </td>
            </tr>
            <tr>
                <td colspan = 4>
                        <table id = "postedRepliesTable"></table>
                </td>
            </tr>
          </table>
    </div>
    
    </body>
</html>
