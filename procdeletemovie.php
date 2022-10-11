<?php

    // if not logged in, go back to login page
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }

    require_once("../../../include.php"); // login info to mysql

    $id = $_GET['id']; // the id of the movie to be deleted
    
    // if the deletemovie form was submitted
    if (isset($_POST['deletemovie'])) {
        // delete the record based on the movie's id
        $stmt = $conn->prepare("DELETE FROM sakila_film WHERE film_id = $id;");
        $stmt->execute();
    }

    header("Location: movietable.php"); // return back to the table 

    $conn = null; // close connection
?>
