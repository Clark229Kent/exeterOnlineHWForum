<?php
    $servername = '127.0.0.1:3306';
    $username = 'root';
    $password = '';
    $dbname = 'poststorageschema'; //has three columns: user_type (reg/mod), username, password
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if($conn->connect_error){
        die('Connection failed');
    }
    
    $username = $_POST["inputUsername"];
    $password = $_POST["inputPassword"];

    $statement = mysqli_prepare($conn, "SELECT * FROM logincreds WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $user_type = $row["user_type"];

        if ($row["user_type"] == "reg") {
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["user_type"] = 'regular';

        } else if ($row["user_type"] == "mod") {
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["user_type"] = "moderator";

        }
        header("Location: skeletonHomePageForum.php");
        exit();
    } else {
        $errorMessage = "Invalid username or password";
        echo json_encode(array("errorMessage" => $errorMessage));
        exit();
    }
    

    $conn->close()
?>
