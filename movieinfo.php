<?php
    // if not logged in, go back to login page
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }

    $film_id = $_GET['id']; // sent from the jquery script on the movie table page

    require_once("navbar.php");
    require_once("../../../include.php"); // login info to mysql

    // fetch movie info based on the id of the movie
    $stmt = $conn->prepare("SELECT title, release_year, length, description, 
        rental_duration, replacement_cost, rating FROM sakila_film WHERE film_id = $film_id;");
    $stmt->execute();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sakila Movie Store</title>
    </head>
    <body>
        <br>
        <div class="card">
            <div class="card-body">
                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <p><?php echo htmlspecialchars($row['title'] . 
                        " " . "(" . $row['release_year']) . ")"; ?></p>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>

                    <p><?php echo "Runtime: " . htmlspecialchars(gmdate("i:s", $row['length'])); ?></p>
                    
                    <p><?php echo "Rental Duration: " . htmlspecialchars($row['rental_duration']) . " days"; ?></p>
                    <p><?php echo "Replacement Cost: " . money_format("$%i", htmlspecialchars($row['replacement_cost'])); ?></p>
                    <p><?php echo "Rating: " . htmlspecialchars($row['rating']); ?></p>
                <?php endwhile; ?>
            </div>
        </div>
    </body>
</html>

