<?php

$servername = '127.0.0.1:3306';
    $username = 'root';
    $password = '';
    $dbname = 'poststorageschema';
    $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error){
        die('Connection failed');
    }

    $upvotes = $_POST['upvoteNumber'];
    $id=$_GET['id'];
   
    $sql = "UPDATE FROM poststoragetable WHERE id = '$id' VALUES '$upvotes";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('upvote works!');
            </script>";
    }  
    $conn->close();
        
?>
