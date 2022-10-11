<?php
    session_start();
    unset($_SESSION["username"]); // unsets session variable
    header("Location: index.php"); // returns to login page
?>
