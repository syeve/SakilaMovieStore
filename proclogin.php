<?php

    session_start(); // start session

    require_once("../../../include.php"); // login info to mysql

    $stmt = $conn->prepare("SELECT * FROM sakila_staff 
    WHERE username = :username 
    AND password = MD5(CONCAT(salt, :password))");

    $stmt->execute([
        'username' => $_POST['username'], 
        'password' => $_POST['password']]);
    
    $result = $stmt->fetch();
    
    if ($result) {
        $_SESSION['username'] = $result['username'];
        $_SESSION['firstname'] = $result['firstname'];
        $_SESSION['lastname'] = $result['lastname'];
        header('Location: home.php');
    }
    else {
        $_SESSION['error'] = 'Incorrect username / password!';
        header('Location: index.php');
    }

    $conn = null; // close connection
?>