<?php
    session_start();

    $user = $_POST['_user'];
    $_SESSION['username'] = $user;
?>