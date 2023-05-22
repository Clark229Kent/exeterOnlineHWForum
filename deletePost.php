<?php
    $servername = '127.0.0.1:3306';
    $username = 'root';
    $password = '';
    $dbname = 'poststorageschema';
    $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error){
        die('Connection failed');
    }
    $id=$_GET['id'];
   
    $sql = "DELETE FROM poststoragetable WHERE id = '$id'";
         
    if($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }

 
    $conn->close();
        
    ?>
