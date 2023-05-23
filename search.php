<?php
    //connection to server
    $servername = '127.0.0.1:3306';
    $username = 'root';
    $password = '';
    $dbname = 'poststorageschema';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        echo 'Connected successfully';
    }


    $searchKeywords = $_POST['searchText'];
    header("Location: http://localhost/exeterOnlineHWForum-main/exeterOnlineHWForum-main/skeletonSearchPage.php?search=" . $searchKeywords);

    $conn->close()
?>
