<?php
    session_start();

    $_SESSION['logged'] = false;

    unset($_COOKIE['nome']);
    unset($_COOKIE['email']);
    
    session_destroy();

    header('Location: index.php');