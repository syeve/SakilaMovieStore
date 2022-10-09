<?php
    // if not logged in, go back to login page
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }
    require_once('navbar.php');
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
        <!-- login module -->
        <div class="card">
            <div class="card-body">
                <form method="POST" action="procchangepassword.php">
                    <div class="form-group col-md-2">    
                        <br>     
                        <label class="form-label" for="currpassword">Current password</label>
                        <input type="text" id="password" name="currpassword" class="form-control" />

                        <br>        
                        <label class="form-label" for="newpassword">New password</label>
                        <input type="text" id="password" name="newpassword" class="form-control" />

                        <br>        
                        <label class="form-label" for="confirmnewpassword">Confirm new password</label>
                        <input type="text" id="password" name="confirmnewpassword" class="form-control" />

                        <br>
                        <button type="submit" value="submit" class="btn btn-primary btn-block mb-4">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
        
    </body>
</html>