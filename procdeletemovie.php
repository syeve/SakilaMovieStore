<?php

    // if not logged in, go back to login page
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }

    require_once("../../../include.php"); // login info to mysql

    $id = $_GET['id'];

    if (isset($_POST['deletemovie'])) {
        $stmt = $conn->prepare("DELETE FROM sakila_film WHERE film_id = $id;");
        $stmt->execute();
    }

    header("Location: movietable.php");

    $conn = null; // close connection
?>