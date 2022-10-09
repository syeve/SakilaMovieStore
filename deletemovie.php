<?php
    // if not logged in, go back to login page
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }
    require_once("navbar.php");
	require_once("../../../include.php"); // login info to mysql
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sakila Movie Store</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>
        <br><br>
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-body">
                    <p>Are you sure you want to delete?</p>
                    <form method="POST" action="procdeletemovie.php?id=<?= $_GET['id'] ?>">
                        <button type="submit" name="deletemovie" class="btn btn-outline-danger">Delete</button>
                    </form>
                    <br>
                    <a href="movietable.php" id="cancel" name="cancel" class="btn btn-outline-secondary">No</a>
                </div>
            </div>
        </div>
    </body>
</html>