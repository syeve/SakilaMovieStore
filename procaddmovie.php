<?php
    // if not logged in, go back to login page
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }

    require_once("../../../include.php"); // login info to mysql
    
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $year = $_POST['year'];
    $rent = $_POST['rentalduration'];
    $length = $_POST['length'];
    $rating = $_POST['rating'];
    $replace = $_POST['replacementcost'];

    $stmt = $conn->prepare("INSERT INTO sakila_film 
    (title, release_year, length, description, rental_duration, replacement_cost, rating) 
    VALUES (?, ?, ?, ?, ?, ?, ?);");

    $stmt->execute([
        $title,
        $year,
        $length,
        $desc,
        $rent,
        $replace,
        $rating
    ]);

    header("Location: movietable.php");

    $conn = null; // close connection
?>