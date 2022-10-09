<?php
    // if not logged in, go back to login page
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }

    require_once("../../../include.php"); // login info to mysql

    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmnewpassword'];

    $stmt = $conn->prepare("SELECT * FROM sakila_staff 
    WHERE username = :username 
    AND password = MD5(CONCAT(salt, :password))");

    $stmt->execute([
        'username' => $_SESSION['username'],
        'password' => $_POST['currpassword'],
    ]);

    $result = $stmt->fetch();

    if ($result and ($newpassword == $confirmpassword)) {
        $stmt = $conn->prepare("UPDATE sakila_staff SET password = MD5(CONCAT(salt, :password)) WHERE username = :username");
        $stmt->execute([
            'username' => $_SESSION['username'],
            'password' => $_POST['newpassword'],
        ]);
        header('Location: home.php');
    }
    else {
        header('Location: changepassword.php');
    }

    $conn = null; // close connection
?>