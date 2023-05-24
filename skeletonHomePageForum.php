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
    $sql = "SELECT * FROM poststoragetable ORDER BY RAND() LIMIT 4";
    $result = $conn->query($sql);
    //0
    $row0 = $result->fetch_assoc();
    $id0 = $row0['id'];
    $logtime0 = $row0['logtime'];
    $title0 = $row0['title'];
    $content0 = $row0['content'];
    $subj0 = $row0['subj'];
    $courseNum0 = $row0['courseNum'];
    $other0 = $row0['otherTags'];
    $user0 = $row0['userID'];
    $upvotes0 = $row0['score'];
    //1
    $row1 = $result->fetch_assoc();
    $id1 = $row1['id'];
    $logtime1 = $row1['logtime'];
    $title1 = $row1['title'];
    $content1 = $row1['content'];
    $subj1 = $row1['subj'];
    $courseNum1 = $row1['courseNum'];
    $other1 = $row1['otherTags'];
    $user1 = $row1['userID'];
    $upvotes1 = $row1['score'];
    //2
    $row2 = $result->fetch_assoc();
    $id2 = $row2['id'];
    $logtime2 = $row2['logtime'];
    $title2 = $row2['title'];
    $content2 = $row2['content'];
    $subj2 = $row2['subj'];
    $courseNum2 = $row2['courseNum'];
    $other2 = $row2['otherTags'];
    $user2 = $row2['userID'];
    $upvotes2 = $row2['score'];
    //3
    $row3 = $result->fetch_assoc();
    $id3 = $row3['id'];
    $logtime3 = $row3['logtime'];
    $title3 = $row3['title'];
    $content3 = $row3['content'];
    $subj3 = $row3['subj'];
    $courseNum3 = $row3['courseNum'];
    $other3 = $row3['otherTags'];
    $user3 = $row3['userID'];
    $upvotes3 = $row3['score'];
    $conn->close();
?>
<html>
    <head>
        <link rel="stylesheet" href="skeletonCSS.css">
        <script src="skeletonPageFunctions.js"></script>
    </head>

<body>
    <div class = "scrollable">
        <table position = "absolute">
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
                <td colspan = 2 id = "bold">logo</td>
                <td colspan = 3 id = "bold">
                    <body>
                        <!--from https://www.sliderrevolution.com/resources/css-search-box/-->
                        <form action="search.php" method="post">
                        <table colspan = 4 border-collapse = "collapse">
                            <td colspan = 1>
                                <div class="dropdown">
                                    <button class="dropbtn">tagged search</button>
                                    <div class="dropdown-content" class = "scrollable-dropdown" min-width = "300px">
                                        <br>
                                        <button class = "tagSearch" id="anthroTag" onclick="addSearchTag('ant')">&nbsp;&nbsp;Anthropology&nbsp;&nbsp;</button><br><br>
                                        <button class = "tagSearch" id="artTag" onclick="addSearchTag('art')">&nbsp;&nbsp;Art&nbsp;&nbsp;</button><br><br>
                                        <button class = "tagSearch" id="bioTag" onclick="addSearchTag('bio')">&nbsp;&nbsp;Biology&nbsp;&nbsp;</button><br><br>
                                        <button class = "tagSearch" id="chemTag" onclick="addSearchTag('che')">&nbsp;&nbsp;Chemistry&nbsp;&nbsp;</button><br><br>
                                        <button class = "tagSearch" id="compsciTag" onclick="addSearchTag('csc')">&nbsp;&nbsp;Computer Science&nbsp;&nbsp;</button><br><br>
                                        <button class = "tagSearch" id="econTag" onclick="addSearchTag('eco')">&nbsp;&nbsp;Economics&nbsp;&nbsp;</button><br><br>
                                        <button class = "tagSearch" id="engTag" onclick="addSearchTag('eng')">&nbsp;&nbsp;English&nbsp;&nbsp;</button><br><br>
                                        <button class = "tagSearch" id="greekTag" onclick="addSearchTag('grk')">&nbsp;&nbsp;Greek&nbsp;&nbsp;</button><br><br>
                                        <button class = "tagSearch" id="healthTag" onclick="addSearchTag('hhd')">&nbsp;&nbsp;Health and Human Dev&nbsp;&nbsp;</button><br><br>
                                        <button class = "tagSearch" id="historyTag" onclick="addSearchTag('his')">&nbsp;&nbsp;History&nbsp;&nbsp;</button><br><br>
                                        <button class = "tagSearch" id="integTag" onclick="addSearchTag('int')">&nbsp;&nbsp;Integrated Studies&nbsp;&nbsp;</button><br><br>
                                        <button class = "tagSearch" id="latinTag" onclick="addSearchTag('lat')">&nbsp;&nbsp;Latin&nbsp;&nbsp;</button><br><br>
                                        <button class = "tagSearch" id="mathTag" onclick="addSearchTag('mat')">&nbsp;&nbsp;Mathematics&nbsp;&nbsp;</button><br><br>
                                        <button class = "tagSearch" id="modlangTag" onclick="addSearchTag('modlang')">&nbsp;&nbsp;Modern Languages&nbsp;&nbsp;</button><br><br>
                                        <button class = "tagSearch" id="musicTag" onclick="addSearchTag('mus')">&nbsp;&nbsp;Music&nbsp;&nbsp;</button><br><br>
                                        <button class = "tagSearch" id="physicsTag" onclick="addSearchTag('phy')">&nbsp;&nbsp;Physics&nbsp;&nbsp;</button><br><br>
                                        <button class = "tagSearch" id="psychTag" onclick="addSearchTag('psy')">&nbsp;&nbsp;Psychology&nbsp;&nbsp;</button><br><br>
                                        <button class = "tagSearch" id="religionTag" onclick="addSearchTag('rel')">&nbsp;&nbsp;Religion&nbsp;&nbsp;</button><br><br>
                                        <button class = "tagSearch" id="theaterdanceTag" onclick="addSearchTag('thd')">&nbsp;&nbsp;Theater and Dance&nbsp;&nbsp;</button><br><br>
                                    </div>
                                </div>
                            </td>
                            <td colspan = 3>
                                <label for="searchText">Search for posts here. Use single quotes for tags, commas to separate tags:</label><br><br><br>
                                <input type="text" id="searchText" name="searchText"><br><br>
                                <!--<script>
                                    document.getElementById("searchText").addEventListener("keydown", function runSearch(e){if (e.keyCode == 13){
                                            console.log("Enter key is pressed");
                                            document.getElementById("searchEnterButton").click()
                                            //i want to update the search results page what was searched
                                            
                                            //this resets the search textbox
                                            document.getElementById("searchText").value = ""
                                            ;
                                        }});
                                </script>
                            <button hidden id = "searchEnterButton" onclick="window.location.href='skeletonSearchPage.html';"></button>  
                            -->
                            </td>
                        </table>
                    </form>
                    
                                      
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
                                <input type="text" placeholder="Enter Username" name="inputUsername" id="inputUsername" required><br><br> 
                                <label for="inputPassword">Password:</label><br>
                                <input type="password" placeholder="Enter Password" name="inputPassword" id="inputPassword" required><br><br> 
                                <button class = "submittable" onclick="submitLogin()">Login</button>
                                <label>
                                    <input type="checkbox" checked="checked" name="remember"> Remember me
                                </label>
                                <div id="inputmsg"></div>
                                <br>
                                <label for="signupUsername">New Username:</label><br>
                                <input type="text" placeholder="Enter New Username" name="signupUsername" id="signupUsername" required><br><br>
                                <label for="signupPassword">New Password:</label><br>
                                <input type="password" placeholder="Enter New Password" name="signupPassword" id="signupPassword" required><br><br>
                                <label for="signupUserType">User Type:</label><br>
                                <select id="signupUserType" name="signupUserType" required>
                                    <option value="reg">Regular</option>
                                    <option value="mod">Moderator</option>
                                </select><br><br>
                                <button class="submittable" onclick="submitSignup()">Sign Up</button>
                            </center>

                            <script> // login
                            <form action="login.php" method="POST">
                            <td colspan="2" id="bold">
                                <div class="dropdown">
                                    <button class="dropbtn">login</button>
                                    <div class="dropdown-content-login">
                                        <center>
                                            <br>
                                            <label for="inputUsername">Username:</label><br>
                                            <input type="text" placeholder="Enter Username" name="inputUsername" id="inputUsername" required><br><br> 
                                            <label for="inputPassword">Password:</label><br>
                                            <input type="password" placeholder="Enter Password" name="inputPassword" id="inputPassword" required><br><br> 
                                            <button class="submittable" onclick="submitLogin(event)">Login</button>
                                            <label>
                                                <input type="checkbox" checked="checked" name="remember"> Remember me
                                            </label>
                                            <div id="inputmsg"></div>
                                            <br>
                                            <label for="signupUsername">New Username:</label><br>
                                            <input type="text" placeholder="Enter New Username" name="signupUsername" id="signupUsername" required><br><br>
                                            <label for="signupPassword">New Password:</label><br>
                                            <input type="password" placeholder="Enter New Password" name="signupPassword" id="signupPassword" required><br><br>
                                            <label for="signupUserType">User Type:</label><br>
                                            <select id="signupUserType" name="signupUserType" required>
                                                <option value="reg">Regular</option>
                                                <option value="mod">Moderator</option>
                                            </select><br><br>
                                            <button class="submittable" onclick="submitSignup(event)">Sign Up</button>
                                        </center>
                                    </div>
                                </div>
                            </td>

                            <script>
                                function submitLogin() {
                                    // Retrieve the input data
                                    var username = document.getElementById("inputUsername").value;
                                    var password = document.getElementById("inputPassword").value;

                                    // Store in Local Storage
                                    localStorage.setItem("username", username);
                                    localStorage.setItem("password", password);

                                    // Set the values in the login form
                                    document.getElementById("loginUsername").value = username;
                                    document.getElementById("loginPassword").value = password;

                                    // Submit the login form
                                    document.getElementById("loginForm").submit();
                                }

                                function submitSignup() {
                                    // Retrieve the input data
                                    var username = document.getElementById("signupUsername").value;
                                    var password = document.getElementById("signupPassword").value;
                                    var userType = document.getElementById("signupUserType").value;

                                    // Store in Local Storage
                                    localStorage.setItem("username", username);
                                    localStorage.setItem("password", password);

                                    // Set the values in the signup form
                                    document.getElementById("signupUsernameInput").value = username;
                                    document.getElementById("signupPasswordInput").value = password;
                                    document.getElementById("signupUserTypeInput").value = userType;

                                    // Submit the signup form
                                    document.getElementById("signupForm").submit();
                                }
                            </script>

                            <form id="loginForm" action="login.php" method="POST">
                                <input type="hidden" name="inputUsername" id="loginUsername">
                                <input type="hidden" name="inputPassword" id="loginPassword">
                            </form>

                            <form id="signupForm" action="signup.php" method="POST">
                                <input type="hidden" name="signupUsername" id="signupUsernameInput">
                                <input type="hidden" name="signupPassword" id="signupPasswordInput">
                                <input type="hidden" name="signupUserType" id="signupUserTypeInput">
                            </form>

                </td>
            </tr>
            <tr>
                <td rowspan = 2 colspan = 2>left bar</td>
                <td colspan = 2>
                    <div class="dropdown">
                        <button class="dropbtn">sort</button>
                        <div class="dropdown-content">
                            <a href="#">new</a>
                            <a href="#">popular</a>
                        </div>
                    </div>
                </td>
                <td colspan = 2 onclick="window.location.href='skeletonCreatePostPageRevised.html';">
                    create a new post (click to to link to page)
                </td>
                <td rowspan = 2 colspan = 2>right bar</td>
            </tr>
            <tr>
                <!--left bar rowspan 3 colspan 2 gone-->c
                <td rowspan = 1 colspan = 4>
                    <table class = "fitting">
                        <!--this is the table fitting all the other tables, 
                            and we will populate this table with the tables populated with specific forum info-->
                        <tr>
                            <td colspan = 4>
                                <table position = "absolute"><!--table for each post-->
                                    <tr>
                                        <td colspan = 1>
                                            <center>
                                                <button onclick = "incrementVote(0)" > Upvote </button>
                                            </center> 
                                        </td>
                                        <td colspan = 1>
                                            <input class = "invis" type="number" type = "hidden" id="upvoteNumber0" name="upvoteNumber0" value="<?=$upvotes0?>"><br>  
                                        </td> 
                                        <td colspan = 2 onclick="window.location.href='skeletonPostPage.php?id=<?=$id0?>';">
                                            <?=$title0?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan = 4>
                                            <label for="postDescript0">
                                                Post description:<br>
                                            </label><br>
                                            <input class = "invis" type="text" id="postDescript0" name="postDescript0" value=<?=$content0?>><br> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan = 4>
                                            <div>
                                                <table class = "forumPostTable" class = "scrollable">
                                                    <tr max-height = "30px"><!--these tags will populate depending on the actual post-->
                                                        <!--TODO edit this to just be tag text, no link-->
                                                        <td>
                                                            <button onclick="window.location.href='skeletonTagsPage.html';" > Tag 1 (click any tag to go to tags page)</button>
                                                        </td>
                                                        <td>
                                                            <button onclick="window.location.href='skeletonTagsPage.html';" > Tag 2 </button>
                                                        </td>
                                                        <td>
                                                            <button onclick="window.location.href='skeletonTagsPage.html';" > Tag 3 </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>  
                        </tr>
                        <tr>
                            <td colspan = 4>
                                <table position = "absolute"><!--table for each post-->
                                    <tr>
                                        <td colspan = 1>
                                            <center>
                                                <button onclick = "incrementVote(1)" > Upvote </button>
                                            </center> 
                                        </td>
                                        <td colspan = 1>
                                            <input class = "invis" type="number" type = "hidden" id="upvoteNumber1" name="upvoteNumber1" value="0"><br>  
                                        </td>
                                        <td colspan = 2 onclick="window.location.href='skeletonPostPage.html';">
                                            forum question (click here to go to post page)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan = 4>
                                            <label for="postDescript1">
                                                Post Description:<br>
                                            </label><br>
                                            <input class = "invis" type="text" id="postDescript1" name="postDescript0"><br> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan = 4>
                                            <div>
                                                <table class = "forumPostTable" class = "scrollable">
                                                    <tr max-height = "30px"><!--these tags will populate depending on the actual post-->
                                                        <td>
                                                            <button onclick="window.location.href='skeletonTagsPage.html';" > Tag 1 </button>
                                                        </td>
                                                        <td>
                                                            <button onclick="window.location.href='skeletonTagsPage.html';" > Tag 2 </button>
                                                        </td>
                                                        <td>
                                                            <button onclick="window.location.href='skeletonTagsPage.html';" > Tag 3 </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td> 
                        </tr>
                        <tr>
                            <td colspan = 4>
                                <table position = "absolute"><!--table for each post-->
                                    <tr>
                                        <td colspan = 1>
                                            <center>
                                                <button onclick = "incrementVote(2)" > Upvote </button>
                                            </center> 
                                        </td>
                                        <td colspan = 1>
                                            <input class = "invis" type="number" type = "hidden" id="upvoteNumber2" name="upvoteNumber2" value="0"><br>  
                                        </td>
                                        <td colspan = 2 onclick="window.location.href='skeletonPostPage.html';">
                                            forum question (click here to go to post page)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan = 4>
                                            <label for="postDescript2">
                                                Post Description:<br>
                                            </label><br>
                                            <input class = "invis" type="text" id="postDescript2" name="postDescript2"><br> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan = 4>
                                            <div>
                                                <table class = "forumPostTable" class = "scrollable">
                                                    <tr max-height = "30px"><!--these tags will populate depending on the actual post-->
                                                        <td>
                                                            <button onclick="window.location.href='skeletonTagsPage.html';" > Tag 1 (click any tag to go to tags page)</button>
                                                        </td>
                                                        <td>
                                                            <button onclick="window.location.href='skeletonTagsPage.html';" > Tag 2 </button>
                                                        </td>
                                                        <td>
                                                            <button onclick="window.location.href='skeletonTagsPage.html';" > Tag 3 </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>  
                        </tr>
                        <tr>
                            <td colspan = 4>
                                <table position = "absolute"><!--table for each post-->
                                    <tr>
                                        <td colspan = 1>
                                            <center>
                                                <button onclick = "incrementVote(3)" > Upvote </button>
                                            </center> 
                                        </td>
                                        <td colspan = 1>
                                            <input class = "invis" type="number" type = "hidden" id="upvoteNumber3" name="upvoteNumber3" value="0"><br>  
                                        </td>
                                        <td colspan = 2 onclick="window.location.href='skeletonPostPage.html';">
                                            forum question (click here to go to post page)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan = 4>
                                            <label for="postDescript3">
                                                Post Description:<br>
                                            </label><br>
                                            <input class = "invis" type="text" id="postDescript3" name="postDescript3"><br> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan = 4>
                                            <div>
                                                <table class = "forumPostTable" class = "scrollable">
                                                    <tr max-height = "30px"><!--these tags will populate depending on the actual post-->
                                                        <td>
                                                            <button onclick="window.location.href='skeletonTagsPage.html';" > Tag 1 (click any tag to go to tags page)</button>
                                                        </td>
                                                        <td>
                                                            <button onclick="window.location.href='skeletonTagsPage.html';" > Tag 2 </button>
                                                        </td>
                                                        <td>
                                                            <button onclick="window.location.href='skeletonTagsPage.html';" > Tag 3 </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td> 
                        </tr>
                    </table>
                </td>
                <!--right bar rowspan 3 colspan 2 gone-->
            </tr>
            
                

            
            
        </table>
    </div>
    
    </body>
</html>
