<?php
    $servername = '127.0.0.1:3306';
    $username = 'root';
    $password = '';
    $dbname = 'poststorageschema';
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if($conn->connect_error){
        die('Connection failed');
    }
    $date = date("Y-m-d H:i:s");
    $title = $_POST['forumTitleText'];
    $content = $_POST['forumContentText'];
    $subj = $_POST['forumSubjectTag'];
    $num = $_POST['forumCourseTag'];
    $otherTags = $_POST['forumOther'];

    $sql = "INSERT INTO poststoragetable (logtime, title, content, subj, courseNum, otherTags)
            VALUES ('$date', '$title', '$content', '$subj', '$num', '$otherTags')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('works!');
            </script>";
    }
    else{
        echo $conn->error;
    }
    header("Location: http://localhost/exeterOnlineHWForum-main/exeterOnlineHWForum-main/skeletonPostPage.html");
?>
