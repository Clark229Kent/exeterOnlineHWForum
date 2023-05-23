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

    //separate text into array of keywords
    $keywordsArray = explode(',', $searchKeywords);
    //trim white space out
    $keywordsArray = array_map('trim', $keywordsArray);
    //remove empty entries
    $keywordsArray = array_filter($keywordsArray);

    //loop search individual words
    $sql = "SELECT * FROM posts WHERE ";
    $conditions = [];

    foreach ($keywordsArray as $keyword) {
        $conditions[] = "(title LIKE '%$keyword%' OR content LIKE '%$keyword%')";
    }

    if (!empty($conditions)) {
        $sql .= implode(" OR ", $conditions);
        $result = mysqli_query($connection, $sql);

    } else {
        
    }

    $conn->close()
?>
