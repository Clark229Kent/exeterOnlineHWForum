<?php
    //connection to server
    $servername = '127.0.0.1:3306';
    $username = 'root';
    $password = '';
    $dbname = 'poststorageschema';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $searchKeywords = $_GET['search'];
    //separate text into array of keywords
    $keywordsArray = explode(',', $searchKeywords);
    //trim white space out
    $keywordsArray = array_map('trim', $keywordsArray);
    //remove empty entries
    $keywordsArray = array_filter($keywordsArray);

    //loop search individual words
    $sql = "SELECT * FROM poststoragetable WHERE ";
    $conditions = [];

    foreach ($keywordsArray as $keyword) {
        $conditions[] = "(title LIKE '%$keyword%' OR content LIKE '%$keyword%')";
    }

    if (!empty($conditions)) {
        $sql .= implode(" OR ", $conditions);
        $result = mysqli_query($conn, $sql);
        for ($i=0;$i<mysqli_num_rows($result);$i++){
            $row[$i] = $result->fetch_assoc();
        }
    } 
    $conn->close()
?>
<html>
    <head>
        <link rel="stylesheet" href="skeletonCSS.css">
        
    </head>
<body>
    <div class = "scrollable" height = 800px>
        <table >
            <tr color = "#000;"> 
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
                        <form action="search.php" method="post">
                        <!--from https://www.sliderrevolution.com/resources/css-search-box/-->
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
                                    <label for="searchText">Search for posts here, use double quotes for tags:</label><br><br><br>
                                    <input type="text" id="searchText" name="searchText"><br><br>
                                    <!--<script>
                                        document.getElementById("searchText").addEventListener("keydown", function runSearch(e){if (e.keyCode == 13){
                                                console.log("Enter key is pressed");
                                                document.getElementById("searchEnterButton").click();
                                            }});
                                    </script>
                                </td>
                            </table>
                        
                    
                                <button hidden id = "searchEnterButton" onclick="window.location.href='skeletonSearchPage.html';"></button>-->
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
                <td rowspan = 1 colspan = 1>You searched for:</td>
                <td rowspan = 1 colspan = 7>
                    <label for="searchText">
                    <input type="text" class = "invis" id="searchText" name="searchText" value = "<?=$_GET['search']?>"><br>
                </td>
            </tr>
            <tr>
                <td rowspan = 1 colspan = 1>left bar</td>
                <td colspan = 6>
                    <table class = "fitting">
                        <tr>
                            <td>
                                <table colspan = 6>
                                    <tr>
                                        <td rowspan = 1 colspan = 1>
                                            <button onclick = "incrementVote(4)" > Upvote </button>
                                        </td>
                                        <td rowspan = 1 colspan = 2><?=$row[0]['title']?></td>
                                        <td rowspan = 1 colspan = 1><?=$row[0]['subj']?></td>
                                        <td rowspan = 1 colspan = 1><?=$row[0]['courseNum']?></td>
                                        <td rowspan = 2 colspan = 1># comments</td>
                                    </tr>
                                    <tr>
                                        <td rowspan = 1 colspan = 1>
                                            <input class = "invis" type="number" type = "hidden" id="upvoteNumber4" name="upvoteNumber4" value="0"><br>
                                        </td>
                                        <td rowspan = 1 colspan = 4>short blurb with ellipse cutoff e.g. I was wondering about question 2 on the....</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table colspan = 6>
                                    <tr>
                                        <td rowspan = 1 colspan = 1>
                                            <button onclick = "incrementVote(5)" > Upvote </button>
                                        </td>
                                        <td rowspan = 1 colspan = 2><?=$row[1]['title']?></td>
                                        <td rowspan = 1 colspan = 1><?=$row[1]['subj']?></td>
                                        <td rowspan = 1 colspan = 1><?=$row[1]['courseNum']?></td>
                                        <td rowspan = 2 colspan = 1># comments</td>
                                    </tr>
                                    <tr>
                                        <td rowspan = 1 colspan = 1>
                                            <input class = "invis" type="number" type = "hidden" id="upvoteNumber5" name="upvoteNumber5" value="0"><br>
                                        </td>
                                        <td rowspan = 1 colspan = 4>short blurb with ellipse cutoff e.g. I was wondering about question 2 on the....</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <td rowspan = 1 colspan = 1>right bar</td>
            </tr>
          </table>
    </div>
    
    </body>
</html>
