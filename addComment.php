<?php
    $servername = '127.0.0.1:3306';
    $username = 'root';
    $password = '';
    $dbname = 'poststorageschema';
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if($conn->connect_error){
        die('Connection failed');
    }
    $id = $_GET['id'];
    $date = date("Y-m-d H:i:s");
    $content = $_POST['replyContentText'];
    $sql = "INSERT INTO poststoragetable (logtime, content, score, parent)
            VALUES ('$date', '$content', 0, '$id')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('works!');
            </script>";
    }
    else{
        echo $conn->error;
    }
    header("Location: http://localhost/exeterOnlineHWForum-main/exeterOnlineHWForum-main/skeletonPostPage.php?id=" . $id);
    $conn->close();
?>
