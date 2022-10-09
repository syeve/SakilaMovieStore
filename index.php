<?php
    session_start(); // start session
    if (isset($_SESSION['error'])) {
        print($_SESSION['error']);
    }
    $_SESSION['error'] = null;
    session_destroy();
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
                <div class='collapse navbar-collapse'>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="navbar-brand">Sakila Movie Store</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="proclogin.php">
                    <div class="form-group col-md-2">    
                        <br>        
                        <label class="form-label" for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control col-2" />
                        <br>

                        <label class="form-label" for="password">Password</label>
                        <input type="text" id="password" name="password" class="form-control" />

                        <br>
                        <button type="submit" value="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                    </div>
                </form>

            </div>
        </div>
    </body>
</html>
