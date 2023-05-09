<?php
    $servername = '127.0.0.1:3306';
    $username = 'root';
    $password = '';
    $dbname = 'test';
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if($conn->connect_error){
        die('Connection failed');
    }
    $title = $_POST['forumSubjectText'];
    $content = $_POST['forumContentText'];
    $subj = $_POST['forumSubjectTag'];
    $num = $_POST['forumCourseTag'];
    $otherTags = $_POST['forumOther'];

    $sql = "INSERT INTO postStorage_mysql (title, content, subjectTag, courseNum, otherTags)
            VALUES ('$title', '$content', '$subj', '$num', '$otherTags')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('works!');
            </script>";
    }
    
    $conn->close()
?>