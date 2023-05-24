<?php
    $servername = '127.0.0.1:3306';
    $username = 'root';
    $password = '';
    $dbname = 'poststorageschema';
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die('Connection failed');
    }
    
    $signupUsername = $_POST["signupUsername"];
    $signupPassword = $_POST["signupPassword"];
    $userType = $_POST["signupUserType"];

    $statement = mysqli_prepare($conn, "INSERT INTO logincreds (user_type, username, password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($statement, "sss", $userType, $signupUsername, $signupPassword);
    mysqli_stmt_execute($statement);

    if (mysqli_stmt_affected_rows($statement) > 0) {
        // Sign up successful
        session_start();
        $_SESSION["username"] = $signupUsername;
        $response = null;
        if ($userType == "reg") {
            $response = array('userType' => 'regular');
        } else if ($userType == "mod") {
            $_SESSION["user_type"] = "moderator";
            $response = array('userType' => 'moderator');
        }
        echo json_encode($response);
    } else {
        $errorMessage = "Sign up failed";
        echo json_encode($errorMessage);
    }

    $conn->close();
?>
