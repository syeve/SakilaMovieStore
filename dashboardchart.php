<?php

    session_start(); // start session
    require_once("../../../include.php"); // login info to mysql
    require_once('BarChart.php');

    $chart = new BarChart("Sakila Inventory", "", "");

    // movies that are not yet rented
    // SELECT * FROM sakila_inventory
    $stmt = $conn->prepare("SELECT * FROM sakila_inventory");
    $stmt->execute();
    $result = $stmt->rowCount();
    $chart->addCategory("Not Rented", $result);


    // movies that are rented
    // SELECT * FROM sakila_rental WHERE return_date IS NULL
    $stmt = $conn->prepare("SELECT * FROM sakila_rental WHERE return_date IS NULL");
    $stmt->execute();
    $result = $stmt->rowCount();
    $chart->addCategory("Rented", $result);
    
    $chart->displayGraph();
?>