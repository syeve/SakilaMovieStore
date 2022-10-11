<?php

    session_start(); // start session

    require_once("../../../include.php"); // login info to mysql
    
    // creates a template where username and password will be replaced with
    // the user submitted username and password from the index.php form
    $stmt = $conn->prepare("SELECT * FROM sakila_staff 
    WHERE username = :username 
    AND password = MD5(CONCAT(salt, :password))");
    
    // substitutes in the values from the previous form and 
    // pulls matching records from the staff table
    $stmt->execute([
        'username' => $_POST['username'], 
        'password' => $_POST['password']]);
    
    $result = $stmt->fetch();
    
    // if there is a match, then the user submitted username and password
    // are valid and exist in the database. the session variables are then set
    // according to the valid login information
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
