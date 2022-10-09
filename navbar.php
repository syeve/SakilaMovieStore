<?php
    // if not logged in, go back to login page
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }
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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class='container-fluid'>
                <a class="navbar-brand" href="home.php">Sakila</a>
                <div class='collapse navbar-collapse'>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="movietable.php">Movies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addmovie.php">Add Movie</a>
                        </li>
                    </ul>

                    <div class="nav navbar-nav navbar-right" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="changepassword.php">Change password</a>
                            </li>
                            <li class="nav-item active px-4">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </body>
</html>
