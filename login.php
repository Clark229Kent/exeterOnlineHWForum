<?php
    $servername = '127.0.0.1:3306';
    $username = 'root';
    $password = '';
    $dbname = 'login'; //has three columns: user_type (reg/mod), username, password
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if($conn->connect_error){
        die('Connection failed');
    }
    
    $username = $_POST["inputUsername"];
    $password = $_POST["inputPassword"];

    $statement = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        if ($row["user_type"] == "reg") {
            session_start();
            $_SESSION["username"] = $username;
            $response = array('userType' => 'regular');
            echo json_encode($response);
        } else if ($row["user_type"] == "mod") {
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["user_type"] = "moderator";
            $response = array('userType' => 'moderator');
            echo json_encode($response);
        }
    } else {
        $errorMessage = "Invalid username or password";
    }
    

    $conn->close()
?>
