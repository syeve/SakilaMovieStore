<?php
    // if not logged in, go back to login page
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }

    require_once("../../../include.php"); // login info to mysql
    
    $newpassword = $_POST['newpassword']; // new password
    $confirmpassword = $_POST['confirmnewpassword']; // repeated old password for confirmation
    
    // template to select the employee whose username and password
    // match the session username and posted "current password" from
    // the previous form
    $stmt = $conn->prepare("SELECT * FROM sakila_staff 
    WHERE username = :username 
    AND password = MD5(CONCAT(salt, :password))");

    $stmt->execute([
        'username' => $_SESSION['username'], // the session username that is already logged in
        'password' => $_POST['currpassword'], // the "current password" from the last form 
    ]);

    $result = $stmt->fetch();
    
    // if a record is retrieved AND the new password is confirmed 
    if ($result and ($newpassword == $confirmpassword)) {
        // query is executed to update the password of the currently logged in employee
        $stmt = $conn->prepare("UPDATE sakila_staff SET password = MD5(CONCAT(salt, :password)) WHERE username = :username");
        $stmt->execute([
            'username' => $_SESSION['username'],
            'password' => $_POST['newpassword'], // the password to be set is the new password from the previous form
        ]);
        // go back to the same page if there is an error, otherwise go to the homepage
        header('Location: home.php');
    }
    else {
        header('Location: changepassword.php'); 
    }

    $conn = null; // close connection
?>
