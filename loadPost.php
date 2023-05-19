<?php
    $servername = '127.0.0.1:3306';
    $username = 'root';
    $password = '';
    $dbname = 'poststorageschema';
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if($conn->connect_error){
        die('Connection failed');
    }
    //needs format http://localhost/.../filepath.html?id=n
    $id=$_GET['id'];
    $sql = "SELECT * FROM poststoragetable WHERE id = '$id'";
    if($result = $conn->query($sql)){
        while($finfo = $result->fetch_field()){
            $logtime = $finfo->logtime;
            $title = $finfo->title;
            $content = $finfo->content;
            $subj = $finfo->subj;
            $courseNum = $finfo->courseNum;
            $other = $finfo->otherTags;
            $user = $finfo->userID;
            $upvotes = $finfo->upvotes;
        }
    }
/*     also try
    $result = $conn->query($sql);
    $finfo = $result->fetch_field();
    $logtime = $finfo->logtime;
    $title = $finfo->title;
    $content = $finfo->content;
    $subj = $finfo->subj;
    $courseNum = $finfo->courseNum;
    $other = $finfo->otherTags;
    $user = $finfo->userID;
    $upvotes = $finfo->upvotes;

    then, use <?php=$variable?> or <?=$variable?>, try both */
    $conn->close();
?>
