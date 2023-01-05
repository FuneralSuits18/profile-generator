<?php

    include_once 'auth.php';

    $username = $_GET['_username'];
    $password = md5($_GET['_password']);

    //echo $password;

    $sql = "SELECT * from `admin` WHERE id = '$username' AND pass = '$password';";
    $result = mysqli_query($conn, $sql);
    $resultRows = mysqli_num_rows($result);

    mysqli_close($conn);

    if($resultRows > 0) {
        session_start();
        $_SESSION['username'] = $username;
        
    }

    echo $resultRows;

?>


    